<?php defined('SYSPATH') or die ('No direct script access.');
/**
 * Status
 * @package Auth
 * @author 	Bionicmaster
 */
class Model_Status extends Jelly_Model
{
	public static function initialize(Jelly_Meta $meta)
	{
		$meta->table('status')
		->fields(array(
        	'id' =>             new Field_Primary,
         	'status_name' =>    new Field_String,
        	'status_label' =>   new Field_String,
        	'product' =>        new Field_HasMany(array('foreign' => 'products.status.id'))
        	'pgbrand' =>        new Field_HasMany(array('foreign' => 'pgbrands.status.id'))
	    ));
	}
} // End Model_Status