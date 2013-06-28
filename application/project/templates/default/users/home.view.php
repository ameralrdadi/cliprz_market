<? if($num_users == 0){ ?>

<div class="alert alert-error"><?=lang('msg_not_found_users')?></div>

<? }else{ ?>

<h1><?=lang('list') . ' ' . lang('users')?></h1>

<table class="table table-striped">
<tr>
	<td>#</td>
	<td><?=lang('username')?></td>
	<td><?=lang('email')?></td>
</tr>
<?php $i=0; while($row_users = cliprz::system(database)->fetch_assoc($query_users)){ ++$i; ?>
<tr>
	<td><?=$i?></td>
	<td><a href="<?=URL.'user/profile/'.$row_users['userid']?>"><?=$row_users["username"]?></a></td>
	<td><?=$row_users["email"]?></td>
</tr>
<? } ?>
</table>

<? } ?>
