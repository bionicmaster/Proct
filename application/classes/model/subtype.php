<?php defined('SYSPATH') or die ('No direct script access.');
/**
 * Subtipos
 * @package Jelly-Tablas
 * @author 	Bionicmaster
 */

class Model_Subtype extends Jelly_Model
{
	public static function initialize(Jelly_Meta $meta)
	{
	    $meta->table('subtypes')
        ->fields(array(
		    'id' =>                 new Field_Primary,
		    'subtype_name' =>       new Field_String,
		    'subtype_label_es' =>   new Field_String,
		    'subtype_label_en' =>   new Field_String,
            'type_id' =>            new Field_BelongsTo(array('foreign' => 'types.id')),
            'sunproduct' =>         new Field_ManyToMany(array(
                'foreign' => 'sunproducts',
                'through' => array(
                    'model'   => 'sunproducts_subtypes',
                    'columns' => array('subtypes_id', 'sunproducts_id'),
                ),
            ))
		));
	}
} // End Model_Subtypes
?>