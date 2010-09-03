<?php defined('SYSPATH') or die ('No direct script access.');
/**
 * Imagenes Sunscope
 * @package Jelly-Tablas
 * @author 	Bionicmaster
 */

class Model_SunPage extends Jelly_Model
{
	public static function initialize(Jelly_Meta $meta)
	{
	    $meta->table('sunpages')
        ->fields(array(
		    'id' =>             new Field_Primary,
		    'page_number' =>     new Field_String,
            'product_id' =>     new Field_BelongsTo(array('foreign' => 'sunproducts.id', 'column' => 'product_id'))
		));
	}
} // End Model_SunPage
?>