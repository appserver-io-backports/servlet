<?php

/**
 * TechDivision\Servlet\GenericServlet
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
 * Abstract servlet implementation.
 *
 * @category  Appserver
 * @package   TechDivision_Servlet
 * @author    Tim Wagner <tw@techdivision.com>
 * @copyright 2014 TechDivision GmbH <info@techdivision.com>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.appserver.io
 */
class ServletRequestWrapperTest extends AbstractTest
{

    /**
     * Test if the context path is returned correctly.
     *
     * @return void
     */
    public function testGetContextPath()
    {
        
        // create a stub for the ServletRequest interface
        $stub = $this->getMock('\TechDivision\Servlet\ServletRequest');
        
        // Configure the stub.
        $stub->expects($this->any())
             ->method('getContextPath')
             ->will($this->returnValue('/example'));

        // check if the context path has been returned
        $this->assertSame('/example', $this->wrapper->getContextPath());
    }
}