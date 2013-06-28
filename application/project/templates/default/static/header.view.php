<!DOCTYPE HTML>
<html>
<head>
<meta charset="<?=CHARSET?>">
<title><?=$title_page?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--[if lt IE 9]>
    <script type="text/javascript" src="<?=javascript('html5shiv.js');?>"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="<?=assets('css/style.css');?>">
<?php if(isset($_SESSION['cliprz_language_direction']) && $_SESSION['cliprz_language_direction'] == 'rtl'){ ?>
<link rel="stylesheet" type="text/css" href="<?=assets('bootstrap/css/bootstrap.rtl.css');?>" />
<link rel="stylesheet" type="text/css" href="<?=assets('bootstrap/css/bootstrap-responsive-rtl.css');?>">
<?php }else{ ?>
<link rel="stylesheet" type="text/css" href="<?=assets('bootstrap/css/bootstrap.css');?>" />
<link rel="stylesheet" type="text/css" href="<?=assets('bootstrap/css/bootstrap-responsive.css');?>">
<?php } ?>
<script type="text/javascript" src="<?=javascript('jquery.js');?>"></script>
<script type="text/javascript" src="<?=assets('bootstrap/js/bootstrap.js');?>"></script>
<style type="text/css">
body {
    padding-top: 60px;
}

@media (max-width: 979px){
    .hero-unit {
        padding: 20px;
    }
    .hero-unit h1 {
        font-size: 26pt;
    }
    .hero-unit p {
        font-size: 10pt;
    }
}
</style>
</head>
<body>

<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>  
            </button>

            <a class="brand" href="<?=URL.'home'?>"><?=lang('site_name')?></a>

            <div class="nav-collapse collapse">
                <ul class="nav">
                    <li class="active"><a href="<?=URL.'home';?>"><?=lang('home')?></a></li>
                    <li><a href="<?=URL.'sections'?>"><?=lang('sections')." ".lang('products')?></a></li>
                    <li><a href="<?=URL.'users/home'?>"><?=lang('list')." ".lang('users')?></a></li>
                
                    <?php if(cliprz::system(session)->get('login') != 1){ ?>
                
                        <li><a href="<?=URL.'register'?>"><?=lang('register')?></a></li>
                        <li><a href="<?=URL.'login'?>"><?=lang('login')?></a></li>
                    
                    <?php }else{ ?>
                
                        <li><a href="<?=URL.'prodcut/add'?>"><?=lang('add') . ' ' . lang('prodcut')?></a></li>
                        <li><a href="<?=URL.'myaccount'?>"><?=lang('myaccount')?></a></li>
                     
                    <?php if(cliprz::system(session)->get('is_admin') == 1){?>

                        <li><a href="#"><?=lang('control')?></a></li><?php } ?>
                        <li><a href="<?=URL.'logout'?>"><?=lang('logout')?></a></li>
                    
                    <?php } ?>
                        <li><a href="<?=URL.'contact'?>"><?=lang('contact')?></a></li>
                        <li><a href="<?=URL.'about'?>"><?=lang('about')?></a></li>

                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>
</div>

<div class="container">
    
    

