<?php if ($this->auth) { ?>
	<div id="menu">
		<table>
			<tr>	
				<td>
					<a href="<?=$this->link_products?>">Задания</a>
				</td>
				<td>
					<a href="<?=$this->logout?>">Выход</a>
				</td>
			</tr>
		</table>
	</div>
	<hr />
<?php } ?>