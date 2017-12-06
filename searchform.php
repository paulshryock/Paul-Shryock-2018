<?php
/**
 * Template for displaying search forms in Paul Shryock 2018
 *
 * @package WordPress
 * @subpackage Paul_Shryock_2018
 * @since Paul Shryock 2018 1.0
 */
?>

<form role="search" method="get" class="search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
  <fieldset>
  	<p><label class="screen-reader-text" for="s"><?php _e( 'Search', 'paul-shryock-2018' ); ?></label><input type="search" placeholder="<?php echo esc_attr( 'Search for...', 'paul-shryock-2018' ); ?>" name="s" id="search-input" value="<?php echo esc_attr( get_search_query() ); ?>" required /><button type="submit">Search</button></p>
  </fieldset>
</form><!-- .search -->