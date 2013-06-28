<?php if($num_prodcut == 0){ ?>
	<div class="alert alert-error"><?=lang('msg_not_found_prodcut')?></div>
<?php }else{ ?>

<h1><?=$title?></h1>

<table class="table table-striped">
<tr>
	<td><?=lang('id')?></td>
	<td><?=lang('title')?></td>
	<td><?=lang('price')?></td>
	<td><?=lang('city')?></td>
</tr>
<tr>
	<td><?=$prodcutid?></td>
	<td><?=$title?></td>
	<td><?=$price?></td>
	<td><?=$city?></td>
</tr>
<tr>
	<td colspan="4"><center><?=$content?></center></td>
</tr>
</table>
<?php } ?>