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
	<table>
		<tr>
			<td rowspan="2">
				<div class="header">
					<h3><?=$this->table_products_title?></h3>
				</div>
			</td>
			<td class="section_bg"></td>
			<td class="section_right"></td>
		</tr>
		<tr>
			<td colspan="2">
				<table class="sort">
					<tr>
						<td>Сортировать по:</td>
						<td>дата (<a href="<?=$this->link_date_up?>">возр.</a> / <a href="<?=$this->link_date_down?>">убыв.</a>)
						<td>выполнение (<a href="<?=$this->link_title_up?>">возр.</a> / <a href="<?=$this->link_title_down?>">убыв.</a>)
					</tr>
				</table>
			</td>
		</tr>
	</table>
	<?php include "message.tpl"; ?>
	<?php include "pagination.tpl"; ?>
	<table class="products">
		<tr class="top">
			<td align="center">№</td>		
			<td align="center">Дата</td>
			<td align="center">Задание</td>
			<td align="center">Выполнение</td>
		</tr>
		<?php
			for ($i = 0; $i < count($this->products); $i++) {
				{ ?>
					<tr class="intro_product">
						<td>
							<p id="number" class="title">
								<a href="<?=$this->products[$i]["link"]?>"><?=$this->products[$i]["id"]?></a>
							</p>
						</td>
						<td>
							<p id="datedg" class="title">
								<a href="<?=$this->products[$i]["link"]?>"><?=$this->products[$i]["datedg"]?></a>
							</p>
						</td>
						<td>
							<p class="title">
								<a href="<?=$this->products[$i]["link"]?>"><?=$this->products[$i]["title"]?></a>
							</p>
						</td>
						<td>
							<p align="center">
								<?php if ($this->products[$i]["buh"] == 1) { ?>Да<?php } else { ?>Нет<?php } ?>
							</p>
						</td>
					</tr>
				<?php } ?>
		<?php } ?>
	</table>
	<?php include "pagination.tpl"; ?>
</div>