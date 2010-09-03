<?php defined('SYSPATH') or die ('No direct script access.');
/**
 * Tipos
 * @package Auth
 * @author 	Bionicmaster
 */
class Model_Type extends Jelly_Model
{
	public static function initialize(Jelly_Meta $meta)
	{
	    $meta->table('types')
		->fields(array(
        	'id' =>             new Field_Primary,
         	'type_name' =>      new Field_String,
        	'type_label_es' =>  new Field_String,
        	'type_label_en'	=>  new Field_String,
        	'subtype' =>        new Field_HasMany(array('foreign' => 'subtypes.type_id'))
		));
	}
} // End Model_Type