<div id="left">
	<div id="menu">
		<div class="header">
			<h3>Задания</h3>
		</div>
		<div id="items">
			<?php for ($i = 0; $i < count($this->items); $i++) { ?>
				<p <?php if ($i + 1 == count($this->items)) {?>class="last"<?php }?>>
					<a href="<?=$this->items[$i]["link"]?>"><?=$this->items[$i]["title"]?></a>
				</p>
			<?php } ?>
		</div>
		<div class="bottom"></div>
	</div>
</div>
<div id="right">	
	<table id="hornav">
		<tr>
			<td>
				<a href="<?=$this->index?>">Все задания</a>
			</td>
			<td>
				<img src="img/hornav_arrow.png" alt="" />
			</td>
			<td>
				<a href="<?=$this->link_section?>"><?=$this->product["section"]?></a>
			</td>
			<td>
				<img src="img/hornav_arrow.png" alt="" />
			</td>
			<td>Задание №<?=$this->product["id"]?> от <?=$this->product["datedg"]?>г.</td>
		</tr>
	</table>
	<?php include "message.tpl"; ?>
	<!-- <table id="images">
		<?php
			for ($i = 0; $i < count($this->images); $i++) {
				if ($i % 3 == 0) { ?>
					<tr>
						<?php } ?>
							<td>
								<div class="intro_images">
									<a href="<?=$this->images[$i]["imgs"]?>" target="_blank"><img src="img/doc.png" alt="Документ" /></a>
									<p class="title">
										<?=$this->images[$i]["img_description"]?>
									</p>
								</div>
							</td>
						<?php if (($i + 1) % 3 == 0) { ?>
					</tr>
				<?php } ?>
		<?php } ?>
	</table> -->
	<table id="product">
		<tr>	
			<td class="product_desc">
				<p>Задание <span class="title">№<?=$this->product["id"]?> от <?=$this->product["datedg"]?></span></p>
				<p>Что делать: <span class="title"><?=$this->product["title"]?></span></p>
				<p>Выполнение: <span class="title"><?php if ($this->product["buh"] == 1) { ?>Да<?php } else { ?>Нет<?php } ?></span></p>
			</td>
		</tr>
		<tr>
			<td>
				<p class="desc_title">Дополнительная информация:</p>
				<p class="desc"><?=$this->product["description"]?></p>
			</td>
		</tr>
		<!-- <tr>
			<td>
				<p class="button">
					<input type="hidden" name="func" value="comment" />
					<input type="hidden" name="product_id" value="<?=$this->product_id?>" />
					<input type="submit" value="Загрузить документы" />
				</p>
			</td>
			<td>			
				<p class="button">
					<input type="hidden" name="func" value="comment" />
					<input type="hidden" name="product_id" value="<?=$this->product_id?>" />
					<input type="submit" value="Редактировать данные" />
				</p>
			</td>
		</tr> -->
	</table>
	<div id="comment" class="target-el">
		<h4>Комментарии</h4>
		<div>
			<p id="low">Оставить комментарий:<span style="color: #BA0000; font-weight: bold;">*</span></p>
			<form name="order" action="<?=$this->action?>" method="post">
				<p><textarea name="comment" cols="70" rows="3" required><?=$this->comment?></textarea></p>
				<p>Имя:<span style="color: #BA0000; font-weight: bold;">*</span><br /><input type="text" name="name" value="<?=$this->name?>" placeholder="Введите Имя..." required title="Введите Имя" /></p>
				<p class="button">
					<input type="hidden" name="func" value="comment" />
					<input type="hidden" name="product_id" value="<?=$this->product_id?>" />
					<input type="submit" value="Добавить комментарий" />
				</p>
			</form>
		</div>
		<div>
			<?php foreach ($this->comments as $data) { ?>
				<p class="comment"><?=$data["comment"]?></p>
				<p class="name"><?=$data["name"]?></p> 
				<p class="date"><?=$data["datecom"]?></p>
			<?php } ?>
		</div>
	</div>
</div>