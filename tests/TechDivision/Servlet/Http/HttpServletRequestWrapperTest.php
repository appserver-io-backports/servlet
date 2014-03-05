<?php

/**
 * TechDivision\Servlet\Http\HttpServletRequestWrapperTest
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
 * Test for Http servlet request wrapper implementation.
 *
 * @category   Appserver
 * @package    TechDivision_Servlet
 * @subpackage Http
 * @author     Tim Wagner <tw@techdivision.com>
 * @copyright  2014 TechDivision GmbH <info@techdivision.com>
 * @license    http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link       http://www.appserver.io
 */
class HttpServletRequestWrapperTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Test if the query string is returned correctly.
     *
     * @return void
     */
    public function testGetQueryString()
    {
        
        // create a stub for the HttpServletRequest interface
        $stub = $this->getMock('\TechDivision\Servlet\Http\HttpServletRequest');
        
        // configure the stub
        $stub->expects($this->any())
             ->method('getQueryString')
             ->will($this->returnValue($queryString = 'arg1=value1&arg2=value2'));

        // create a new wrapper instance
        $wrapper = new HttpServletRequestWrapper();
        $wrapper->injectHttpRequest($stub);
        
        // check if the query string has been returned
        $this->assertSame($queryString, $wrapper->getQueryString());
    }
}
