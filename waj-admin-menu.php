<?php

	/*
	Plugin Name:  WAJ Admin Menu
	Plugin URI:   https://github.com/waughjai/waj-admin-menu
	Description:  Simple plugin for automatically generating HTML content from menus created in WP admin.
	Version:      1.0.0
	Author:       Jaimeson Waugh
	Author URI:   https://www.jaimeson-waugh.com
	License:      GPL2
	License URI:  https://www.gnu.org/licenses/gpl-2.0.html
	Text Domain:  waj-admin-menu
	*/

	namespace WaughJ\WAJAdminMenu
	{
		require_once( 'vendor/autoload.php' );

		use WaughJ\WPAdminMenuFactory\WPAdminMenuFactory;
		use WaughJ\WPAdminMenu\WPAdminMenu;
		use function WaughJ\WAJAdminMenu\TestHashItemString;

		add_shortcode
		(
			'header-nav',
			function( $atts )
			{
				return WPAdminMenuFactory::getHeader()->getMenuContent();
			}
		);

		add_shortcode
		(
			'footer-nav',
			function( $atts )
			{
				return WPAdminMenuFactory::getFooter()->getMenuContent();
			}
		);

		add_shortcode
		(
			'admin-nav',
			function( $atts )
			{
				$slug = TestHashItemString( $atts, "slug", null );
				$title = TestHashItemString( $atts, "title", TestHashItemString( $atts, "name", $slug ) );
				if ( $slug && $title )
				{
					$other_args = [];
					test_add_arg( $other_args, $atts, 'nav-class', 'nav', 'class' );
					test_add_arg( $other_args, $atts, 'nav-id', 'nav', 'id' );
					test_add_arg( $other_args, $atts, 'ul-class', 'ul', 'class' );
					test_add_arg( $other_args, $atts, 'ul-id', 'ul', 'id' );
					test_add_arg( $other_args, $atts, 'li-class', 'li', 'class' );
					test_add_arg( $other_args, $atts, 'a-class', 'a', 'class' );
					test_add_arg( $other_args, $atts, 'sublist-class', 'sublist', 'class' );
					test_add_arg( $other_args, $atts, 'subitem-class', 'subitem', 'class' );
					test_add_arg( $other_args, $atts, 'sublink-class', 'sublink', 'class' );
					test_add_arg( $other_args, $atts, 'link-parent-class', 'link-parent', 'class' );
					if ( isset( $atts[ 'skip-to-content' ] ) )
					{
						$other_args[ 'skip-to-content' ] = $atts[ 'skip-to-content' ];
					}
					return ( string )( new WPAdminMenu( $slug, $title, $other_args ) );
				}
				return '';
			}
		);

		function test_add_arg( array &$other_args, array $list, string $attribute, string $element, string $key ) : void
		{
			if ( isset( $atts[ $attribute ] ) )
			{
				if ( !isset( $other_args[ $element ] ) )
				{
					$other_args[ $element ] = [];
				}
				$other_args[ $element ][ $key ] = $atts[ $attribute ];
			}
		}
	}
