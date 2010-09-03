<?php defined('SYSPATH') or die ('No direct script access.');
/**
 * Meta Datos
 * @package Auth
 * @author 	Bionicmaster
 */
class Model_Flag extends Jelly_Model
{
	public static function initialize(Jelly_Meta $meta)
	{
		$meta->table('flags')
	    ->fields(array(
			'id' =>             new Field_Primary,
		 	'flag_name' =>  	new Field_String,
			'flag_label_es' =>	new Field_String,
			'flag_label_en'	=>	new Field_String,
			'product' =>		new Field_HasMany(array('foreign' => 'products.flag_id'))
		));
	}
} // End Model_Flag