<?php
/*
Plugin Name: Add Top Menu Logout Link
Description: Adds a link to the toip menu to logout users
Version: 0.1
Author: The team at PIE
Author URI: http://pie.co.de
License:     GPL3
License URI: https://www.gnu.org/licenses/gpl-3.0.html
*/

/* PIE\AddTopMenuLogoutLink is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 2 of the License, or any later version.

PIE\AddTopMenuLogoutLink is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with PIE\AddTopMenuLogoutLink. If not, see https://www.gnu.org/licenses/gpl-3.0.en.html */

namespace PIE\AddTopMenuLogoutLink;


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Add logout link to top menu
 *
 * @param string $items  current menu items HTML
 * @param object $args
 */
function add_logout_menu_link( $items, $args ) {
    if ( $args->theme_location == 'top' ) {
        if ( is_user_logged_in() ) {
          $items = '<li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="'. wp_logout_url() .'">'. __("Logout") .'</a></li>' . $items;
        }
    }

    return $items;
}
add_filter( 'wp_nav_menu_items', __NAMESPACE__ . '\add_logout_menu_link', 10, 2 );
