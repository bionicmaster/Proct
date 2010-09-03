<?php defined('SYSPATH') or die ('No direct script access.');
/**
 * Imagenes Sunscope
 * @package Jelly-Tablas
 * @author 	Bionicmaster
 */

class Model_SunImage extends Jelly_Model
{
	public static function initialize(Jelly_Meta $meta)
	{
	    $meta->table('sunimages')
        ->fields(array(
		    'id' =>             new Field_Primary,
		    'image_name' =>     new Field_String,
            'product_id' =>     new Field_BelongsTo(array('foreign' => 'sunproducts.id', 'column' => 'product_id'))
		));
	}
} // End Model_SunImage
?>