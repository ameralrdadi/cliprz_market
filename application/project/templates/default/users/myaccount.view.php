
  <form class="form-signin" action="<?=URL?>check_myaccount" method="POST">
	<?php if(isset($error)){ ?><div class="alert alert-error"><?=$error?></div><? } ?>
    <h2 class="form-signin-heading"><?=lang('myaccount')?></h2>
    <h4><?=lang('username').' : <span class="label label-info" style="font-size:14px;">'.$username?></sapn></h4>
    <input type="text" class="input-block-level" value="<?=$email?>" name="email" />
    <input type="password" class="input-block-level" placeholder="<?=lang('password')?>" name="password" />
    <input type="password" class="input-block-level" placeholder="<?=lang('repassword')?>" name="repassword" />
    <button class="btn btn-large btn-primary" type="submit">Update</button>
	<input type="hidden" name="user" value="update_myaccount" />
  </form>

<style type="text/css">
.form-signin {
	max-width: 300px;
	padding: 19px 29px 29px;
	margin: 0 auto 20px;
	background-color: #fff;
	border: 1px solid #e5e5e5;
	-webkit-border-radius: 5px;
	   -moz-border-radius: 5px;
	        border-radius: 5px;
	-webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
	   -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
	        box-shadow: 0 1px 2px rgba(0,0,0,.05);
}
.form-signin .form-signin-heading,
.form-signin .checkbox {
	margin-bottom: 10px;
}
.form-signin input[type="text"],
.form-signin input[type="password"] {
	font-size: 16px;
	height: auto;
	margin-bottom: 15px;
	padding: 7px 9px;
}

</style>
