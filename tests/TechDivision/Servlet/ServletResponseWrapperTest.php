<?php

/**
 * TechDivision\Servlet\ServletResponseWrapperTest
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * PHP version 5
 *
 * @category  Appserver
 * @package   TechDivision_Servlet
 * @author    Tim Wagner <tw@techdivision.com>
 * @copyright 2014 TechDivision GmbH <info@techdivision.com>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.appserver.io
 */

namespace TechDivision\Servlet;

/**
 * Test for servlet response wrapper implementation.
 *
 * @category  Appserver
 * @package   TechDivision_Servlet
 * @author    Tim Wagner <tw@techdivision.com>
 * @copyright 2014 TechDivision GmbH <info@techdivision.com>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.appserver.io
 */
class ServletResponseWrapperTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Test that the body stream is returned correctly.
     *
     * @return void
     */
    public function testGetBodyStream()
    {
        
        // create a stub for the ServletResponse interface
        $stub = $this->getMock('\TechDivision\Servlet\ServletResponse');
        
        // Configure the stub.
        $stub->expects($this->any())
             ->method('getBodyStream')
             ->will($this->returnValue($bodyStream = fopen('php://input', 'r')));

        // create a new wrapper instance
        $wrapper = new ServletResponseWrapper();
        $wrapper->injectResponse($stub);
        
        // check if the accepted encodings has been returned
        $this->assertSame($bodyStream, $wrapper->getBodyStream());
    }
}
