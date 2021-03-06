<?php 
get_header();
//get_header('header-home');
?>
<?php //include "nav-menu.php";?>
<div class="conatainer-main">
  <!--div class="row"-->
  <div class='row'>
	  <div class="col-md-8 col-xs-12">
<?php
  if(have_posts()){
	  
	  while(have_posts()){
		  
		  the_post();?>
	      <div class="row post">
		    <h3 class="poste-title">
				<a href="<?php the_permalink(); ?>">
				<?php the_title('<h3 class="poste-title">','</h3>'); ?>
			    </a>
		    </h3>	 
					<div class="post-info">
				      <span class="author"><i class="fa fa-user fa-fw"></i><?php the_author_posts_link(); ?></span>

					  <span class="date-pub"><i class="fas fa-clock fa-fw"></i><span class="pup-poste"><?php /*the_time('F Y');*/ the_time('Y/m/d'); ?>
					  </span></span>
					  
					  <span class="comments">
					  <i class="fas fa-comments fa-fw"></i>
					  <?php comments_popup_link( 'بدون تعليق', 'تعليق 1', 'تعليقات %','comments-class','التعليقات متوقفة' ); ?>
					  </span>

					  <span class="categorie"><i class="fas fa-folder-open"></i><?php the_category( 'بدون' ); ?></span>

						<span class='post-tags'><i class="fas fa-tags  fa-fw"></i>
						<?php if(has_tag()){
								the_tags();
								}else
								{ echo ";?><style>.post-tags{display:none}</style><?php echo ";}?>
						?>
						</span>
					  </div>
					  <div class="col-md-5"><?php the_post_thumbnail('',['class' => 'img-responsive img-thumbnail wp-post-image']);?></div>
					  <div class="col-md-7 content-post">
					  <?php  echo '<p class="content">' . get_the_excerpt() . '</p>' ?>
					  <div class='readmore'><a href="<?php the_permalink(); ?>">للإطلاع على المزيد  <i class="fa fa-chevron-circle-down" aria-hidden="true"></i></a></div> 
					</div>
				</div>
		  <?php		  
	  }
  }  
?>
</div>	
	
<!--start sidbar by othman-->
<div class="col-md-4 col-xs-12 sidebar">
		   <?php
		   /*
		   get_sidebar('index');
		   get_sidebar('sidebar-main');
		   get_sidebar();
		   wp_get_sidebars_widgets();
		  */
		   if(is_active_sidebar('sidebar-main')){
			   dynamic_sidebar('sidebar-main');
		   };?>
</div>

</div>

</div>
</div>






<div class='pagination-num'>
<?php echo nav_page();?>
</div>



<?php get_footer();?>