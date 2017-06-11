<h3>Задания</h3>
<?php include "message.tpl"; ?>
<?php include "pagination.tpl"; ?>
<table class="info">
	<tr class="header">
		<td align="center">№</td>
		<td align="center">Дата</td>
		<td align="center">Задание</td>
		<td align="center">Описание</td>
		<td align="center">Чьё задание</td>
		<td align="center">Выполнение</td>
		<td align="center">Функции</td>
	</tr>
	<?php foreach ($this->table_data as $data) { ?>
		<tr>
			<td><?=$data["id"]?></td>
			<td><?=$data["datedg"]?></td>
			<td><?=$data["title"]?></td>
			<td><?=$data["description"]?></td>
			<td><?=$data["section"]?></td>
			<td>
				<?php if ($data["buh"] == 1) { ?>Да<?php } else { ?>Нет<?php } ?>
			</td>
			<td>
				<a href="<?=$data["link_admin_edit"]?>">Редактировать</a>
				<br />
				<a href="<?=$data["link_admin_delete"]?>" onclick="return confirm('Вы уверены, что хотите удалить элемент?')">Удалить</a>
			</td>
		</tr>
	<?php } ?>
</table>
<?php include "pagination.tpl"; ?>