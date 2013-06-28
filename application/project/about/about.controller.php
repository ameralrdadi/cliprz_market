<?php

class about 
{
	public function index()
	{
		$data_page = array('title_page' => lang('about'));
		cliprz::system(view)->display('static/header',$data_page,TRUE);
		cliprz::system(view)->display('about/home',NULL,TRUE);
		cliprz::system(view)->display('static/footer',NULL,TRUE);
	}
}

?>