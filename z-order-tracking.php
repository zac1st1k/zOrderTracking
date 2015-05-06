<?php

/*
Plugin Name: zTracking
Plugin URI: http://URI_Of_Page_Describing_Plugin_and_Updates
Description: Order tracking system
Version: 1.0
Author: Zac
Author URI: http://URI_Of_The_Plugin_Author

    Copyright 2015  Zac  (email : zac@)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


// This just echoes the chosen line, we'll position it later
function zTracking() {

    echo "<div class = widget widget_search id = tracking>";
	echo "<p id='tracking-text'>Please Input Your Tracking Number.</p>";
	echo "<form>";
	echo "<input type='text' name='tracking-number' placeholder='Enter Tracking Number'>";
	echo "<br><br><input type='submit' value='Submit'>";
	echo "</form>";
	
	global $wpdb;
    $results = $wpdb->get_results( 'SELECT * FROM orders WHERE id = "FZ0005193692"', OBJECT );
    echo $results[0]->time;
	
	echo "</div>";
}

// Now we set that function up to execute when the admin_notices action is called
// add_action( 'admin_notices', 'hello_world' );
add_action( 'get_sidebar', 'zTracking' );

// We need some CSS to position the paragraph
function trackingcss() {
	// This makes sure that the positioning is also good for right-to-left languages

	echo "
	<style type='text/css'>
	#tracking
     	font-family: 'Noto Sans', sans-serif;
     	letter-spacing: 0.04em;
		padding-right: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
}

// add_action( 'admin_head', 'hello_world_css' );
add_action( 'wp-head', 'trackingcss' );

function queryTracking() {
    global $wpdb;
    $results = $wpdb->get_results( 'SELECT * FROM order WHERE id = FZ0005193692', OBJECT );
    // $results = $wpdb->get_results( 'SELECT * FROM order WHERE id = FZ0005193692', ARRAY_A );
}

?>