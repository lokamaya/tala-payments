<?php

/*
 * This file is part of the Tala Payments package.
 *
 * (c) Adrian Macneil <adrian.macneil@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tala\Payments\Tests;

use Tala\Payments\Request;

class AbstractGatewayTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->gateway = $this->getMockForAbstractClass('\Tala\Payments\AbstractGateway');
        $this->request = new Request();
    }

    public function testGetDefaultSettings()
    {
    	$this->assertEquals(array(), $this->gateway->getDefaultSettings());
    }

    public function testCurrency()
    {
    	$this->assertNull($this->gateway->getCurrency());
    }

    public function testSetCurrency()
    {
    	$this->gateway->setCurrency('ABC');
    	$this->assertEquals('ABC', $this->gateway->getCurrency());
    }

    public function testBrowser()
    {
    	$this->assertInstanceOf('\Buzz\Browser', $this->gateway->getBrowser());
    }

    public function testSetBrowser()
    {
    	$this->gateway->setBrowser('fakeBrowserObject');
    	$this->assertEquals('fakeBrowserObject', $this->gateway->getBrowser());
    }

    public function testAuthorize()
    {
    	$this->setExpectedException('\Tala\Payments\Exception\BadMethodCallException');
    	$this->gateway->authorize($this->request);
    }

    public function testCompleteAuthorize()
    {
    	$this->setExpectedException('\Tala\Payments\Exception\BadMethodCallException');
    	$this->gateway->completeAuthorize($this->request);
    }

    public function testCapture()
    {
    	$this->setExpectedException('\Tala\Payments\Exception\BadMethodCallException');
    	$this->gateway->capture($this->request);
    }

    public function testPurchase()
    {
    	$this->setExpectedException('\Tala\Payments\Exception\BadMethodCallException');
    	$this->gateway->purchase($this->request);
    }

    public function testCompletePurchase()
    {
    	$this->setExpectedException('\Tala\Payments\Exception\BadMethodCallException');
    	$this->gateway->completePurchase($this->request);
    }

    public function testRefund()
    {
    	$this->setExpectedException('\Tala\Payments\Exception\BadMethodCallException');
    	$this->gateway->refund($this->request);
    }

    public function testVoid()
    {
    	$this->setExpectedException('\Tala\Payments\Exception\BadMethodCallException');
    	$this->gateway->void($this->request);
    }
}