<?php
/*
Plugin Name: DevCaps
Plugin URI:  craftplustech.com
Description: Corrects programming language capitalization
Version:     1.0
Author:      Amy Yuen Ying Chan
Author URI:  craftplustech.com
License:     GPLv3 or later
License URI: https://www.gnu.org/licenses/gpl-3.0.html

DevCaps is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
any later version.

DevCaps is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with DevCaps. If not, see https://www.gnu.org/licenses/gpl.html.

@param string $text The text to be modified.
@return string The modified text.
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

function cap_program_name( $content ) {

    // note to self: accord for extension
    return str_replace(
        array( 'test'),
        array( 'Test' ),
    $content );

}

add_filter('the_title', 'cap_program_name');
add_filter('the_content', 'cap_program_name');