<?php

/* filter menu item urls */
if(!function_exists('avia_maps_key_for_plugins'))
{
	add_filter( 'script_loader_src', 'avia_maps_key_for_plugins', 10 , 99, 2 );

	function avia_maps_key_for_plugins ( $url, $handle  )
	{
		$key = get_option( 'gmap_api' );
		
		if ( ! $key ) { return $url; }
		
		if ( strpos( $url, "maps.google.com/maps/api/js" ) !== false || strpos( $url, "maps.googleapis.com/maps/api/js" ) !== false ) 
		{
			if ( strpos( $url, "key=" ) === false ) 
			{	
				$url = "https://maps.google.com/maps/api/js?v=3.27";
				$url = esc_url( add_query_arg( 'key',$key,$url) );
			}
		}
		
	
		return $url;
	}
}