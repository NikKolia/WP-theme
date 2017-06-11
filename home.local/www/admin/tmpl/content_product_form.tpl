<h3><?=$this->form_title?></h3>
<?php include "message.tpl"; ?>
<div class="form">
	<form name="product" action="<?=$this->action?>" method="post" enctype="multipart/form-data">
		<table id="deal">
			<tr>
				<td>Дата:</td>
				<td class="datedg">
					<input type="text" name="datedg" value="<?=$this->datedg?>" />
				</td>
			</tr>
			<tr>
				<td>Чьё задание:<span style="color: #BA0000; font-weight: bold;">*</span></td>
				<td>
					<select name="section_id" required>
						<option value="">выберите, пожалуйста...</option>
						<?php foreach ($this->sections as $section) { ?>
							<option value="<?=$section["id"]?>" <?php if ($section["id"] == $this->section_id) { ?>selected="selected"<?php } ?>><?=$section["title"]?></option>
						<?php } ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Задание:<span style="color: #BA0000; font-weight: bold;">*</span></td>
				<td>
					<textarea name="pr_title" cols="70" rows="3" required><?=$this->pr_title?></textarea>
				</td>
			</tr>
			<tr>
				<td>Описание:</td>
				<td>
					<textarea name="description" cols="70" rows="5"><?=$this->description?></textarea>
				</td>
			</tr>
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
			<!-- <tr>
				<td>Изображение:</td>
				<td>
					<input type="file" name="img" />
				</td>
			</tr>  -->
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