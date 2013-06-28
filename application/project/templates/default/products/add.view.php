
<h1><?=lang('add') . ' ' . lang('prodcut')?></h1>

<form action="<?=URL.'check_add_prodcut'?>" method="POST">
<table class="table table-striped">
<tr>
	<td><?=lang('title')?></td>
	<td><input type="text" name="title" /></td>	
</tr>
<tr>
	<td><?=lang('price')?></td>
	<td><input type="text" name="price" /></td>	
</tr>
<tr>
	<td><?=lang('city')?></td>
	<td><select name="id_city">
		<?php 
		while($row_city = cliprz::system(database)->fetch_assoc($query_city)){
			echo '	<option value="'.$row_city['cityid'].'">'.$row_city['name_city'].'</option>
		';
		}?>
</select></td>	
</tr>
<tr>
	<td><?=lang('section')?></td>
	<td><select name="id_section">
		<?php 
		while($row_section = cliprz::system(database)->fetch_assoc($query_section)){
			echo '	<option value="'.$row_section['sectionid'].'">'.$row_section['title'].'</option>
		';
		}?>
	</select></td>	
</tr>
<tr>
	<td><?=lang('content')?></td>
	<td><textarea name="content" rows="10"></textarea></td>	
</tr>
<tr>
	<td><input type="submit" value="<?=lang('add')?>" class="btn" /></td>
</tr>
</table>
<input type="hidden" name="prodcut" value="add" />
</form>
