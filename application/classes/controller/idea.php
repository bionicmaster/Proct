<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Idea extends Controller_Template {

  public $template = 'templates/idea';
  
  public function before() {
    parent::before();
    if($this->auto_render) {
      $this->template->header = '';
      $this->template->footer = '';
      $this->template->styles = '';
      $this->template->scripts = array();
    }
  }
  
  public function after() {
    if($this->auto_render) {
    }
    parent::after();
  }
  
  public function action_index() {
    
  }
}

?>