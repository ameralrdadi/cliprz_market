
<? if($num_sections == 0){ ?>

<div class="alert alert-error"><?=lang('msg_not_found_section')?></div>

<? }else{ ?>

<h1><?=lang('sections') . ' ' . lang('products')?></h1>

<table class="table table-striped">
<tr>
	<td>#</td>
	<td><?=lang('title') . ' ' . lang('section')?></td>
</tr>
<?php $i=0; while($row_section = cliprz::system(database)->fetch_assoc($query_sections)){ ++$i; ?>
<tr>
	<td><?=$i?></td>
	<td><a href="<?=URL.'section/'.$row_section['sectionid']?>"><?=$row_section["title"]?></a></td>
</tr>
<? } ?>
</table>

<? } ?>
