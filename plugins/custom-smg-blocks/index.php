<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              
 * @since             1.0.0
 * @package           SMG_Blocks
 *
 * @wordpress-plugin
 * Plugin Name:       SMG Blocks
 * Plugin URI:        
 * Description:       Bingo Blocks created by SMG Team.
 * Version:           1.0.1
 * Author:            SMG
 * Author URI:        
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       smg-blocks
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.1 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define('SMG_BLOCKS_VERSION', '1.0.1');
define('SMG_BLOCKS_URL', get_template_directory_uri() . '/plugins/custom-smg-blocks/');


foreach (glob(__DIR__ . '/blocks/*.php') as $file) {
    require_once($file);
}


/*add_action('acf/load_field/name=post_type', function ($field) {
    $field['choices'] = [];
    
    $post_types = get_post_types([], 'objects');

    foreach ($post_types as $post_type) {
        if (!$post_type->publicly_queryable) {
            continue;
        }

        $field['choices'][$post_type->name] = $post_type->label;
    }

    return $field;
});*/

