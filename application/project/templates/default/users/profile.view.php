
<? if($num_user == 0){ ?>

<div class="alert alert-error"><?=lang('msg_not_found_user')?></div>

<? }else{ ?>

<h1><?=lang('profile')?></h1>

<table class="table table-striped">
<tr>
	<td><?=lang('username')?></td>
	<td><?=lang('email')?></td>
</tr>
<tr>
	<td><?=$username?></td>
	<td><?=$email?></td>
</tr>
</table>

<? } ?>
