<?php

/**
 * Controler Sections
 *
 * Here you can Controller Sections
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

class sections
{

	public function index()
	{
	
		$query_sections = cliprz::system(database)->select('sections','*','active = 1');
		$num_sections 	=  cliprz::system(database)->num_rows($query_sections);

		$data_page = array(
			'title_page'     => lang('sections') . ' ' . lang('products'),
			'query_sections' => $query_sections,
			'num_sections'   => $num_sections
		);

		cliprz::system(view)->display('static/header',$data_page,TRUE);
		cliprz::system(view)->display('sections/home',$data_page);
		cliprz::system(view)->display('static/footer',NULL,TRUE);
	}


}


/**
 * End of file sections.controller.php
 *
 * @created  15/06/2013 12:22 am
 * @updated  26/06/2013 05:40 pm
 * @location ./application/project/sections/sections.controller.php
 */
?>