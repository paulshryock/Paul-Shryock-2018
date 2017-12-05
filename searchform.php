<form role="search" method="get" class="search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
  <fieldset>
  	<p><label class="screen-reader-text" for="s"><?php _e( 'Search', 'paul-shryock-2018' ); ?></label><input type="search" placeholder="<?php echo esc_attr( 'Search for...', 'paul-shryock-2018' ); ?>" name="s" id="search-input" value="<?php echo esc_attr( get_search_query() ); ?>" required /><button id="search-submit">Search</button></p>
  </fieldset>
</form><!-- .search -->