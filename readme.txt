=== WAJ Admin Menu ===
Contributors: waughjai
Tags: admin menu, nav, autogenerate, html
Requires at least: 4.9.8
Tested up to: 4.9.8
Stable tag: 1.0.0
Requires PHP: 7.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Simple class for handling auto-updating copyright year in website footers.


== Description ==

Adds copyright year or interval o' years where desired. By default, it just shows the current year, as specified by the server ( which is hopefully keeping accurate track o' time ). Optionally, you can include a start year. If the start year is different from the current year, then it will show an interval 'tween the start year & current year.

For instance, if you set the start year to 2015, in 2018 you will get the following:

`2015 - 2018`

You can also set a custom divider if you want the interval sign to look different. For instance, if you don't want the hyphen to have spaces round it, you could set the divider to "-", & you will get the following:

`2015-2018`


== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/plugin-name` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress
3. Copyright year can be directly added to PHP files by creating an instance o' the \WaughJ\CopyrightYear\CopyrightYear class & using it like a string or calling the "getText()". Optional arguments to its constructor are 1st the starting year o' your website & 2nd the divider you want 'tween the start year & current year if they are different. The defaults for these, respectively, are the current year & a hyphen with spaces round it.

You can also add a copyright year to a WordPress document using a shortcode. Add [copyright-year] to add the current year & [copyright-year start="%year%" divider="%divider%"] with %year% replaced by the starting year & %divider% replaced by the divider that appears 'tween the start & current year if they are different.


== Example ==

````
<?php

declare( strict_types = 1 );
namespace MyTheme\FooterTemplate
{
	use \WaughJ\CopyrightYear\CopyrightYear;

	?>
		<footer class="footer">
			<p>Copyright Jaimeson Waugh &copy; <?= new CopyrightYear( 2015, '-' ); ?>.</p>
		</footer>
	<?php
}
````

This will print the message, "Copyright Jaimeson Waugh © 2015-2018."


== Changelog ==

= 1.0 =
* Initial stable version.
