<?php defined('SYSPATH') or die('No direct script access.');

class Controller_User extends Controller_Base {

	public function action_index()
	{
		// Set template title
		$this->template->title = 'Home';

		// Display the 'index' template
		$this->template->content = View::factory('user/index')
			// $user will be `FALSE` if not logged in
			->set('user', $this->auth->get_user())
			->set('logged_in', $this->auth->logged_in());
	}

	public function action_login()
	{
		// Redirect to the index page if the user is already logged in
		if ($this->auth->logged_in())
		{
			$this->request->redirect(Route::get('default')->uri(array('action' => 'index')));
		}

		// No login error by default
		$error = FALSE;

		// Check if the form was submitted
		if ($_POST)
		{
			// See if user checked 'Stay logged in'
			$remember = isset($_POST['remember']) ? TRUE : FALSE;

			// Try to log the user in
			if (! $this->auth->login($_POST['username'], $_POST['password'], $remember))
			{
				// There was a problem logging in
				$error = TRUE;
			}

			// Redirect to the index page if the user was logged in successfully
			if ($this->auth->logged_in())
			{
				$this->request->redirect(Route::get('default')->uri(array('action' => 'index')));
			}
		}

		// Set template title
		$this->template->title = 'Login';

		// Display the 'login' template
		$this->template->content = View::factory('user/login')
			->set('error', $error);
	}

	public function action_logout()
	{
		// Log the user out if he is logged in
		if ($this->auth->logged_in())
		{
			$this->auth->logout();
		}

		// Redirect to the index page
		$this->request->redirect(Route::get('default')->uri(array('action' => 'index')));
	}

	public function action_register()
	{
		// There are no errors by default
		$errors = FALSE;

		// Create an instance of Model_Auth_User
		$user = Jelly::factory('user');
        $meta = Jelly::factory('meta');

		// Check if the form was submitted
		if ($_POST)
		{
			/**
			 * Load the $_POST values into our model.
			 *
			 * We use Arr::extract() and specify the fields to add
			 * by hand so that a malicious user can't do (for example)
			 * `$_POST['roles'][] = 2;` and make themselves an administrator.
			 */
			$user->set(Arr::extract($_POST, array(
				'email', 'username', 'password', 'password_confirm'
			)));

			// Add the 'login' role to the user model
			$user->add('roles', 1);

            $meta->set(Arr::extract($_POST, array(
                'first_name', 'last_name', 'area', 'phone'
            )));

			try
			{
				// Try to save our user model
				$user->save();
                $meta->user->user_id = $user->id;
                $meta->save();

				// Redirect to the index page
				$this->request->redirect(Route::get('default')->uri(array('action' => 'index')));
			}
			// There were errors saving our user model
			catch (Validate_Exception $e)
			{
				// Load custom error messages from `messages/forms/user/register.php`
				$errors = $e->array->errors('forms/user/register');
			}
		}

		// Set template title
		$this->template->title = 'Register';

		// Display the 'register' template
		$this->template->content = View::factory('user/register')
			->set('user', $user)
            ->set('meta', $meta)
			->set('errors', $errors);
	}
	
	public function action_change_password()
	{		
		// Redirect to the index page if the user is not logged in
		if (! $this->auth->logged_in())
		{
			$this->request->redirect(Route::get('default')->uri(array('action' => 'index')));
		}
		
		// There are no errors by default
		$errors = FALSE;
		
		// Check if the form was submitted
		if ($_POST)
		{
			// Retrieve current user
			$user = $this->auth->get_user();
			
			// Load the $_POST values into our model.
			$user->set(Arr::extract($_POST, array(
				'password', 'password_confirm'
			)));
			
			try
			{
				// Try to save our user model
				$user->save();

				// Redirect to the index page
				$this->request->redirect(Route::get('default')->uri(array('action' => 'index')));
			}
			// There were errors saving our user model
			catch (Validate_Exception $e)
			{
				// Load custom error messages from `messages/forms/user/register.php`
				$errors = $e->array->errors('forms/user/register');
			}
		}
		
		// Display the 'change_password' template
		$this->template->content = View::factory('user/change_password')
			->set('errors', $errors);
	}

} // End Controller_User
