<?php 
//get_header();
get_header('header-home');
?>

<div class="conatainer-main">
<div class='row'>
<?php
  if(have_posts()){
	  
	  while(have_posts()){
		  
		  the_post();?>
		  
		  <div class="col-md-8 col-xs-12 main-signle">
		  
		    <h3 class="poste-title">
				<a href="<?php the_permalink(); ?>">
				<?php the_title('<h3 class="poste-title">','</h3>'); ?>
			    </a>
				<?php edit_post_link('Modifier');//pour afficher boutton modifier à l'administrateur?>
		    </h3>
			<div class='info-poste-single'>
					  <span class="author">
					  <i class="fa fa-user fa-fw"></i>
					  <?php the_author_posts_link(); ?>
					  
					  </span>
					  <span class="date-pub">
					  <i class="fas fa-clock fa-fw"></i>
					  <?php the_time('j F Y') ?>
					  </span>
					  <span class="comments">
					  <i class="fas fa-comments"></i>
					  <?php comments_popup_link( 'بدون تعليق', 'تعليق 1', 'تعليقات %','comments-class','التعليقات متوقفة' ); ?>
					  </span>
			</div>
					  <?php //the_post_thumbnail('',['class' => 'thumbnail-img']);?>
					  <p class="content">
					  <!--<?php //the_content('read more...') methode quick 1; ?>-->
					  <?php the_content() ;?>
					  </p>
					  <p class="categorie">
					  <i class="fas fa-folder-open"></i>
					  <?php 
					      echo "قسم :";the_category( ' ' );
						?>
					  </p>
						<p class='post-tags'>
						<?php if(has_tag()){
							the_tags();
						}//else{ echo "no tags";}
						?>
				</div>
				<hr>
<!--start sidbar by othman-->
<div class='col-md-4 col-xs-12 sidebar'>
		   <?php
		   /*
		   get_sidebar('index');
		   get_sidebar('sidebar-main');
		   get_sidebar();
		   wp_get_sidebars_widgets();
		  */
		   if(is_active_sidebar('sidebar-main')){
			   dynamic_sidebar('sidebar-main');
		   }
		   
			   ;?>
			   </div>
			</div>
		</div>
<!-- related posts -->			

				<?php 
				/* get post ID
				global $post;
				echo $post->ID.'<br>';
				echo get_queried_object_id();
				*/
				/* category ID
				print_r(wp_get_post_categories(get_queried_object_id()));
				*/
				?> 
				<div class='related-post_signle'>
				<?php
					  $args_random = array(
						'posts_per_page' 	=> 4,
						'orderby'			=> 'rand',
						'category__in'		=> wp_get_post_categories(get_queried_object_id()),
						'post__not_in'		=> array(get_queried_object_id())
					  );
					  $random_post =new WP_Query($args_random);
					  if($random_post->have_posts()){
						  while($random_post->have_posts()){ 
							  $random_post->the_post();?>
								<h3 class="poste-title list-group-item">
									<a href="<?php the_permalink(); ?>">
									<?php the_title('<h3 class="poste-title">','</h3>'); ?>
									</a>
								</h3>
								<?php //the_post_thumbnail('',['class' => 'img-responsive img-thumbnail wp-post-image']);?>
							  <?php
									}
								}else{
									echo 'no posts related with this post';
								}
								
  wp_reset_postdata();
  ?>
	</div>
				

				
				<hr>
		 <div class="navigation">
		  <?php //if( get_previous_post_link() ) {previous_post_link('%link','%title');}; ?>
		  <?php //if( get_next_post_link() ) {next_post_link('%link','%title');}; ?>
			 </div>
			 <div class="user-infos">
			 <!-- img avatar -->
			 <span style="display: block;">
			 <?php 
					//get_avatar('ID or Email','SIze','Default','alternate-test','Array-args')
					$argumts = array(
						'class'=>'img_avat'
					);
					echo get_avatar(get_the_author_meta('ID'),'90','','Avatar',$argumts)
			 
			 ?>
			 </span>
			 <!-- user information -->
			 <span>
				<?php the_author_meta('first_name')?>
				<?php the_author_meta('last_name')?>
				<?php the_author_meta('nickname')?>
			</span>
			
			<?php //if(get_the_author_meta('description')){?>
			<p><?php //the_author_meta('description')?></p>
			<?php //}else{echo '<p>No biographie</p>';}?>
			
					<!--Nombre des posts par cet user <?php //echo count_user_posts(get_the_author_meta('ID'))?>
					visiter ce profile--> <?php //echo the_author_posts_link();?>
					<div>
			<hr>
		<div class="comments">
		  <?php
		  comments_template();
		  ?>
		  <a href="<?php echo wp_login_url(); ?>" title="Login">تسجيل الدخول</a><span> أو </span>
		  <a href="<?php echo wp_registration_url(); ?>" title="Login">التسجبل في المدونة</a>
		  <?php
				}
			}
			?>
			</div>


<?php get_footer();?>