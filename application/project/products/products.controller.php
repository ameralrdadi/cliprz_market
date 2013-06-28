<?php

/**
 * Controler Products
 *
 * Here you can Controller Products
 *
 *
 * LICENSE: This program is released as free software under the Affero GPL license. You can redistribute it and/or
 * modify it under the terms of this license which you can read by viewing the included agpl.txt or online
 * at www.gnu.org/licenses/agpl.html. Removal of this copyright header is strictly prohibited without
 * written permission from the original author(s)
 *
 *
 * @author    Amer Alrdadi
 * @copyright copyrights (c) 2013 By Amer Alrdadi
 * @link      http://abosahar.com/cliprz_market
 * @since     Version 1.0.0
 */

class products
{
	public function show_all_products_by_section($get_sectionid)
	{

		$query_products = cliprz::system(database)->query('SELECT * FROM 
			' . DATABASE_PREFIX . 'products 
			INNER JOIN ' . DATABASE_PREFIX . 'citys ON ' . DATABASE_PREFIX . 'products.id_city = ' . DATABASE_PREFIX . 'citys.cityid
			INNER JOIN ' . DATABASE_PREFIX . 'users ON ' . DATABASE_PREFIX . 'products.id_user = ' . DATABASE_PREFIX . 'users.userid
			WHERE  ' . DATABASE_PREFIX . 'products.id_section = "'.$get_sectionid.'" && ' . DATABASE_PREFIX .'products.active = 1');
		$num_products   = cliprz::system(database)->num_rows($query_products);

		$data_page = array(
			'title_page'      => lang('show') . ' ' . lang('products'),
			'query_products'  => $query_products,
			'num_products'    => $num_products,
			);
		
		cliprz::system(view)->display('static/header',$data_page,TRUE);
		cliprz::system(view)->display('products/home',$data_page);
		cliprz::system(view)->display('static/footer',NULL,TRUE);

	}

	public function add()
	{
		$msg  = NULL;
	//	$form = TRUE;

		$data_page = array(
			'title_page'    => lang('add') . ' ' . lang('prodcut'),
		    'query_section' => cliprz::system(database)->select('sections','sectionid,title'),
		    'query_city'    => cliprz::system(database)->select('citys','cityid,name_city')
    	);

		$data_prodcut = array(
		    'title'      => (isset($_POST['title'])) ? cliprz::system(database)->res($_POST['title']) : NULL,
        	'price'      => (isset($_POST['price'])) ? cliprz::system(database)->res($_POST['price']) : NULL,
    	    'content'    => (isset($_POST['content'])) ? cliprz::system(database)->res($_POST['content']) : NULL,
    	    'id_section' => (isset($_POST['id_section'])) ? $_POST['id_section'] : NULL,
    	    'id_city'    => (isset($_POST['id_city'])) ? $_POST['id_city']  : NULL,
    	    'id_user' 	 => cliprz::system(session)->get('userid'),
    	    'date'   	 => time(),
    	    'active' 	 => 1
		);

		cliprz::system(view)->display('static/header',$data_page,TRUE);
		
		if(isset($_POST['prodcut']) && $_POST['prodcut'] == 'add')
		{	
		//	$form = FALSE;

			if(empty($data_prodcut['title']) || empty($data_prodcut['price']) || empty($data_prodcut['content']))
			{
				echo "
				<script type='text/javascript'>
					alert('".lang('msg_empty_input')."')
				</script>";
			}
			else
			{
				cliprz::system(database)->insert('products',$data_prodcut);
				echo lang('msg_add_prodcut');
			}

		}

		//($form === TRUE) ? cliprz::system(view)->display('products/add',NULL) : "";

		cliprz::system(view)->display('products/add',$data_page);

		cliprz::system(view)->display('static/footer',NULL,TRUE);
	}

	public function show($get_prodcutid)
	{

		$query_prodcut = cliprz::system(database)->query('SELECT * FROM 
			' . DATABASE_PREFIX . 'products 
			LEFT OUTER JOIN ' . DATABASE_PREFIX .'citys ON ' . DATABASE_PREFIX . 'products.id_city = ' . DATABASE_PREFIX . 'citys.cityid 
			WHERE ' . DATABASE_PREFIX .'products.prodcutid = '.$get_prodcutid.' && ' . DATABASE_PREFIX . 'products.active = 1');

		$num_prodcut   = cliprz::system(database)->num_rows($query_prodcut);
		$row_prodcut   = cliprz::system(database)->fetch_assoc($query_prodcut);


		$data_page = array(
			'title_page'    => lang('show') . ' ' . lang('prodcut'),
			'num_prodcut'   => $num_prodcut,
			'prodcutid'     => $row_prodcut['prodcutid'],
			'title'   		=> $row_prodcut['title'],
			'price'   		=> $row_prodcut['price'],
			'content' 		=> $row_prodcut['content'],
			'city' 			=> $row_prodcut['name_city'],
			'date' 			=> $row_prodcut['date'],
			'id_user'    	=> $row_prodcut['id_user']
			);
		
		cliprz::system(view)->display('static/header',$data_page,TRUE);
		cliprz::system(view)->display('products/show',$data_page);
		cliprz::system(view)->display('static/footer',NULL,TRUE);
	}


}


/**
 * End of file products.controller.php
 *
 * @created  15/06/2013 02:00 am
 * @updated  18/06/2013 02:33 pm
 * @location ./application/project/products/products.controller.php
 */
?>