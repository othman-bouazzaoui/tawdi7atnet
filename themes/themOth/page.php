<?php 
get_header();
//get_header('home');
?>
<div class="container-body">
<?php
  if(have_posts()){
	  
	  while(have_posts()){
		  
		  the_post();?>
		  
		  <div class="blog-poste-page">
		  
		    <h3 class="poste-title">
				<a href="<?php the_permalink(); ?>">
				<?php the_title('<h3 class="poste-title">','</h3>'); ?>
			    </a>
				<?php edit_post_link('Modifier');//pour afficher boutton modifier à l'administrateur?>
		    </h3>
					

					  <?php //the_post_thumbnail('',['class' => 'thumbnail-img']);?>
					  <p class="content">
					  <!--<?php //the_content('read more...') methode quick 1; ?>-->
					  <?php the_content() ;?>
					  </p>
				</div>
				<hr>
	
			<hr>
		  <?php
		 
		  
	  }
  }
?>
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