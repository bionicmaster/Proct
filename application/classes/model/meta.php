<?php defined('SYSPATH') or die ('No direct script access.');
/**
 * Meta Datos
 * @package Auth
 * @author 	Bionicmaster
 */
class Model_Meta extends Jelly_Model
{
	public static function initialize(Jelly_Meta $meta)
	{
		$meta->table('meta')
		->fields(array(
		    'id' =>         new Field_Primary,
		 	'user_id' =>    new Field_BelongsTo(array('foreign' => 'user.id')),
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
  				    'not_empty' => array(TRUE),
  					'max_length' => array(20),
  					'min_length' => array(10),
                )
  			))
		 ));
	}
} // End Model_Meta