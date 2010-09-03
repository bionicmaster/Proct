<?php defined('SYSPATH') or die ('No direct script access.');
/**
 * Productos
 * @package Auth
 * @author 	Bionicmaster
 */
class Model_Product extends Jelly_Model
{
    public static function initialize(Jelly_Meta $meta)
    {
    	$meta->table('products')
        ->fields(array(
    	    'id' => new Field_Primary,
    	    'product_code' => new Field_String,
    	    'product_description_es' => new Field_Text,
    	    'product_description_en' => new Field_Text,
    	    'product_notes' => new Field_Text,
    	    'product_minimum' => new Field_Integer,
    	    'flag_id' => new Field_BelongsTo(array('foreign' => 'flags.id', 'column' => 'flag_id')),
    	    'product_views' => new Field_Integer,
            'status_id' => new Field_BelongsTo(array('foreign' => 'status.id')),
            'product_since' => new Field_Timestamp(array('auto_now_create' => TRUE)),
            'price' => new Field_HasMany(array('foreign' => 'prices.product_id')),
            'order' => new Field_HasMany(array('foreign' => 'orders.product_id')),
            'pgproduct' => new Field_HasMany(array('foreign' => 'pgproducts.product_id')),
            'sunproduct' => new Field_HasMany(array('foreign' => 'sunproducts.product_id'))
    	));
	}
} // End Model_Product