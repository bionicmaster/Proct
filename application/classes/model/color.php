<?php defined('SYSPATH') or die ('No direct script access.');
/**
 * Colores
 * @package Jelly-Tablas
 * @author 	Bionicmaster
 */

class Model_Color extends Jelly_Model
{
	public static function initialize(Jelly_Meta $meta)
	{
	    $meta->table('colors')
        ->fields(array(
		    'id' =>                 new Field_Primary,
		    'color_label_en' =>     new Field_String,
		    'color_label_es' =>     new Field_String,
            'sunproduct' =>         new Field_ManyToMany(array(
                'foreign' => 'sunproducts',
                'through' => array(
                    'model'   => 'colors_sunproducts',
                    'columns' => array('colors_id', 'sunproducts_id'),
                ),
            ))
		));
	}
} // End Model_Color
?>