<?php defined('SYSPATH') or die('No direct script access.');

abstract class Controller_Base extends Controller_Template {
	
	// Base template
	public $template = 'templates/base';
	
	// Auth instance
	public $auth;
	
	public function before()
	{
		parent::before();
		
		// Retrieve auth instance
		$this->auth = Auth::instance();
		
		if ($this->auto_render === TRUE)
		{
			// Default template title
			$this->template->title    = '';
			$this->template->content  = '';
		}
	}
	
} // End Controller_Base
