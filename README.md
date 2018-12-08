WAJ Admin Menu WordPress Plugin
=========================

Simple class & shortcodes for easily generating HTML for admin menus set up in WordPress.

## Description

Creates menu in WordPress's Appearances -> Menus & generates list HTML from it.

Allows custom-set classes & IDs for elements for easier styling & has easy way to automatically add "Skip to Content" link for screen-reader users.


## Installation

1. Upload the plugin files to the `/wp-content/plugins/plugin-name` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress


## Usage

Since admin menus need to be created before initialization to work in the WordPress admin & used later in template files to print, admin menu objects are handled through static methods in the WPAdminMenuManager singleton class.

1st, before admin loads, call the "createAdminMenu" method on WPAdminMenuManager with a slug & title as the 1st 2 mandatory, & a hash map o' other attributes as an optional 3rd argument. This will make the menu appear under the given name in Appearances -> Menus in the WordPress admin.

Then you can print the menu through PHP in template files or shortcodes in WordPress content editors.

### PHP

To use through PHP, just call the "printAdminMenu" method on the WPAdminMenuManager class with the mandatory argument o' the slug representing the admin you want to print ( given when creating the menu earlier ) & an optional hash map o' attributes to o'erride the ones given when creating the menu, if you want to print the same menu in different places with different element classes, for instance.

### Shortcodes

To print through shortcodes, just use the shortcode [admin-menu slug="%slug%"], with optional extra attributes to o'erride the attributes given when creating the menu.

WPAdminMenuManager also has 2 templates for easier creation o' admin menus, a header & footer template. Just call WPAdminMenuManager::createHeaderMenu() or WPAdminMenuManager::createFooterMenu() respectively to create them & either call WPAdminMenuManager::printHeaderMenu() or WPAdminMenuManager::printFooterMenu() or use the shortcodes [header-nav] or [footer-nav].

If you try to print a menu that hasn't been created yet, it will print nothing.

Valid attributes for admin menus ( all are optional ):

* "nav": represents the nav element that holds everything. Should hold a hash map with either a class or id attribute, or both.
* "ul": represents ul element. Should hold the same as "nav".
* "li": represents li element. Should hold a hash map with a class attribute.
* "a": represents a element. Should hold the same as "li".
* "subnav": represents child ul elements for multilevel menus. Should hold the same as "li".
* "subitem": represents child li elements for multilevel menus. Should hold the same as "li".
* "sublink": represents child a elements for multilevel menus. Should hold the same as "li".
* "parent-link": represents a elements in top-level li elements that hold child navs. Should hold the same as "li".
* "skip-to-content": automatically adds "skip to content" link. Should be a string that will be the anchor ( without the # ) that the "skip to content" link should go to. If not added, "skip to content" link will not be added.

Shortcode attributes that act as these:

* nav-class
* nav-id
* ul-class
* ul-id
* li-class
* a-class
* subnav-class
* subitem-class
* sublink-class
* parent-link-class
* skip-to-content


## Example

````
// functions.php

declare( strict_types = 1 );
namespace MyTheme
{
	use WaughJ\WPAdminMenuManager\WPAdminMenumanager;

	// Make sure this is initialized early,
	// so WordPress Admin knows that this menu is set up.
	WPAdminMenuManager::createAdminMenu
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
	use WaughJ\WPAdminMenuManager\WPAdminMenumanager;

	?>
		<header class="header">
			<?php WPAdminMenuManager::printAdminMenu( 'extra-menu' ); ?>
		</header>
	<?php
}
````


## Changelog

### 1.1
* Add current item & current link classes as possible attributes.

### 1.0
* Initial stable version.
