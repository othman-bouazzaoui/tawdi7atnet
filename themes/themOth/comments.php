<?php 
if(comments_open()){
	/*
	foreach($comments as $comment){
		echo comment_author();
	};*/
	?>
	<h1 class="number-comments"><?php comments_number('لا يوجد أي تعليق','تعليق 1','تعليقات %')?></h2>
	<?php
	echo '<ul class="list-unstyled all-comments">';
	$arg = array(
		'max_depth' => 4,
		'type'      => 'comment',
		'reverse_top_level' => true
	);
	wp_list_comments($arg);
	echo '</ul>';
				$commenter = wp_get_current_commenter();
				$req = get_option( 'require_name_email' );
				$aria_req = ( $req ? " aria-required='true'" : '' );
	$arg_comments = array(
	
			'fields' => array(
								'author' =>
								'<p class="comment-form-author"><label for="author">' . __( 'الإسم الكامل', 'domainreference' ) .
								( $req ? '<span class="required">*</span>' : '' ) . '</label>' .
								'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
								'" size="30"' . $aria_req . ' /></p>',

							  'email' =>
								'<p class="comment-form-email"><label for="email">' . __( 'إمايلك', 'domainreference' ) .
								( $req ? '<span class="required">*</span>' : '' ) . '</label>' .
								'<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
								'" size="30"' . $aria_req . ' /></p>',

							  'url' =>
								'<p style="display:none" class="comment-form-url"><label for="url">' . __( 'Website', 'domainreference' ) . '</label>' .
								'<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
								'" size="30" /></p>'
		),
		'title_reply'       => 'أترك تعليق' ,
		'comment_notes_after' => '',
		'comment_field' =>  '<p class="comment-form-comment"><label for="comment">' . _x( '', 'noun' ) .
    '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true">' .
    '</textarea></p>',
		'label_submit'=>'إرسال',
		'logged_in_as' => '<p class="logged-in-as">' .
    sprintf(
    __( 'تعليق بحساب <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">هل تريد الخروج؟</a>' ),
      admin_url( 'profile.php' ),
      $user_identity,
      wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
    ) . '</p>',
	 'must_log_in' => '<p class="must-log-in">' .
    sprintf(__( 'You must be <a href="%s">logged in</a> to post a comment.' ),wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )) . '</p>',
	'comment_notes_before' => '<p class="comment-notes">' .__( '' ) . ( $req ? $required_text : '' ) .'</p>'


		
	);
	comment_form($arg_comments);
}else{
	echo "no comments";
}