<?php

declare( strict_types = 1 );
namespace WaughJ\WPAdminMenuFactory
{
	use WaughJ\WPAdminMenu\WPAdminMenu;

	class WPAdminMenuFactory
	{
		public static function createHeader() : WPAdminMenu
		{
			return new WPAdminMenu
			(
				'header-nav',
				'Header Nav',
				[
					'nav' =>
					[
						'class' => 'header-nav'
					],
					'ul' =>
					[
						'class' => 'header-nav-list'
					],
					'li' =>
					[
						'class' => 'header-nav-item'
					],
					'a' =>
					[
						'class' => 'header-nav-link'
					],
					'sublist' =>
					[
						'class' => 'header-nav-sublist'
					],
					'subitem' =>
					[
						'class' => 'header-nav-subitem'
					],
					'sublink' =>
					[
						'class' => 'header-nav-sublink'
					],
					'link-parent' =>
					[
						'class' => 'header-nav-link-parent'
					],
					'skip-to-content' => 'main'
				]
			);
		}

		public static function createFooter() : WPAdminMenu
		{
			return new WPAdminMenu
			(
				'footer-nav',
				'Footer Nav',
				[
					'nav' =>
					[
						'class' => 'footer-nav',
						'id' => 'footer-nav'
					],
					'ul' => [ 'class' => 'footer-nav-list' ],
					'li' => [ 'class' => 'footer-nav-item' ],
					'a'  => [ 'class' => 'footer-nav-link' ]
				]
			);
		}
	}
}
