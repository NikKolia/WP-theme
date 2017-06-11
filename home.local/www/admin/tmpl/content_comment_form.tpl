<h3><?=$this->form_title?></h3>
<?php include "message.tpl"; ?>
<div class="form">
	<form name="comment" action="<?=$this->action?>" method="post">
		<table>
			<tr>
				<td>Договор №:</td>
				<td>
					<select name="product_id">
						<?php foreach ($this->products as $product) { ?>
							<option value="<?=$product["id"]?>" <?php if ($product["id"] == $this->product_id) { ?>selected="selected"<?php } ?>><?=$product["id"]?> - <?=$product["title"]?></option>
						<?php } ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Имя:</td>
				<td>
					<input type="text" name="name" value="<?=$this->name?>" />
				</td>
			</tr>
			<tr>
				<td>Комментарий:</td>
				<td>
					<textarea name="comment" cols="30" rows="10"><?=$this->comment?></textarea>
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					<input type="hidden" name="id" value="<?=$this->id?>" />
					<input type="hidden" name="func" value="<?=$this->func?>" />
					<input type="submit" value="Отправить" />
				</td>
			</tr>
		</table>
	</form>
</div>