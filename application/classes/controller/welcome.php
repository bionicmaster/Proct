<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Welcome extends Controller {

	public function action_index()
	{
	    set_time_limit(0);
        $url = 'http://www.sunscopeusa.com/Pages/';
        $url125 = "http://www.sunscopeusa.com/Images/productimages/JPG-125/";
        $url400 = "http://www.sunscopeusa.com/Images/productimages/JPG-400/";
        $path ="/home/creativa/procter/assets/img/items/";
        $imgs = Jelly::select('sunimage')->execute();
        $snoopy = new Snoopy;
        foreach($imgs as $img)
        {
          $snoopy->fetch($url125.$img->image_name);
          file_put_contents($path.'low/'.$img->image_name, $snoopy->results);
          $snoopy->fetch($url400.$img->image_name);
          file_put_contents($path.'high/'.$img->image_name, $snoopy->results);
          echo '<br>Guardada imagen '.$img->image_name;
        }
      /*$image = file_get_contents("http://img.youtube.com/vi/Rz8KW4Tveps/1.jpg");
file_put_contents("imgfolder/imgID.jpg", $image);*/

/*      $snoopy = new Snoopy;
      $j = 0;

      for($i = 1; $i<1076; $i++)
      {
        echo '<br>Procesando item: '.$i.'<br>';
        $path = 'product.aspx?pid='.$i;
    	$snoopy->fetch($url.$path);
    	$html = $snoopy->results;
        $dom = new DomPHP;
    	$htm = $dom->select($html, 'table[cellspacing="2"]');
    	$datos = array();
        $producto = $sunscope = $pages = $images = array();
    	$producto['product_code'] = $htm['#lblItemName']->text();
        if($producto['product_code'] == '' or is_null($producto['product_code']))
        {
          echo 'El articulo esta vacio '.$i;
            continue;
        }
    	$producto['product_description_en'] = $htm['#ctllableDesc']->text();
        $producto['product_minimum'] = 1;
        $producto['product_views'] = 0;
        $producto['status_id'] = 1;
        print_r($producto);
        Jelly::factory('product')->set($producto)->save();
        $j++;
        $sunscope['product_id'] = $pages['product_id'] = $images['product_id'] = $j;

        $sunscope['product_size'] = $htm['#TabContainer1_TabPanel2_lblItemSize']->text();
    	$sunscope['product_package'] = $htm['#TabContainer1_TabPanel2_lblPacking']->text();
    	$sunscope['product_casepkg'] = $htm['#TabContainer1_TabPanel2_lblCasePack']->text();
    	$sunscope['product_casewt'] = $htm['#TabContainer1_TabPanel2_lblCaseWeightLBS']->text();
    	$sunscope['product_casedim'] = $htm['#TabContainer1_TabPanel2_lblCaseInchLeft']->text(). '" x '.$htm['#TabContainer1_TabPanel2_lblCaseInchWidth']->text().'" x '.$htm['#TabContainer1_TabPanel2_lblCaseInchHeight']->text().'"';
        Jelly::factory('sunproduct')->set($sunscope)->save();

        $pages['page_number'] = $htm['#TabContainer1_TabPanel2_lblCatPgNo']->text();
        Jelly::factory('sunpage')->set($pages)->save();

        //$datos['Colors'] = $htm['#TabContainer1_TabPanel2_lblProductColor']->text();
    	$photos = $htm['#DListImgs']->find('td');
    	foreach($photos as $photo)
    	{
    		$photo = $dom->select($dom->inner($photo));
    		$images['image_name'] =  str_replace('http://www.sunscopeusa.com/Images/productimages/JPG-125/', '',$photo['img']->attr('src'));
            Jelly::factory('sunimage')->set($images)->save();
    	}
      }  */

	}

} // End Welcome
