<?php

/**
 * @wordpress-plugin
 * Plugin Name:       ConvesioAgenticCommerce
 * Plugin URI:        https://sirvelia.com/
 * Description:       A WordPress plugin made with PLUBO.
 * Version:           1.0.0
 * Author:            Sirvelia
 * Author URI:        https://sirvelia.com/
 * License:           GPL-3.0+
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:       convesio-agentic-commerce
 * Domain Path:       /languages
 * Update URI:        false
 * Requires Plugins:
 */

if (!defined('WPINC')) {
    die('YOU SHALL NOT PASS!');
}

// PLUGIN CONSTANTS
define('CONVESIO_AGENTIC_COMMERCE_NAME', 'convesio-agentic-commerce');
define('CONVESIO_AGENTIC_COMMERCE_VERSION', '1.0.0');
define('CONVESIO_AGENTIC_COMMERCE_PATH', plugin_dir_path(__FILE__));
define('CONVESIO_AGENTIC_COMMERCE_BASENAME', plugin_basename(__FILE__));
define('CONVESIO_AGENTIC_COMMERCE_URL', plugin_dir_url(__FILE__));
define('CONVESIO_AGENTIC_COMMERCE_ASSETS_PATH', CONVESIO_AGENTIC_COMMERCE_PATH . 'dist/' );
define('CONVESIO_AGENTIC_COMMERCE_ASSETS_URL', CONVESIO_AGENTIC_COMMERCE_URL . 'dist/' );

// AUTOLOAD
if (file_exists(CONVESIO_AGENTIC_COMMERCE_PATH . 'vendor/autoload.php')) {
    require_once CONVESIO_AGENTIC_COMMERCE_PATH . 'vendor/autoload.php';
}

// LYFECYCLE
register_activation_hook(__FILE__, [ConvesioAgenticCommerce\Includes\Lyfecycle::class, 'activate']);
register_deactivation_hook(__FILE__, [ConvesioAgenticCommerce\Includes\Lyfecycle::class, 'deactivate']);
register_uninstall_hook(__FILE__, [ConvesioAgenticCommerce\Includes\Lyfecycle::class, 'uninstall']);

// LOAD ALL FILES
$loader = new ConvesioAgenticCommerce\Includes\Loader();
