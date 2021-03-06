<?php 
//get_header();
get_header('home');
?>
<div class="container-body">
<div class='author-info'>
  <span style="display: block;">
			 <?php 
					//get_avatar('ID or Email','SIze','Default','alternate-test','Array-args')
					$argumts = array(
						'class'=>'img_avat'
					);
					echo get_avatar(get_the_author_meta('ID'),'150','','Avatar',$argumts);
			 
			 ?>
			 </span>
			 <!-- user information -->
			 <span>
				(<?php the_author_meta('nickname');/*pseudonyme*/?>)
				<?php the_author_meta('first_name')?>
				<?php the_author_meta('last_name')?>
			</span>
			<?php if(get_the_author_meta('description')){?>
			<p><?php the_author_meta('description')?></p>
			<?php }else{
				echo '<p>No biographie</p>';
			}?>
			
			<!--Nombre des posts par cet user <?php /*echo count_user_posts(get_the_author_meta('ID'))?>
			Poste Count Comments <?php $arg_count = array(
				'user_id' => get_the_author_meta('ID'),
				'count' => true
			);
			echo get_comments($arg_count);
			*/?>
			<!-- end biographir -->
			</div>
	</div>
			<div id="container-author">
  <div class="poste-author">
<?php
  $args = array(
   'author' => get_the_author_meta('ID'),
   'posts_per_page' => 2 //or -1 to show all posts
  );
  $wpquer =new WP_Query($args);
  if($wpquer->have_posts()){
	  
	  while($wpquer->have_posts()){
		  
		  $wpquer->the_post();?>
		  <div class="col-sm">
		  <div class="blog-poste-user">
		    <h3 class="poste-title-user">
				<a href="<?php the_permalink(); ?>">
				<?php the_title('<h3 class="poste-title-user">','</h3>'); ?>
			    </a>
		    </h3>
					  <?php the_post_thumbnail('',['class' => 'thumbnail-img-posts-user']);?>
					  <?php  echo '<p class="content-user">' . get_the_excerpt() . '</p>' ?>				   
				</div>
			<div>
	
			</div>
		   </div>

		  <?php
		  
		  
	  }
  }
  wp_reset_postdata();
 
 $args_comment = array(
   'user_id' 	 => get_the_author_meta('ID'),
   'number' 	 => 10, //or -1 to show all posts
   'status' 	 => 'approve',
   'post_status' => 'publish',
   'post_type'   => 'post'
  );
  
  $comments = get_comments($args_comment);//comments arguments?>
  

  
  <?php/*
  if($comments){
  foreach( $comments as $comment){?>
	  
	      <a href='<?php echo get_permalink($comment->comment_post_ID);?>'>
		  <?php echo get_the_title($comment->comment_post_ID);?>
		  </a>
		  <br>
		  <?php echo mysql2date("Y-M-D",$comment->comment_date);?>
		  <br>
		  <?php echo $comment->comment_content;?>
		 
		  
		  <br>
		  <br>
  <?php }}else{
	  echo 'no comment';
  }
 
*/?>

	</div>
</div>
<?php
  get_footer();
  ?>