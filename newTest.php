<?php

namespace Facebook\WebDriver;

use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;

require_once('vendor/autoload.php');

class DemoSelenium 
{
	public function demo_take_screenshot()
	{
		$host = 'http://localhost:4444/';

		$capabilities = DesiredCapabilities::chrome();

		$driver = RemoteWebDriver::create($host, $capabilities);

		$driver->get('https://www.startupwala.com/');

		$driver->takeScreenshot('abc.png');

		// close the browser
		$driver->quit();
	}

	public function visit_mca()
	{
		$host = 'http://localhost:4444/';
		$capabilities = DesiredCapabilities::chrome();
		//$capabilities->setCapability('goog:chromeOptions', ['args' => ['-headless']]);
		$driver = RemoteWebDriver::create($host, $capabilities,100000, 100000);
		$driver->get('http://www.mca.gov.in/');
		$driver->takeScreenshot('abc.png');
		$button = $driver->findElement(WebDriverBy::cssSelector('#eodb > p > span:nth-child(1) > button > strong'));
		$button->click();
		$mca_services_element = $driver->findElement(WebDriverBy::cssSelector('#services > a'));
		$driver->getMouse()->mouseMove($mca_services_element->getCoordinates());
		$signatory_details_link = $driver->findElement(WebDriverBy::cssSelector('#services-submenu > div > div > ul:nth-child(1) > li:nth-child(3) > ul > li:nth-child(3) > a'));
		$signatory_details_link->click();
		$driver->takeScreenshot('abc1234.png');
		// $driver->getMouse()->click();

		// $mouseUpElement = $driver->findElement(WebDriverBy::cssSelector('#services > a'));
		// $mouseUpElement->mouseUp();
		
	}
}

$demoSelenium = new DemoSelenium();
$demoSelenium->visit_mca();

?>