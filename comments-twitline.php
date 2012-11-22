<?php
/**
 * The template for displaying Twitline.
 */
?>
<style>
.commentlist .avatar {
	position: relative;
	top: 0;
	left: 0;
	float: left !important;
	margin: 0 10px 0 0;
}
#author-avatar img, .commentlist .avatar, .commentlist .children .avatar, #dk_social_links img.photo{
	background: white;
	border: 0 solid #fff;
	-webkit-box-shadow: none;
	-moz-box-shadow: none;
	box-shadow: none;
	padding: 3px
}
.entry-meta .edit-link a, .commentlist .edit-link a {
	float: none
}
.commentlist .children .avatar {
	top: 0;
	left: 0
}
.commentlist .children li.comment .comment-content {
	margin: 0
}
.comment-meta .fn {
	font-style: normal;
	font-family: segoe ui light;
	font-size: 23px;
	text-transform: lowercase
}
.comment-meta .date_fn {
	font-style: normal;
	font-family: segoe ui light;
	margin-left: 10px
}
.commentlist .children li.comment .comment-meta {
	margin-left: 0
}
.commentlist .children li.comment .fn {
	display: initial
}
.commentlist>li.comment, .commentlist>li.bypostauthor, .commentlist .children>li.bypostauthor, .commentlist .children>li.comment {
	background: #fff;
	border: 0;
	border: 1px solid #DDD;
	border-bottom-width: 0;
	-moz-border-radius: 0;
	-webkit-border-radius: 0;
	border-radius: 0
}
.commentlist .children>li.bypostauthor, .commentlist .children>li.comment {
	border-width: 1px 0 0 0
}
.commentlist .children {
	margin: 1.625em 0 0
}
.commentlist .children li.comment {
	margin: 0 0 0 5.625em;
	padding: 1.625em 0 0;
}
.commentlist > li.comment {
	margin: 0;
}
.commentlist>li.bypostauthor, .commentlist .children>li.bypostauthor {

}
.commentlist>li::before, .commentlist>li.bypostauthor::before {
	content: ''
}
#comments {
	margin-top: 0
}
#respond {
	background: transparent url(img/respone-bg.jpg) left top repeat scroll;
	border: 0;
	border: 1px solid #ddd;
	border-left-width: 5px;
	width: 63.6%;
	overflow: hidden;
	-moz-border-radius: 0;
	-webkit-border-radius: 0;
	border-radius: 0
}
#respond input#submit, #contactarea input#submitbutton {
	background-image: linear-gradient(bottom, #ececec 0, #fafafa 90%);
	background-image: -o-linear-gradient(bottom, #ececec 0, #fafafa 90%);
	background-image: -moz-linear-gradient(bottom, #ececec 0, #fafafa 90%);
	background-image: -webkit-linear-gradient(bottom, #ececec 0, #fafafa 90%);
	background-image: -ms-linear-gradient(bottom, #ececec 0, #fafafa 90%);
	background-image: -webkit-gradient(linear, left bottom, left top, color-stop(0, #ececec), color-stop(0.9, #fafafa));
	font-family: 'Segoe UI';
	text-transform: lowercase;
	border: 1px solid #ccc;
	outline: 0;
	-moz-border-radius: 3px;
	border-radius: 3px;
	color: #333;
	cursor: pointer;
	font-size: 16px;
	margin: 20px 5px;
	padding: 5px 10px;
	position: relative;
	left: -6px;
	text-shadow: 0 1px 0 rgba(255,255,255,0.8)
}
#respond input#submit:hover, #nav-single .nav-previous a:hover, #nav-single .nav-next a:hover, p.tag-list a, p.tag-list a:hover, #contactarea input#submitbutton:hover, #contactarea input#submitbutton:focus {
	background-image: linear-gradient(bottom, #f3f3f3 0, #fcfcfc 90%);
	background-image: -o-linear-gradient(bottom, #f3f3f3 0, #fcfcfc 90%);
	background-image: -moz-linear-gradient(bottom, #f3f3f3 0, #fcfcfc 90%);
	background-image: -webkit-linear-gradient(bottom, #f3f3f3 0, #fcfcfc 90%);
	background-image: -ms-linear-gradient(bottom, #f3f3f3 0, #fcfcfc 90%);
	background-image: -webkit-gradient(linear, left bottom, left top, color-stop(0, #f3f3f3), color-stop(0.9, #fcfcfc));
	border-color: #1982d1;
	text-decoration: none
}
#respond input#submit:active, #respond input[type="text"]:focus, #respond textarea:focus, #nav-single .nav-previous a:active, #nav-single .nav-next a:active, #contactarea input#submitbutton:active, #contactarea input:focus, #contactarea textarea:focus {
	border: 1px solid #fafafa;
	background-color: transparent;
	background-image: linear-gradient(bottom, #f5f5f5 86%, #f0f0f0 100%);
	background-image: -o-linear-gradient(bottom, #f5f5f5 86%, #f0f0f0 100%);
	background-image: -moz-linear-gradient(bottom, #f5f5f5 86%, #f0f0f0 100%);
	background-image: -webkit-linear-gradient(bottom, #f5f5f5 86%, #f0f0f0 100%);
	background-image: -ms-linear-gradient(bottom, #f5f5f5 86%, #f0f0f0 100%);
	background-image: -webkit-gradient(linear, left bottom, left top, color-stop(0.86, #f5f5f5), color-stop(1, #f0f0f0));
	color: #222;
	-webkit-box-shadow: inset 0 1px 3px rgba(0,0,0,0.2);
	-moz-box-shadow: inset 0 1px 3px rgba(0,0,0,0.2);
	box-shadow: inset 0 1px 3px rgba(0,0,0,0.2)
}
#respond input[type="text"], #respond textarea, #contactarea input, #contactarea textarea {
	background: white;
	border: 1px solid #ddd;
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	border-radius: 3px;
	-webkit-box-shadow: 0 1px 0 rgba(255,255,255,0.9);
	-moz-box-shadow: 0 1px 0 rgba(255,255,255,0.9);
	box-shadow: 0 1px 0 rgba(255,255,255,0.9)
}
#respond .comment-form-author label, #respond .comment-form-email label, #respond .comment-form-url label, #respond .comment-form-comment label {
	background: transparent;
	-webkit-box-shadow: none;
	-moz-box-shadow: none;
	box-shadow: none;
	color: #555;
	display: inline-block;
	font-size: 13px;
	left: 4px;
	min-width: 60px;
	padding: 4px 10px;
	position: relative;
	top: 40px;
	z-index: 1
}
</style>
	<div id="comments">
	<?php if ( post_password_required() ) : ?>
		<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.'); ?></p>
	</div><!-- #comments -->
	<?php
			/* Stop the rest of comments.php from being processed,
			 * but don't kill the script entirely -- we still have
			 * to fully load the template.
			 */
			return;
		endif;
	?>

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h2 id="comments-title">
			<?php
				printf( _n( 'One thought', '%1$s thoughts', get_comments_number()),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		</h2>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-above">
			<h1 class="assistive-text"><?php _e( 'Comment navigation'); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments') ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;') ); ?></div>
		</nav>
		<?php endif; ?>

		<ol class="commentlist">
			<?php
				wp_list_comments( array( 'callback' => 'twitline_comment', 'reverse_top_level'=>true ) );
			?>
		</ol>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below">
			<h1 class="assistive-text"><?php _e( 'Comment navigation'); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments') ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;') ); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>
	<?php endif; ?>

	<?php comment_form(); ?>

</div><!-- #comments -->
