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

    // List of name
    $language_name = [
        "a-frame" => "A-Frame",
        "angularjs" => "AngularJS",
        "cakephp" => "CakePHP",
        "coffeescript" => "CoffeeScript",
        "django" => "Django",
        "ecmascript" => "ECMAScript",
        "javascript" => "JavaScript",
        "jquery" => "jQuery",
        "matlab" => "MATLAB",
        "mariadb" => "MariaDB",
        "mongodb" => "MongoDB",
        "mysql" => "MySQL",
        "numpy" => "NumPy",
        "openui5" => "OpenUI5",
        "postgresql" => "PostgreSQL",
        "rethinkdb" => "RethinkDB ",
        "rubygems" => "RubyGems",
        "ruby on rails" => "Ruby on Rails",
        "scipy" => "SciPy",
        "typescript" => "TypeScript",
        "vb.net" => "VB.NET",
        "xaml" => "XAML",
        "webgl" => "WebGL",
    ];

    // Name that are also extension need to be replaced by regular expression instead
    $name_also_extension = [
        "css" => "CSS",
        "html" => "HTML",
        "json" => "JSON",
        "php" => "PHP",
        "sass" => "Sass",
        "sql" => "SQL",
        "xhtml" => "XHTML",
        "xml" => "XML",
    ];

    foreach ((array)$language_name as $key => $value) {
        $content = str_ireplace( $key, $value, $content );
    }

    // Names that are also extension uses preg_replace to detect the presence of a dot
    foreach ((array)$name_also_extension as $key => $value) {
        $content = preg_replace("/[^.]($key)/i", $value, $content);
    }

    return $content;
}

add_filter('the_title', 'cap_program_name');
add_filter('the_content', 'cap_program_name');