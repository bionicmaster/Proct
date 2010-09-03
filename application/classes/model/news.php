<?php defined('SYSPATH') or die ('No direct script access.');
/**
 * Meta Datos
 * @package Auth
 * @author 	Bionicmaster
 */
class Model_News extends Jelly_Model
{
	public static function initialize(Jelly_Meta $meta)
	{
		$meta->table('news')
				 ->fields(array(
					'id'						=> new Field_Primary,
				 	'user_id' 			=> new Field_BelongsTo(array('foreign' => 'user')),
					'news_text' 		=> new Field_Text,
					'news_created'	=> new Field_Integer
				 ));
	}
} // End Model_Meta