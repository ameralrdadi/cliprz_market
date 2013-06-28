<?php

/**
 * Routing Cliprz Market URLs
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
 * @link      http://abosahra.com/cliprz_market
 * @since     Version 1.0.0
 */

cliprz::system(router)->index('home'); 

cliprz::system(router)->rule(array(
    'regex' => 'home',
    'class' => 'home',
    'path'  => 'home',
));

cliprz::system(router)->rule(array(
    'regex'      => 'language/:STR/direction/:STR',
    'class'      => 'language',
    'function'   => 'index',
    'parameters' => array('1','3')
));

cliprz::system(router)->rule(array(
    'regex'      => 'template/:STR',
    'class'      => 'template',
    'function'   => 'index',
    'parameters' => array('1')
));

cliprz::system(router)->rule(array(
    'regex'      => 'contact',
    'class'      => 'contact',
    'path'       => 'contact',
    'function'   => 'index'
));

cliprz::system(router)->rule(array(
    'regex'      => 'about',
    'class'      => 'about',
    'path'       => 'about',
    'function'   => 'index'
));
//===================================>
// Users 
//===================================>

cliprz::system(router)->rule(array(
    'regex'    => 'users/home',
    'class'    => 'users',
    'path'     => 'users',
    'function' => 'index'
));

cliprz::system(router)->rule(array(
    'regex'    => 'register',
    'class'    => 'users',
    'function' => 'register',
    'path'     => 'users'
));

cliprz::system(router)->rule(array(
    'regex'    => 'check_register',
    'class'    => 'users',
    'function' => 'register',
    'path'     => 'users',
    "method"   => "POST"
));

cliprz::system(router)->rule(array(
    'regex'    => 'login',
    'class'    => 'users',
    'function' => 'login',
    'path'     => 'users'
));

cliprz::system(router)->rule(array(
    'regex'    => 'check_login',
    'class'    => 'users',
    'function' => 'login',
    'path'     => 'users',
    'method'   => 'POST'
));

cliprz::system(router)->rule(array(
    'regex'    => 'myaccount',
    'class'    => 'users',
    'function' => 'myaccount',
    'path'     => 'users'
));

cliprz::system(router)->rule(array(
    'regex'    => 'check_myaccount',
    'class'    => 'users',
    'function' => 'myaccount',
    'path'     => 'users',
    'method'   => 'POST'
));

cliprz::system(router)->rule(array(
    'regex'      => 'user/profile/:INT',
    'class'      => 'users',
    'path'       => 'users',
    'function'   => 'profile',
    'parameters' => array(2)
));

cliprz::system(router)->rule(array(
    'regex'    => 'logout',
    'class'    => 'users',
    'function' => 'logout',
    'path'     => 'users'
));

//===================================>

//===================================>
// Products
//===================================>
cliprz::system(router)->rule(array(
    'regex'      => 'prodcut/:INT',
    'class'      => 'products',
    'path'       => 'products',
    'function'   => 'show',
    'parameters' => array(1)
));

cliprz::system(router)->rule(array(
    'regex'      => 'prodcut/add',
    'class'      => 'products',
    'path'       => 'products',
    'function'   => 'add',
));

cliprz::system(router)->rule(array(
    'regex'    => 'check_add_prodcut',
    'class'    => 'products',
    'function' => 'add',
    'path'     => 'products',
    "method"   => "POST"
));


//===================================>

//===================================>
// Sections
//===================================>
cliprz::system(router)->rule(array(
    'regex'      => 'sections',
    'class'      => 'sections',
    'path'       => 'sections',
    'function'   => 'index',
));

cliprz::system(router)->rule(array(
    'regex'      => 'section/:INT',
    'class'      => 'products',
    'path'       => 'products',
    'function'   => 'show_all_products_by_section',
    'parameters' => array(1)
));


//===================================>
// NOT WORK ->
//===================================>
// Citys
//===================================>
cliprz::system(router)->rule(array(
    'regex'      => 'city/:INT',
    'class'      => 'products',
    'path'       => 'products',
    'function'   => 'show_all_products_by_city',
    'parameters' => array(1)
));
//===================================>


//===================================>
// Tags
//===================================>
cliprz::system(router)->rule(array(
    'regex'      => 'tags/:STR',
    'class'      => 'products',
    'path'       => 'products',
    'function'   => 'show_all_products_by_tag',
    'parameters' => array(1)
));
//===================================>



/**
 * End of file router.php
 *
 * @created  05/04/2013 04:30 am
 * @updated  23/04/2013 08:38 am
 * @location ./application/config/router.php
 */
?>