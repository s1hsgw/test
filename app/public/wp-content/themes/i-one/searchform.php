<?php

$product_search = 0;
$product_search = get_theme_mod('product_search', 0);

?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php esc_html_e( 'Search for:', 'i-one' ) ?></span>
		<input type="search" class="search-field" placeholder="<?php esc_attr_e( 'Search...', 'i-one' ) ?>" value="<?php echo esc_attr(get_search_query()) ?>" name="s" title="<?php esc_attr_e( 'Search for:', 'i-one' ) ?>" />
	</label>
    <?php if( $product_search == 1 ) { ?>
    <?php echo '<input type="hidden" value="product" name="post_type" id="post_type" />'; ?>
    <?php } ?>
	
    <input type="submit" class="search-submit" value="<?php esc_attr_e( 'Search', 'i-one' ) ?>" />
</form>