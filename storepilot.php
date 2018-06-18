<?php
/**
 * Plugin Name: StorePilot-Woo
 * Plugin URI: https://storepilot.com
 * Description: StorePilot is a product management application, making WooCoomerce available from the Desktop.
 * Version: 1.0.1
 * Author: StorePilot AS
 * Requires at least: 4.4
 * Tested up to: 4.9
 *
 * Text Domain: storepilot
 *
 * Copyright: © 2018 StorePilot AS
 * License: GPLv3
 * License URI: https://www.gnu.org/licenses/gpl.html
 *
 * @link https://storepilot.com
 * @package StorePilot
 * @category Management
 * @author StorePilot AS
 */

if (defined('ABSPATH') && !class_exists('StorePilot')) {

	include_once(plugin_dir_path(__FILE__) . 'includes/storepilot_core.php');

  /**
   * StorePilot version -  Used for Licensing
   * @var string
   */
  define('SP_FILE', __FILE__ );
  $version = '1.0.0';

  final class StorePilot extends StorePilotCore
  {

    /**
     * Main StorePilot Instance
     *
     * Ensures only one instance of StorePilot is loaded or can be loaded
     *
     * @since 1.0.0
     * @static
     * @see SP()
     * @return StorePilot - Main instance
     */
    public static function instance($version)
    {
      if (is_null(self::$_instance)) {
        self::$_instance = new self($version);
      }
      return self::$_instance;
    }

  }

  /**
   * Main instance of StorePilot
   *
   * Returns the main instance of SP to prevent the need to use globals
   *
   * @since  1.0.0
   * @return StorePilot
   */
  function SP($version)
  {
    return StorePilot::instance($version);
  }

  // Fire Constructor
  $SP = SP($version);

} else {
  exit; // Exit if accessed directly or SP already defined
}