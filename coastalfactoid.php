<?php
/**
 * Plugin Name: Coastal Factoid
 * Description: Provides a Widget to display daily Coastal Factoid from Beachapedia (http://www.beachapedia.org/Main_Page)
 * Version: 0.95
 * Author: Christopher Wilson (cwilson@surfrider.org)
 * License: GPL2
 */

class CFWidget extends WP_Widget {

	function CFWidget() {
		// Instantiate the parent object
		parent::__construct( false, 'Coastal Factoid' );
	}

	function widget( $args, $instance ) {
		// Widget output
		echo '<div class="widget"><h3>Today\'s Coastal Factoid</h3>
		<a href="http://www.beachapedia.org"><img src="' . plugins_url( 'beachapedia.jpg' , __FILE__  ) . '" style="padding:5px;" align="left" /></a>
		<SCRIPT LANGUAGE= "JavaScript">
		function httpGet(theUrl)
    		{
    			var xmlHttp = null;
    			xmlHttp = new XMLHttpRequest();
    			xmlHttp.open( "GET", theUrl, false );
    			xmlHttp.send( null );
    			return xmlHttp.responseText;
    		}
		theText = httpGet("' . plugins_url( 'factoid.php' , __FILE__ ) . '");
		document.write(theText);
		</SCRIPT>
		</div>';

	}
}

function coastalfactoid_register_widgets() {
	register_widget( 'CFWidget' );
}

add_action( 'widgets_init', 'coastalfactoid_register_widgets' );
