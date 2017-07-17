			<div class="col-md-12">
				<div id="footer">
					<?php wp_nav_menu( array(
						'theme_location' => 'footer_menu',
					)) ?>
					2016 © "Test WordPress"
				</div>
			</div>
		</div>
	</div>
	<?php wp_footer() ?>

	<?php
	// подготовим актуальные данные таксономий и полей
	$cats = get_terms('delivery', 'orderby=name&hide_empty=0&parent=0'); // получим все термины(элементы) таксономии с иерархией
	foreach ($cats as $cat) { // пробежим по каждому полученному термину
		$parents.="<option value='$cat->term_id' />$cat->name</option>"; // суем id и название термина в строку для вывода внутри тэга select
	}
	
	$current_user = wp_get_current_user();
		if( is_user_logged_in() ){
			if ($current_user->user_firstname.$current_user->user_lastname!='') {
				$usernames = $current_user->user_firstname.' '.$current_user->user_lastname;
			} 
			else { $usernames = ''; }
		if( is_user_logged_in() ){ 
			$useremail = $current_user->user_email; } 
			else { $useremail = ''; }
		}
		else {
			$usernames = '';
			$useremail = '';
		}
	?>

	<div class="cd-popup" role="alert">
		<div class="cd-popup-container">
			<?php // Выводим форму ?>
			<form class="pop_form" method="post" enctype="multipart/form-data" id="add_object">
				<p>Форма оформления заказа</p>
				<select name="post_title" required>
					<option value="">Выберите товар:</option>
				   <?php 
					global $wpdb;
					$sql = 'SELECT id, post_title FROM wp_posts WHERE post_type="products" and post_status="publish"';
					$res = $wpdb->get_results($sql, ARRAY_A) ; if (isset($res))
					foreach ($res as $name) {?>
					<option value="<?php echo $name['post_title'];?>"><?php echo $name['post_title'];?></option>
					<?}?>
				</select>
				<input type="text" name="post_content" placeholder="Введите номер телефона..." required pattern="^\(\d{3}\)\d{3}-\d{2}-\d{2}$" title="Вы неверно ввели номер телефона, повторите ввод в формате: (050)XXX-XX-XX" />
				<input type="surname" name="surname" value="<?php echo $usernames;?>" placeholder="Введите Имя и Фамилию..." required pattern="([А-ЯЁ][а-яё]+[\-\s]?){2,}" title="Повторите ввод в формате: Имя Фамилия" />
				<input type="email" name="email" value="<?php echo $useremail;?>" placeholder="Введите E-Mail..." required pattern="^[-\w.]+@([A-z0-9][-A-z0-9]+\.)+[A-z]{2,4}$"/>
				<select id="parent_cats" name="parent_cats" required>
					<option value="">Укажите способ доставки:</option>
					<?php echo $parents; // выводим все родительские термины ?>
				</select>
				<textarea name="adress" placeholder="Введите полный адрес доставки или укажите отделение Новой почты..." /></textarea>
				<div id="output"></div> <?php // сюда будем выводить ответ ?> 
				<input type="submit" name="button" value="Оформить заказ" id="sub"/>
			</form>
			<a href="#0" class="cd-popup-close img-replace"></a>
		</div>
	</div>
	
</body>
</html>