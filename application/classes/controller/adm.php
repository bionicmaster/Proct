<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Adm extends Controller_Template {

    public $template = 'admin/main';
    
    protected $auth;
    
    protected $user;            
    
      
    public function before()
    {
        parent::before();
        
        $this->auth = Auth::instance();
        
        $this->user = $this->auth->get_user();
        
        $this->template->menu = $this->_auto_nav();
        
        $this->template->footer = View::factory('admin/footer');
    }
    
	public function action_index()
	{
		if ( ! $this->auth->logged_in('login'))
        {
            Request::instance()->redirect('admin/login');
        }
        
        $this->template->title = 'Main page';
                
        $this->template->content = View::factory('admin/index')
            ->set('user', $this->user);
	}
    
    public function action_login()
    {
        // redirect to index page if user has already logged in
        if ($this->auth->logged_in('login'))
        {
            Request::instance()->redirect('admin/index');
        }
        
        $this->template->menu = NULL;
        
        $this->template->title = 'Login';
        
        $this->template->content = View::factory('admin/login')
            ->bind('username', $username)
            ->bind('errors', $errors);
            
        // try to login
        if ($_POST)
        {
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            $remember = isset($_POST['remember']) ? TRUE : FALSE;
            
            if ($this->auth->login($username, $password, $remember))
            {
                Request::instance()->redirect('admin/index');
            } else {
                $errors = array('Login or password incorrect');
            }
        }
    }
    
    // user management
    public function action_users($action = NULL, $id = NULL)
    {
        if ( ! $this->auth->logged_in('login'))
        {
            Request::instance()->redirect('admin/login');
        }
        
        if ($action)
        {
            
            switch ($action)
            {
                // add user 
                case 'add':
                    if ($this->user->has_role('admin'))
                    {
                        $this->template->title = 'Add user';  
                        $this->template->content = View::factory('admin/add_user') 
                            ->bind('errors', $errors)
                            ->bind('username', $username)
                            ->bind('email', $email);
                        
                        if ($_POST)
                        {
                            $username = $_POST['username'];
                            $password = $_POST['password'];
                            $password_confirm = $_POST['password_confirm'];
                            $email = $_POST['email'];
                            
                            try
                            {
                                Jelly::factory('user')
                                    ->set(array(
                                        'username' => $username, 
                                        'password' => $password, 
                                        'password_confirm' => $password_confirm, 
                                        'email' => $email,
                                        'roles' => Jelly::select('role')
                                            ->where('name', '=', 'login')
                                            ->execute(),
                                        ))
                                    ->save();     
                                    
                                $this->template->content = 'New user was added';
                                    
                            } catch (Validate_Exception $e) {
                                $errors = $e->array->errors('validate');
                            }
                        }
                    } else {
                        $this->template->content = 'You can not add users';
                    }
                    break;
                    
                // edit user
                case 'edit':
                    $user = Jelly::select('user')
                        ->load($id);
                        
                    $roles = Jelly::select('roles')
                        ->execute();
                        
                    $this->template->title = 'Edit user';  
                    $content = View::factory('admin/edit_user')
                        ->bind('errors', $errors);
                    
                    $is_saved = FALSE;
                    if ($_POST)
                    {
                        // $id = $_POST['id'];
                        $user->username = $_POST['username'];
                        $user->email = $_POST['email'];
                        $user->roles = isset($_POST['roles']) ? $_POST['roles'] : array();
                        
                        if ($_POST['password'])
                        {
                            $user->password = $_POST['password'];
                            $user->password_confirm = $_POST['password_confirm'];
                        }
                        
                        try
                        {
                            $user->save();
                            $is_saved = TRUE;    
                                                            
                        } catch (Validate_Exception $e) {
                            $errors = $e->array->errors('validate');
                            
                        }
                    }
                    
                    if ($is_saved)
                    {
                        $this->template->content = 'User profile was updated';
                    } else {
                        // output user profile form
                        $this->template->content = $content
                            ->set('id', $user->id)
                            ->set('username', $user->username)
                            ->set('email', $user->email)
                            ->set('user_roles', $user->roles->as_array())
                            ->set('roles', $roles); 
                    }
                                        
                    break;
                
                // del user    
                case 'del':
                    $this->template->title = 'Delete user';  
                    
                    if ($_POST)
                    {
                        // to prevent CSRF use POST instead of GET
                        if (isset($_POST['ok']))
                        {
                            if (Jelly::factory('user')->delete($_POST['id']))
                            {
                                $this->template->content = 'User was deleted';
                            } else {
                                $this->template->content = 'User was not deleted';
                            }
                        } else {
                            Request::instance()->redirect('admin/users');
                        }
                    } else {
                        // confirmation
                        $user = Jelly::select('user')
                            ->load($id);
                            
                        $this->template->content = View::factory('admin/del_confirm')
                            ->set('id', $user->id)
                            ->set('username', $user->username);
                    }
                    break;
                    
                default:
                    $this->template->title = 'Error';  
                    $this->template->content = 'Action was not specified';
                    
                    break;
            }
        } else {
            $this->template->title = 'User management';
                                
            // view user list
            $users = Jelly::select('user')->execute();
            
            $this->template->content = View::factory('admin/user_list')
                ->set('user', $this->user)
                ->set('users', $users);
        }
    }
    
    public function action_logout()
    {
        $this->auth->logout();
        
        Request::instance()->redirect('admin/login');
    }
    
    protected function _auto_nav()
    {
        $class = new ReflectionClass(__CLASS__);
        
        $methods = $class->getMethods();
        
        $slugs = array();
        
        foreach ($methods as $method_object)
        {
            $pos = strpos($method_object->name, 'action_');
            
            if ($pos !== 0)
            {
                continue;
            }
            
            $slug = substr_replace($method_object->name, '', 0, 7);
                            
            if ($slug === '' OR $slug === 'login')
            {
                continue;
            }
                
            $m = new ReflectionMethod(__CLASS__, $method_object->name);
               
            if ($m->isPublic())
            {
                $slugs[] = HTML::anchor(
                    $this->request->route->uri(array(
                        //'controller' => $this->request->controller,
                        'action' => $slug,
                        )), 
                    url::title($slug)
                    );
            }
        }
        
        $menu = View::factory('admin/navigation')
            ->set('items',$slugs);
        
        return $menu;
    }
    
} // End Admin
