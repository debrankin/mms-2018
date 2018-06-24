<?php
/**
 * BoldGrid Library Plugin Checker
 *
 * @package Boldgrid\Plugin
 *
 * @since 1.0.0
 * @author BoldGrid <wpb@boldgrid.com>
 */

namespace Boldgrid\Library\Library\Plugin;

/**
 * BoldGrid Plugin Checker.
 *
 * This class is responsible for plugin related utility helpers.
 *
 * @since 1.0.0
 */
class Checker {
	/**
	 * Plugin pattern.
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 *
	 * @var string
	 */
	private $pluginPattern = '^(boldgrid-|post-and-page-builder)';

	public function __construct() {
		add_action( 'upgrader_process_complete', function() {
			delete_site_transient( 'boldgrid_plugins_filtered' );
		} );
	}

	/**
	 * Check plugins.
	 *
	 * @since 1.1.4
	 */
	public function run() {

		add_action( 'boldgrid_plugins_updated',
			array(
				'Boldgrid\Library\Util\Option',
				'deletePluginTransients',
			),
			10,
			0
		);

		if ( is_admin() ) {
			$this->findUpdated();
		}
	}

	/**
	 * Get pluginPattern.
	 *
	 * @since 2.2.1
	 *
	 * @return string
	 */
	public function getPluginPattern() {
		return $this->pluginPattern;
	}

	/**
	 * Find updated/new BoldGrid plugins.
	 *
	 * Check for post-update actions for BoldGrid plugins.
	 *
	 * @since 1.0.0
	 *
	 * @link https://developer.wordpress.org/reference/functions/get_site_option/
	 * @see get_site_option()
	 * @see Boldgrid\Library\Util\Plugin::getFiltered()
	 *
	 * @return bool
	 */
	public function findUpdated() {
		$updated = array();

		$boldgridSettings = get_site_option( 'boldgrid_settings' );

		$plugins = get_site_transient( 'boldgrid_plugins_filtered' );

		if ( empty( $plugins ) ) {
			$plugins = \Boldgrid\Library\Library\Util\Plugin::getFiltered( $this->pluginPattern );
			set_site_transient( 'boldgrid_plugins_filtered', $plugins );
		}

		foreach ( $plugins as $slug => $data ) {
			if ( empty( $boldgridSettings['plugins_checked'][ $slug ][ $data['Version'] ] ) ) {
				$updated[ $slug ] = $data;

				/**
				 * Action triggered when a BoldGrid plugin is found to be updated or new.
				 *
				 * @since 1.1.4
				 *
				 * @param string $tag  Tag name.
				 * @param string $slug Plugin slug (folder/file).
				 * @param array $data {
				 *     Plugin data from a filtered get_plugins() call.
				 *
				 *     @type string $Name        Plugin name.
				 *     @type string $PluginURI   Plugin URI.
				 *     @type string $Version     Version number/string.
				 *     @type string $Description Description.
				 *     @type string $Author      Author name.
				 *     @type string $AuthorURI   Author URI.
				 *     @type string $TextDomain  Text domain.
				 *     @type string $DomainPath  Domain path.
				 *     @type string $Network     Network.
				 *     @type string $Title       Plugin title.
				 *     @type string $AuthorName  Author name.
				 * }
				 */
				do_action( 'plugin_updated_' . $slug, $slug, $data );
			}

			$boldgridSettings['plugins_checked'][ $slug ][ $data['Version'] ] = time();
		}

		if ( $updated ) {
			/**
			 * When one or more BoldGrid plugins are updated or new, then delete plugin transients.
			 *
			 * @since 1.1.4
			 */
			do_action( 'boldgrid_plugins_updated' );
		}

		update_site_option( 'boldgrid_settings', $boldgridSettings );

		return $updated;
	}
}
