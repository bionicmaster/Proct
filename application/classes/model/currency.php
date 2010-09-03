<?php defined('SYSPATH') or die ('No direct script access.');
/**
 * Meta Datos
 * @package Auth
 * @author 	Bionicmaster
 */
class Model_Currency extends Jelly_Model
{
	public static function initialize(Jelly_Meta $meta)
	{
		$meta->table('currencies')
		->fields(array(
        	'id' =>             new Field_Primary,
         	'currency_simbol'=> new Field_String,
        	'currency_abr' =>   new Field_String,
        	'currency_name'	=>	new Field_String,
        	'exchange' =>		new Field_HasMany(array('foreign' => 'exchanges.currency_id'))
         ));
	}
} // End Model_Currency