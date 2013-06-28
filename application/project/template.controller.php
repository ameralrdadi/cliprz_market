<?php

class template 
{
	public static function index($get_template)
	{

	    $template_path = APPLICATION_PATH.'project/templates'.DS.$get_template.DS;

	    if(is_dir($template_path))
	    {
	  			
  		  $_SESSION['cliprz_template'] = $get_template;

	    }

		header("Location:".URL);
		
	}
	
}

?>