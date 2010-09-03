<?php defined('SYSPATH') or die ('No direct script access.');
/**
 * Productos
 * @package Auth
 * @author 	Bionicmaster
 */
class Model_SunProduct extends Jelly_Model
{
    public static function initialize(Jelly_Meta $meta)
    {
    	$meta->table('sunproducts')
        ->fields(array(
    	    'id' =>                 new Field_Primary,
    	    'product_size' =>       new Field_String,
    	    'product_weight' =>     new Field_String,
    	    'product_package' =>    new Field_String,
    	    'product_casepkg' =>    new Field_String,
    	    'product_casewt' =>     new Field_String,
    	    'product_casedim' =>    new Field_String,
    	    'product_imprint' =>    new Field_String,
    	    'product_id' =>         new Field_BelongsTo(array('foreign' => 'products.id', 'column' => 'product_id')),
            'sunimage' =>           new Field_HasMany(array('foreign' => 'sunimages.product_id')),
            'sunpage' =>            new Field_HasMany(array('foreign' => 'sunpages.product_id')),
            'sunproduct' =>         new Field_ManyToMany(array(
                'foreign' => 'subtypes',
                'through' => array(
                    'model'   => 'sunproducts_subtypes',
                    'columns' => array('sunproducts_id', 'subtypes_id'),
                ),
            )),
            'color' =>         new Field_ManyToMany(array(
                'foreign' => 'colors',
                'through' => array(
                    'model'   => 'colors_sunproducts',
                    'columns' => array('sunproducts_id', 'colors_id'),
                ),
            ))
    	));
	}
} // End Model_SunProduct