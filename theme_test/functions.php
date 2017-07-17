<?php
// - С плагина
add_action( 'init', 'register_products' ); // Использовать функцию только внутри хука init
 
function register_products() {
	$labels = array(
		'name' => 'Товары',
		'singular_name' => 'Товар', // админ панель Добавить->Функцию
		'add_new' => 'Добавить товар',
		'add_new_item' => 'Добавить новый товар', // заголовок тега <title>
		'edit_item' => 'Редактировать товар',
		'new_item' => 'Новый товар',
		'all_items' => 'Все товары',
		'view_item' => 'Просмотр товаров на сайте',
		'search_items' => 'Искать товары',
		'not_found' =>  'Товаров не найдено.',
		'not_found_in_trash' => 'В корзине нет товаров.',
		'menu_name' => 'Товары' // ссылка в меню в админке
	);
	$args = array(
		'labels' => $labels,
		'public' => true, // благодаря этому некоторые параметры можно пропустить
		'menu_icon' => 'dashicons-cart', // иконка корзины
		'menu_position' => 5,
		'has_archive' => true,
		'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'comments'),
		'taxonomies' => array('category', 'post_tag')
	);
	register_post_type('products',$args);
}

function post_tag_for_pages(){
	register_taxonomy_for_object_type( 'category', 'products');
}
function post_tag_for_pages1(){
	register_taxonomy_for_object_type( 'post_tag', 'products');
}
  
    add_action( 'init', 'post_tag_for_pages' );
    add_action( 'init', 'post_tag_for_pages1' );
	

add_action( 'init', 'register_orders' ); // Использовать функцию только внутри хука init
 
function register_orders() {
	$labels = array(
		'name' => 'Заказы',
		'singular_name' => 'Заказ', // админ панель Добавить->Функцию
		'add_new' => 'Добавить заказ',
		'add_new_item' => 'Добавить новый заказ', // заголовок тега <title>
		'edit_item' => 'Редактировать заказ',
		'new_item' => 'Новый заказ',
		'all_items' => 'Все заказы',
		'view_item' => 'Просмотр заказов на сайте',
		'search_items' => 'Искать заказы',
		'not_found' =>  'Заказов не найдено.',
		'not_found_in_trash' => 'Нет заказов.',
		'menu_name' => 'Заказы' // ссылка в меню в админке
	);
	$args = array(
		'labels' => $labels,
		'public' => true, // благодаря этому некоторые параметры можно пропустить
		'menu_icon' => 'dashicons-cart', // иконка корзины
		'menu_position' => 5,
		'has_archive' => true,
		'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'comments'),
		'taxonomies' => array('delivery', 'status')
	);
	register_post_type('orders',$args);
}

function post_tag_for_pages2(){
	register_taxonomy_for_object_type( 'delivery', 'orders');
}
function post_tag_for_pages3(){
	register_taxonomy_for_object_type( 'status', 'orders');
}
 
	add_action( 'init', 'post_tag_for_pages2');
    add_action( 'init', 'post_tag_for_pages3' );


// Register Custom Taxonomy
function custom_taxonomy_delivery() {

	$labels = array(
		'name'                       => 'Способ доставки',
		'singular_name'              => 'Способ доставки',
		'menu_name'                  => 'Способ доставки',
		'all_items'                  => 'Все способы доставки',
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => 'Название нового способа доставки',
		'add_new_item'               => 'Добавить новый способ доставки',
		'edit_item'                  => 'Редактировать способ доставки', 
		'update_item'                => 'Обновить способ доставки',
		'view_item'                  => __( 'View Item', 'text_domain' ),
		'separate_items_with_commas' => 'Разделяйте способы доставки запятыми',
		'add_or_remove_items'        => 'Добавить или удалить способ доставки',
		'choose_from_most_used'      => 'Выбрать из наиболее часто используемых способов доставки',
		'popular_items'              => 'Популярные способы доставки',
		'search_items'               => 'Найти способ доставки',
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'delivery', array( 'orders' ), $args );

}
add_action( 'init', 'custom_taxonomy_delivery', 0 );


function custom_taxonomy_status() {

	$labels = array(
		'name'                       => 'Статус',
		'singular_name'              => 'Статус',
		'menu_name'                  => 'Статус',
		'all_items'                  => 'Все статусы',
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => 'Название нового статуса',
		'add_new_item'               => 'Добавить новый статус',
		'edit_item'                  => 'Редактировать статус', 
		'update_item'                => 'Обновить статус',
		'view_item'                  => __( 'View Item', 'text_domain' ),
		'separate_items_with_commas' => 'Разделяйте статусы запятыми',
		'add_or_remove_items'        => 'Добавить или удалить статус',
		'choose_from_most_used'      => 'Выбрать из наиболее часто используемых статусов',
		'popular_items'              => 'Популярные статусы',
		'search_items'               => 'Найти статус',
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'status', array( 'orders' ), $args );

}
add_action( 'init', 'custom_taxonomy_status', 0 );

// Добавляем произвольные поля
// подключаем функцию активации мета блока (my_extra_fields)
add_action('add_meta_boxes', 'my_extra_fields', 1);

function my_extra_fields() {
	add_meta_box( 'extra_fields', 'Дополнительное поле', 'extra_fields_box_func', 'post', 'normal', 'high'  );
	add_meta_box( 'extra_fields', 'Дополнительное поле', 'extra_fields_box_products_func', 'products', 'normal', 'high'  );
	add_meta_box( 'extra_fields', 'Дополнительные поля', 'extra_fields_box_orders_func', 'orders', 'normal', 'high'  );
}

// html код блока для типа записей products
function extra_fields_box_products_func($post){
	?>
		<p>Описание статьи (description):
			<textarea type="text" name="extra[description]" style="width:100%;height:50px;"><?php echo get_post_meta($post->ID, 'description', 1); ?></textarea>
		</p>
		<input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />
   <?php
}

// html код блока для типа записей orders
function extra_fields_box_orders_func($post){
	?>
	<p>Имя и Фамилия (surname):
		<textarea type="text" name="extra[surname]" style="width:100%;height:25px;"><?php echo get_post_meta($post->ID, 'surname', 1); ?></textarea>
	</p>
	<p>E-Mail (email):
		<textarea type="text" name="extra[email]" style="width:100%;height:25px;"><?php echo get_post_meta($post->ID, 'email', 1); ?></textarea>
	</p>
	<p>Адрес доставки (adress):
		<textarea type="text" name="extra[adress]" style="width:100%;height:25px;"><?php echo get_post_meta($post->ID, 'adress', 1); ?></textarea>
	</p>
	<input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />
   <?php
}

// включаем обновление полей при сохранении
add_action('save_post', 'my_extra_fields_update', 0);

/* Сохраняем данные, при сохранении поста */
function my_extra_fields_update( $post_id ){
	if ( !wp_verify_nonce($_POST['extra_fields_nonce'], __FILE__) ) return false; // проверка
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE  ) return false; // если это автосохранение
	if ( !current_user_can('edit_post', $post_id) ) return false; // если юзер не имеет право редактировать запись

	if( !isset($_POST['extra']) ) return false; // выходим если данных нет

	// Все ОК! Теперь, нужно сохранить/удалить данные
	$_POST['extra'] = array_map('trim', $_POST['extra']); // чистим все данные от пробелов по краям
	foreach( $_POST['extra'] as $key=>$value ){
		if( empty($value) ){
			delete_post_meta($post_id, $key); // удаляем поле если значение пустое
			continue;
		}

		update_post_meta($post_id, $key, $value); // add_post_meta() работает автоматически
	}
	return $post_id;
}
// - С плагина end

// Подключение стилей
if (!is_admin()) {
	function blog_styles()
	{
		wp_enqueue_style('style', get_template_directory_uri() . '/style.css', array('bootstrap'));
		// wp_enqueue_style('style', get_template_directory_uri() . '/style.css', ['bootstrap']);
		wp_enqueue_style('bootstrap', get_template_directory_uri() . '/libs/bootstrap/css/bootstrap.min.css');
	}
	add_action('wp_enqueue_scripts', 'blog_styles');
}

if ( !is_admin() ) {
    function register_my_js() {
        wp_enqueue_script( 'my-script', get_bloginfo( 'template_directory' ).'/js/functions.js', array( 'jquery' ), '1.0', true );
    }
    add_action('init', 'register_my_js');
}

// Включаем поддержку меню
//add_theme_support('menus');
//register_nav_menus(['header_menu' => 'Хэдер',	'footer_menu' => 'Футер',]);
register_nav_menus( array(
	'header_menu' => 'Хэдер',
	'footer_menu' => 'Футер',
));

// Включаем поддержку сайдбара
register_sidebar( array(
	'id' => 'right_sidebar',
	'name' => 'Правая колонка',
	'description' => 'Правая боковая колонка',
	'before_widget' => '<div id="%1s" class="panel panel-default %2s">',
	'after_widget' => '</div></div>',
	'before_title' => '<div class="panel-heading">',
	'after_title' => '</div><div class="panel-body">',
));

function prefix_pre_get_posts($query) {
	if ($query->is_category) {
		$query->set('post_type', 'any');
	}
	if ($query->is_tag) {
		$query->set('post_type', 'any');
	}
	return $query;
}
 
add_action('pre_get_posts', 'prefix_pre_get_posts');

// Подготовка WP для использования аякса
add_action('wp_print_scripts','include_scripts'); // действие в котором прикрепим необходимые js скрипты и передадим данные 
function include_scripts(){
        wp_enqueue_script('jquery'); // добавим основную библиотеку jQuery
        wp_enqueue_script('jquery-form'); // добавим плагин jQuery forms, встроен в WP
        wp_enqueue_script('jquery-chained', '//www.appelsiini.net/projects/chained/jquery.chained.min.js'); // добавим плагин для связанных селект листов

        wp_localize_script( 'jquery', 'ajaxdata', // функция для передачи глобальных js переменных на страницу, первый аргумент означет перед каким скриптом вставить переменные, второй это название глобального js объекта в котором эти переменные будут храниться, последний аргумент это массив с самими переменными
			array( 
   				'url' => admin_url('admin-ajax.php'), // передадим путь до нативного обработчика аякс запросов в wp, в js можно будет обратиться к ней так: ajaxdata.url
   				'nonce' => wp_create_nonce('add_object') // передадим уникальную строку для механизма проверки аякс запроса, ajaxdata.nonce
			)
		);
}

// Обработка данных и добавление поста
add_action( 'wp_ajax_nopriv_add_object_ajax', 'add_object' ); // крепим на событие wp_ajax_nopriv_add_object_ajax, где add_object_ajax это параметр action, который мы добавили в перехвате отправки формы, add_object - ф-я которую надо запустить
add_action('wp_ajax_add_object_ajax', 'add_object'); // если нужно чтобы вся бадяга работала для админов
function add_object() {
	$errors = ''; // сначала ошибок нет

	$nonce = $_POST['nonce']; // берем переданную формой строку проверки
	if (!wp_verify_nonce($nonce, 'add_object')) { // проверяем nonce код, второй параметр это аргумент из wp_create_nonce
		$errors .= 'Данные отправлены с левой страницы '; // пишим ошибку
	}

	// запишем все поля
	$parent_cat = (int)$_POST['parent_cats']; // переданный id термина таксономии с вложенностью (родитель)
	$title = strip_tags($_POST['post_title']); // запишем название поста
	$content = wp_kses_post($_POST['post_content']); // контент Номер телефона
	$surname = strip_tags($_POST['surname']); // произвольное поле surname
	$email = strip_tags($_POST['email']); // произвольное поле email
	$adress = wp_kses_post($_POST['adress']); // произвольное поле типа текстарея adress

	// проверим заполненность, если пусто добавим в $errors строку
	// if (!$parent_cat) $errors .= 'Не указан способ доставки';
    // if (!$title) $errors .= '<span class="red">Выберите товар</span>';	
	
	if (!$errors) { // если с полями все ок, значит можем добавлять пост
		$fields = array( // подготовим массив с полями поста, ключ это название поля, значение - его значение
			'post_type' => 'orders', // нужно указать какой тип постов добавляем, у нас это orders
	    	'post_title'   => $title, // заголовок поста
	        'post_content' => $content, // контент
	    );
	    $post_id = wp_insert_post($fields); // добавляем пост в базу и получаем его id

	    update_post_meta($post_id, 'surname', $surname); // заполняем произвольное поле surname
	    update_post_meta($post_id, 'email', $email); // заполняем произвольное поле email
	    update_post_meta($post_id, 'adress', $adress); // заполняем произвольное поле adress

	    wp_set_object_terms($post_id, $parent_cat, 'delivery', true); // привязываем пост к таксономиям, третий параметр это слаг таксономии
	}

	if ($errors) wp_send_json_error($errors); // если были ошибки, выводим ответ в формате json с success = false и умираем
	else wp_send_json_success('Заказ <span class="red">№'.$post_id.'</span> оформлен'); // если все ок, выводим ответ в формате json с success = true и умираем
	
	die(); // умрем еще раз на всяк случай
}