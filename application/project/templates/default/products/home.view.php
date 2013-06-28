
<? if($num_products == 0){ ?>

<div class="alert alert-error"><?=lang('msg_not_found_prodcut')?></div>

<? }else{ ?>

<h1><?=lang('products')?></h1>

<table class="table table-striped">
<tr>
	<td>#</td>
	<td><?=lang('title')?></td>
	<td><?=lang('price')?></td>
	<td><?=lang('user')?></td>
	<td><?=lang('city')?></td>
	<td><?=lang('date')?></td>
</tr>
<?php $i=0; while($row_prodcut = cliprz::system(database)->fetch_assoc($query_products)){ ++$i; ?>
<tr>
	<td><?=$i?></td>
	<td><a href="<?=URL.'prodcut/'.$row_prodcut['prodcutid']?>"><?=$row_prodcut["title"]?></a></td>
	<td><?=$row_prodcut['price']?></td>
	<td><?=$row_prodcut['username']?></td>
	<td><?=$row_prodcut['name_city']?></td>
	<td><?=$row_prodcut['date']?></td>
</tr>
<? } ?>
</table>

<? } ?>
