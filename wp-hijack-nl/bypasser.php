<?php
/*
Plugin Name: WP Hijack by Nicolas Lagios
Plugin URI: https://github.com/nicolaslagios/wp-hijack
Description: When there is no hook, filter or action and we have to keep the changes in themes and plugins after the update. In this version you have to edit the plugin file directly. In the next version there will be a management panel
Version: 0.0.1
Author: Nicolas Lagios
Author URI: https://nicolaslagios.com
License: GPL v2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: wp-hijack-nl
Domain Path: /languages
GitHub Plugin URI: https://github.com/nicolaslagios/wp-hijack

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
*/


/*On this array we put the file path (without root)
  after we have create the corresponding one inside the subfolder custom-theme-files in the Plugin.
  Also we also need to find a function that characterizes the file.
*/
$theme_replaced_files_array = [
    //0 => ["inc/helpers/helpers-shortcode.php","function flatsome_to_dashed("], //flatsome theme file replacement example
    //1 => ['file.php', 'function some_dentifier_function('], //file, identifier (eg a function name)
];

$plugins_replaced_files_array = [
    //0 => ['file.php', 'function some_dentifier_function('],
    //1 => ['file.php', 'function some_dentifier_function('],
    //etc
];


/* ---------------------  From this line on, we don't change anything --------------------- */
if (count($theme_replaced_files_array) > 0) {
    foreach ($theme_replaced_files_array as $theme_file) {
        $theme_file_path = get_template_directory() . '/' . $theme_file[0];
        $plugin_file_content = '<?php include "' . plugin_dir_path( __FILE__ ) . 'custom-theme-files/' . $theme_file[0] . '";' . PHP_EOL;
        if (file_exists($theme_file_path) && is_writable($theme_file_path)) {
            $content = file_get_contents($theme_file_path);
            if (strpos($content, $theme_file[1]) !== false) {
                file_put_contents($theme_file_path, $plugin_file_content);
            } else {
                echo "<script>console.log('not found the function ".$theme_file[1]." after the theme update');</script>";
            }
        } else {
            echo "<script>console.log('not found the file ".$theme_file_path." or is not writable after the theme update');</script>";
        }
    }
}

if (count($plugins_replaced_files_array) > 0) {
    foreach ($plugins_replaced_files_array as $plugin_file) {
        $plugin_file_path = plugin_dir_path( __FILE__ ) . $plugin_file[0];
        $plugin_file_content = '<?php include "' . plugin_dir_path( __FILE__ ) . 'custom-plugin-files/' . $plugin_file[0] . '";' . PHP_EOL;
        if (file_exists($plugin_file_path) && is_writable($plugin_file_path)) {
            $content = file_get_contents($plugin_file_path);
            if (strpos($content, $plugin_file[1]) !== false) {
                file_put_contents($plugin_file_path, $plugin_file_content);
            } else {
                echo "<script>console.log('not found the function ".$plugin_file[1]." after the plugin update');</script>";
            }
        } else {
            echo "<script>console.log('not found the file ".$plugin_file_path." or is not writable after the plugin update');</script>";
        }
    }
}
