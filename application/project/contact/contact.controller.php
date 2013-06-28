<?php

class contact 
{
	public function index()
	{
		$data_page = array(
			'title_page' => lang('contact')
		);

		cliprz::system(view)->display('static/header',$data_page,TRUE);
		cliprz::system(view)->display('contact/home',NULL,TRUE);
		cliprz::system(view)->display('static/footer',NULL,TRUE);
	}	
}

?>