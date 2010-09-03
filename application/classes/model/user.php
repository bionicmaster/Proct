<?php defined('SYSPATH') OR die('No direct access allowed.');

class Model_User extends Model_Auth_User {
	
    public static function initialize(Jelly_Meta $meta)
    {
        $meta->fields = array(
            'email' => 		new Field_Email(array(
                'unique' => 	TRUE,
                'rules' => 	array(
		    'not_empty' => 	array(TRUE),
		    'regex' => 		array('/^[\w\-.+]+@(?:(?:(?:pg)|(?:sunscopemx))\.)?com$/i'),
		)
	    )),
	    'first_name' => new Field_String(array(
                'rules' => array(
  		    'not_empty' => array(TRUE),
		    'max_length' => array(50),
		    'min_length' => array(3),
                )
  	    )),
	    'last_name' =>  new Field_String(array(
                'rules' => array(
		    'not_empty' => array(TRUE),
		    'max_length' => array(50),
		    'min_length' => array(3),
                )
  	    )),
	    'area' =>       new Field_String(array(
                'rules' => array(
  		    'not_empty' => array(TRUE),
		    'max_length' => array(100),
		    'min_length' => array(3),
                )
	    )),
	    'phone' =>      new Field_String(array(
                'rules' => array(
  		    'max_length' => array(20),
  		    'min_length' => array(10),
                )
  	    )),
	    'news'	=>	    new Field_HasMany(array('foreign' => 'news.user_id')),
	    'exchange' =>	new Field_HasMany(array('foreign' => 'exchanges.user_id')),
	    'price' =>		new Field_HasMany(array('foreign' => 'prices.user_id')),
	    'order' =>		new Field_HasMany(array('foreign'	=> 'orders.user_id')),
        );
        
        parent::initialize($meta);
    }   
	
} // End User Model