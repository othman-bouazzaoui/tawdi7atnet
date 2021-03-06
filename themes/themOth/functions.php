<?php
	
	// include class wp-bootstrap-navwalker.php
	require_once('wp-bootstrap-navwalker.php');
	/*
	function wpdocs_theme_name_scripts() {
    wp_enqueue_style( 'style-name', get_stylesheet_uri() );
    wp_enqueue_script( 'script-name', get_template_directory_uri() . '/js/example.js', array(), '1.0.0', true );
				}
	add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );

	*/
	/*
		**Pour Ajouter Un Style
		**wp_enqueue_style()
	*/
	
	function Add_Style()
	{
		
		wp_enqueue_style('Style-bootstrap',get_template_directory_uri().'/css/bootstrap.min.css');
		//wp_enqueue_style('Style-fontawesome',get_template_directory_uri().'/css/fontawesome.css');
		//wp_enqueue_style('Style-fontawesome55',get_template_directory_uri().'/css/fontawesome5.css');
		wp_enqueue_style('Style-fontawesome5',get_template_directory_uri().'/css/all.css');
		//wp_enqueue_style('Style-css',get_template_directory_uri().'/css/main-style.css');
		wp_enqueue_style('Style-css-m',get_template_directory_uri().'/css/main-style-m.css');
		wp_enqueue_style('Style-font-awesome4.6.3','http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css');
		//wp_enqueue_style('Style-twitter-bootstrap2.3.2','http//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css');
		//wp_enqueue_style('Style-font-awesome3.2.1','http//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css');
		wp_enqueue_style('Style-icon-fontawesome','https://use.fontawesome.com/releases/v5.3.1/css/all.css');
	}
	/*
		**Pour Ajouter Un Script
		**wp_enqueue_Script()
	*/
	
	function Add_script()
	{

		
		wp_deregister_script('jquery') ;//Annuler Jquery
		wp_register_script('jquery', includes_url('/js/jquery/jquery.js'), false, '', true);//activer jquery avec nouveau proprité
		wp_enqueue_script('jquery');//integration JQUERY dans le Site
		wp_enqueue_script('bootstrap',get_template_directory_uri().'/js/bootstrap.min.js',array('jquery'),false,true);
		wp_register_script('jquery-w', 'https://code.jquery.com/jquery-3.3.1.min.js');
		wp_enqueue_script('script',get_template_directory_uri().'/js/script.js',array('jquery-w'),false,true);
		// If NAVIGATEUR < IE9
		wp_enqueue_script('html5shiv',get_template_directory_uri().'/js/html5shiv.min.js');
		wp_script_add_data('html5shiv','conditional', 'lt IE 9' );
		wp_enqueue_script('respond',get_template_directory_uri().'/js/respond.min.js');
		wp_script_add_data('respond','conditional', 'lt IE 9' );
		/*
		** Ajouter Menu pour Desing
		** Othman
		*/
	
	}
		function Add_Menu_free(){
		register_nav_menus(array(
			'menu_one' => 'menu principale', 
			'menu_too' => 'menu Secondaire',
			'menu-three'=> 'menu Secondaire2'
		));
	}
	//overite sur le nom de la class ...
	//menu 1
	function add_menu(){
		wp_nav_menu(array(

				'theme_location' => 'menu_one',
				'menu_class' 	 => 'nav navbar-nav navbar-right',
				'container'		 => false,
				'depth'			 => 2,
				'walker'		 => new wp_bootstrap_navwalker()

		));
	}
	
	//menu 2
	function add_menu2(){
		wp_nav_menu(array(

				'theme_location' => 'menu_too',
				'menu_class' 	 => 'nav navbar-nav navbar-left',
				'container'		 => false,
				'depth'			 => 2,
				'walker'		 => new wp_bootstrap_navwalker()

		));
	
	}
	//menu 3
	function add_menu3(){
		wp_nav_menu(array(

				'theme_location' => 'menu_three',
				'menu_class' 	 => 'nav navbar-nav navbar-left',
				'container'		 => false,
				'depth'			 => 2,
				'walker'		 => new wp_bootstrap_navwalker()

		));
	
	}
	// fuction controle length read more
	
	function read_excerpt_length( $length ) {
		if(is_author()){
			return 15;
		}else{
			return 30;
		}
			}
	function read_excerpt_more( $more ) {
			return '...';
			}
    //function paginnation
	function nav_page(){
		
		global $wp_query; //wp_query to global 
		$all_page = $wp_query->max_num_pages;//get all pages
		$current_page = max(1,get_query_var('paged')); //get current page
		if($all_page > 1){ //check 
			return paginate_links(array(
			
				'base'		=> get_pagenum_link().'%_%',
				'format'	=> 'page/%#%',
				'current'	=> $current_page,
				'next_text' => '>>',
				'prev_text' => '<<'

			
			));
		}
	}
	/*
	** ADD ACTION
	** IN TEMPLATE
	*/
	add_action( 'wp_enqueue_scripts', 'Add_script');//add script
	add_action( 'wp_enqueue_scripts', 'Add_Style');//add style
	add_action('init','Add_Menu_free'); //add menu 
	
	//filtre read more
	add_filter( 'excerpt_length', 'read_excerpt_length');
	add_filter( 'excerpt_more', 'read_excerpt_more' );
	
	// pour activer support image screenshot de poste
	add_theme_support( 'post-thumbnails' ); 
	//register sidebar
	function tw7_sidebar(){

				register_sidebar(array(
		
				'name'          => 'sidebar-main ',
				'id'            => 'sidebar-main',    // ID should be LOWERCASE  ! ! !
				'description'   => '',
				'class'     	=> 'sidebar-main',
				'before_widget' => '<div class="widget-sidebar">',
				'after_widget'  => '</div>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>'
			
					));
		
	
	}
	add_action('widgets_init','tw7_sidebar');
	?>
	
