<?php

/**
 * TechDivision\Servlet\ServletResponseWrapper
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
 * A servlet response implementation.
 *
 * @category  Appserver
 * @package   TechDivision_Servlet
 * @author    Tim Wagner <tw@techdivision.com>
 * @copyright 2014 TechDivision GmbH <info@techdivision.com>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.appserver.io
 */
class ServletResponseWrapper implements ServletResponse
{
    
    /**
     * The response instance.
     * 
     * @var \TechDivision\Servlet\ServletResponse
     */
    protected $response;
    
    /**
     * Injects the passed response instance into this servlet response.
     * 
     * @param \TechDivision\Servlet\ServletResponse $response The response instance used for initialization
     * 
     * @return void
     */
    public function injectResponse(ServletResponse $response)
    {
        $this->response = $response;
    }
    
    /**
     * Returns the that will be send back to the client.
     * 
     * @return \TechDivision\Servlet\ServletResponse The response instance
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * Appends the content.
     *
     * @param string $content The content to append
     *
     * @return void
     */
    public function appendBodyStream($content)
    {
        return $this->getResponse()->appendBodyStream($content);
    }

    /**
     * Returns the body stream as a resource.
     *
     * @return resource The body stream
     */
    public function getBodyStream()
    {
        return $this->getResponse()->getBodyStream();
    }
}
