<?php

class language 
{
	public static function index($get_language,$get_direction)
	{

	    $language_path = APPLICATION_PATH.'languages'.DS.$get_language.DS;

	    if(is_dir($language_path))
	    {
	    	
	    	$cliprz_language = $language_path.'cliprz.lang.php';
	    	
	    	if(file_exists($cliprz_language))
	    	{
	  			
	  		  $_SESSION['cliprz_language']  		 = $get_language;
	  		  $_SESSION['cliprz_language_direction'] = $get_direction;
	  		  
	    	}
	    }

		header("Location:".URL);
		
	}
	
}

?>