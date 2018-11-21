=== WAJ Admin Menu ===
Contributors: waughjai
Tags: admin menu, nav, autogenerate, html
Requires at least: 4.9.8
Tested up to: 4.9.8
Stable tag: 1.0.0
Requires PHP: 7.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Simple class & shortcodes for easily generating HTML for admin menus set up in WordPress.


== Description ==

Generates list HTML from menus set up in WordPress's admin through Appearance -> Menus.

Allows custom-set classes & IDs for elements for easier styling.


== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/plugin-name` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress
3. Copyright year can be directly added to PHP files by creating an instance o' the \WaughJ\WPAdminMenu class & using it like a string or calling the "printMenu" method. In addition to the mandatory $slug & $title constructor parameters, which determine what menu in Appearances -> Menus to use, you can add an optional hash map as the 3rd argument, which should hold hash maps for elements with class or ID keys and strings for what those values should be.

A simpler way to add an admin menu through PHP is to use the WPAdminMenuFactory class's static methods, "createHeader" or "createFooter" to automatically add menus with the slugs "header-nav" & "footer-nav" with the header nav automatically adding a "Skip to Content link for screen-reader users".

You can also add an admin menu to WordPress content areas with the shortcode [admin-menu slug="menu-slug" title="menu-title"] with optional attributes for element classes and IDs.

You can also use the simple shortcodes [header-nav] or [footer-nav] to automatically add the menus that the aforementioned WPAdminMenuFactory adds.


== Example ==

````
// functions.php

declare( strict_types = 1 );
namespace MyTheme
{
	use \WaughJ\WPAdminMenu\WPAdminMenu;

	// Make sure this is initialized early,
	// so WordPress Admin knows that this menu is set up.
	global $extra_menu;
	$extra_menu = new WPAdminMenu
	(
		'extra-menu',
		'Extra Menu',
		[
			'nav' =>
			[
				'class' => 'extra-menu-nav',
				'id' => 'extra-menu-nav'
			],
			'ul' =>
			[
				'class' => 'extra-menu-list',
				'id' => 'extra-menu-list'
			],
			'li' =>
			[
				'class' => 'extra-menu-item'
			],
			'a' =>
			[
				'class' => 'extra-menu-link'
			],
			'subnav' =>
			[
				'class' => 'extra-menu-subnav'
			],
			'subitem' =>
			[
				'class' => 'extra-menu-subitem'
			],
			'sublink' =>
			[
				'class' => 'extra-menu-sublink'
			],
			'parent-link' =>
			[
				'class' => 'extra-menu-parent-link'
			],
			'skip-to-content' => 'top'
		]
	);
}
````

````
// inc/header.php

<?php

declare( strict_types = 1 );
namespace MyTheme
{
	?>
		<header class="header">
			<?
				global $extra_menu;
				$extra_menu->printMenu();
			?>
		</header>
	<?php
}
````


== Changelog ==

= 1.0 =
* Initial stable version.
