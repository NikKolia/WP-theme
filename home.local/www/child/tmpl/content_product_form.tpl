<h3><?=$this->form_title?></h3>
<?php include "message.tpl"; ?>
<div class="form">
	<form name="product" action="<?=$this->action?>" method="post" enctype="multipart/form-data">
		<table id="deal">
			<tr>
				<td>Выполнение:</td>
				<td>
					<select name="buh">
						<option value="">выберите, пожалуйста...</option>
						<option value="1" <?php if ($this->buh == "1") { ?>selected="selected"<?php }?>>Да</option>
						<option value="2" <?php if ($this->buh == "2") { ?>selected="selected"<?php }?>>Нет</option>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					<input type="hidden" name="id" value="<?=$this->id?>" />
					<input type="hidden" name="func" value="<?=$this->func?>" />
					<input type="submit" value="Оформить" />
				</td>
			</tr>
		</table>
	</form>
</div>