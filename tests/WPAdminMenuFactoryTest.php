<?php

require_once( 'MockWordPress.php' );

use PHPUnit\Framework\TestCase;
use WaughJ\WPAdminMenuFactory\WPAdminMenuFactory;

class WPAdminMenuFactoryTest extends TestCase
{
	public function testHeader()
	{
		$header = WPAdminMenuFactory::createHeader();
		$this->assertTrue( is_a( $header, '\WaughJ\WPAdminMenu\WPAdminMenu' ) );
	}

	public function testFooter()
	{
		$footer = WPAdminMenuFactory::createFooter();
		$this->assertTrue( is_a( $footer, '\WaughJ\WPAdminMenu\WPAdminMenu' ) );
	}
}
