<!DOCTYPE html>
<html lang="ru">
<head>
	<title><?=$this->title?></title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=1024">
	<meta name="description" content="<?=$this->meta_desc?>" />
	<meta name="keywords" content="<?=$this->meta_key?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<link rel="stylesheet" href="css/main.css" />
	<link rel="stylesheet" href="css/media.css" />
	<link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />
	<script src="libs/jquery/jquery-3.1.1.min.js"></script>
	<script src="libs/jquery-scrollup/jquery.scrollup.min.js"></script>
</head>
<body>
	<div id="container">
		<div id="header">
			<img src="img/header.png" alt="Шапка" />
		</div>
		<div id="topmenu">
			<ul>
				<li>
					<a href="<?=$this->index?>">ВСЕ ЗАДАНИЯ</a>
				</li>
				<li>
					<img src="img/topmenu_border.png" alt="" />
				</li>
				<li>
					<a href="https://home.local/admin" target="_blank">Father's account</a>
				</li>
				<li>
					<img src="img/topmenu_border.png" alt="" />
				</li>
				<li>
					<a href="https://home.local/edit" target="_blank">Mother's account</a>
				</li>
				<li>
					<img src="img/topmenu_border.png" alt="" />
				</li>
				<li>
					<a href="https://home.local/child" target="_blank">Child's account</a>
				</li>
				<li>
					<img src="img/topmenu_border.png" alt="" />
				</li>
			</ul>
			<div id="search">
				<form name="search" action="<?=$this->link_search?>" method="get">
					<table>
						<tr>
							<td class="input_left"></td>
							<td>
								<input type="text" name="q" value="поиск" onfocus="if(this.value == 'поиск') this.value=''" onblur="if(this.value == '') this.value='поиск'" />
							</td>
							<td class="input_right"></td>
						</tr>
					</table>
				</form>
			</div>
		</div>
		<div id="content">
			<div>
				<?php include "content_".$this->content.".tpl"; ?>
			</div>
			<div class="clear"></div>
			<div id="footer">
				<div id="copy">
					<p>Bondarenko &copy; 2017</a></p>
				</div>
			</div>
		</div>
	</div>
	<script src="libs/scrollto/jquery.scrollTo.min.js"></script>
	<script src="js/common.js"></script>
</body>
</html>