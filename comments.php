<?php
?>
	<div id="comments">
	<?php if ( post_password_required() ) : ?>
		<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.' ); ?></p>
	</div><!-- #comments -->
	<?php return;
		endif;
	?>

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h2 id="comments-title">
			<?php
				printf( _n( '1 Bình luận', '%1$s bình luận', get_comments_number() ), number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		</h2>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-above">
			<h1 class="assistive-text"><?php _e( 'Trang bình luận' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Bình luận cũ hơn' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Bình luận mới hơn &rarr;' ) ); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>

		<ol class="commentlist">
			<?php wp_list_comments( array( 'callback' => 'moc_comment' ) ); ?>
		</ol>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below">
			<h1 class="assistive-text"><?php _e( 'Trang bình luận' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Bình luận cũ hơn' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Bình luận mới hơn &rarr;' ) ); ?></div>
		</nav>
		<?php endif; ?>
	<?php
		elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="nocomments"><?php _e( 'Bình luận tạm thời đóng.' ); ?></p>
	<?php endif; ?>

	<?php comment_form(array('title_reply'=>'Bình luận', 'comment_notes_before' => '', 'comment_notes_after'=> '', 'title_reply_to' => '@%s')); ?>

</div><!-- #comments -->
