<?php 
//get_header();
get_header('home');
?>

<div class="container-cat">
  <div class="category-page">
  <!-- title of ctaegory -->
  <h1 class='title-cat-single'><?php echo 'قسم : ';single_cat_title(); ?></h1>
  <p class='description-category'><?php //echo 'description'.category_description();?></p>
<?php
  if(have_posts()){
	  
	  while(have_posts()){
		  
		  the_post();?>
		  <div class="blog-poste-cat">
		    <h3 class="poste-title-cat">
				<a href="<?php the_permalink(); ?>">
				<?php the_title('<h3 class="poste-title">','</h3>'); ?>
			    </a>
		    </h3>
					  <span class="author">
					  <i class="fa fa-user fa-fw"></i>
					  <?php the_author_posts_link(); ?>
					  </span>
					  <span class="date-pub">
					  <i class="fas fa-clock fa-fw"></i>
					  <?php the_time('j F Y'); ?>
					  </span>
					  <span class="comments">
					  <i class="fas fa-comments fa-fw"></i>
					  <?php comments_popup_link( 'بدون تعليق', 'تعليق 1', 'تعليقات %','comments-class','التعليقات متوقفة' ); ?>
					  </span>
					  <span class="categorie">
						<i class="fas fa-folder-open"></i>
						<?php the_category( 'no cat' ); ?>
						</span>
						
						<span class='post-tags'>
						<i class="fas fa-tags  fa-fw"></i>
						<?php if(has_tag()){
							the_tags();
						}else{ echo "بدون";}
						?>
						</span>
					  <?php the_post_thumbnail('',['class' => 'thumbnail-img']);?>
					 
					  <?php  echo '<p class="content-cat">' . get_the_excerpt() . '</p>' ?>
					  </p>
					  <div class='readmore'><a href="<?php the_permalink(); ?>">تابع القراءة</a></div>
					   
				
		 
				
		   </div>

		  <?php
		  
		  
	  }
  }
  
?>
		     <?php
		   //get_sidebar();
		   /*
		   if(is_active_sidebar('sidebar-main')){
			   dynamic_sidebar('sidebar-main');
		   }
		   */
			   ;?>
	</div>



	<div class='pagination-num'>
<?php echo nav_page();?>
</div>
</div>
<!--
<div class="container">
  <div class="row">
    <div class="col-sm">
      <div class="blog-poste">
	  <h3 class="poste-title">title of poste 1</h3>
	  <span class="author">Othman</span><i class="fa fa-user fa-fw"></i>
	  <span class="date-pub">22/08/2018</span>
	  <span class="comments">2 comments</span>
	  <img class="" src="http://tawdi7atnet.com/wp-content/themes/them_Othman/screenshot.jpg" atl=""/> 
	  <p class="content">test test test test test test test test test test test test test test test test test test test test test test test
	  test test test test test test test test test test test test test test test test test test test test test test test test test
	  test test test test test test test test test test test test test test test test test test test test test test test test</p>
	  <p class="categorie">Categorie</p>
	  </div>
    </div>
  </div>
</div>
-->
<?php get_footer();?>