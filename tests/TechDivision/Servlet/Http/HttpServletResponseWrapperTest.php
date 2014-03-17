<?php

/**
 * TechDivision\Servlet\Http\HttpServletResponseWrapperTest
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * PHP version 5
 *
 * @category   Appserver
 * @package    TechDivision_Servlet
 * @subpackage Http
 * @author     Tim Wagner <tw@techdivision.com>
 * @copyright  2014 TechDivision GmbH <info@techdivision.com>
 * @license    http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link       http://www.appserver.io
 */

namespace TechDivision\Servlet\Http;

/**
 * Test for Http servlet response wrapper implementation.
 *
 * @category   Appserver
 * @package    TechDivision_Servlet
 * @subpackage Http
 * @author     Tim Wagner <tw@techdivision.com>
 * @copyright  2014 TechDivision GmbH <info@techdivision.com>
 * @license    http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link       http://www.appserver.io
 */
class HttpServletResponseWrapperTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Test that the accepted encodings are returned correctly.
     *
     * @return void
     */
    public function testGetCode()
    {
        
        // create a stub for the ServletResponse interface
        $stub = $this->getMock('\TechDivision\Servlet\Http\HttpServletResponse');
        
        // Configure the stub.
        $stub->expects($this->any())
             ->method('getStatusCode')
             ->will($this->returnValue($code = 404));

        // create a new wrapper instance
        $wrapper = new HttpServletResponseWrapper();
        $wrapper->injectHttpResponse($stub);
        
        // check if the response code has been returned
        $this->assertSame($code, $wrapper->getStatusCode());
    }
}
