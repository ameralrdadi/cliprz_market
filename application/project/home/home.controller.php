<?php

class home
{

    public function index ()
    {          
        $data = array(
            'title_page' => lang('site_name')
        );

        cliprz::system(view)->display('static/header',$data,TRUE);
        cliprz::system(view)->display('home/home',NULL);
        cliprz::system(view)->display('static/footer',NULL,TRUE);  

    }

}

?>