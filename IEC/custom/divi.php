<?php /* divi */
// add do_shortcode to footer credits
if ( ! function_exists( 'et_get_footer_credits' ) ) {
  function et_get_footer_credits() {
  	$original_footer_credits = et_get_original_footer_credits();

  	$disable_custom_credits = et_get_option( 'disable_custom_footer_credits', false );

  	if ( $disable_custom_credits ) {
  		return '';
  	}

  	$credits_format = '<%2$s id="footer-info">%1$s</%2$s>';

  	$footer_credits = et_get_option( 'custom_footer_credits', '' );

  	if ( '' === trim( $footer_credits ) ) {
  		return et_get_safe_localization( sprintf( $credits_format, $original_footer_credits, 'p' ) );
  	}
    $footer_credits = do_shortcode($footer_credits);
  	return et_get_safe_localization( sprintf( $credits_format, $footer_credits, 'div' ) );
  }
}

// Begin custom image size for Blog Module
add_filter( 'et_pb_blog_image_height', 'blog_size_h' );
add_filter( 'et_pb_blog_image_width', 'blog_size_w' );

function blog_size_h($height) {
	return '200';
}

function blog_size_w($width) {
	return '200';
}

add_image_size( 'custom-blog-size', 200, 200, true );
// End custom image size for Blog Module
