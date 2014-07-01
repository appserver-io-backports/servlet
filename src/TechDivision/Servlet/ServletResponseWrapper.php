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
     * Returns the response that will be send back to the client.
     *
     * @return \TechDivision\Servlet\ServletResponse The response instance
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * Appends body stream with content.
     *
     * @param string $content The content to append
     *
     * @return integer The number of written bytes
     */
    public function appendBodyStream($content)
    {
        return $this->getResponse()->appendBodyStream($content);
    }

    /**
     * Copies a source stream to body stream.
     *
     * @param resource $sourceStream The file pointer to source stream
     * @param integer  $maxlength    The max length to read from source stream
     * @param integer  $offset       The offset from source stream to read
     *
     * @return integer the total number of bytes copied
     */
    public function copyBodyStream($sourceStream, $maxlength = null, $offset = null)
    {
        return $this->getResponse()->copyBodyStream($sourceStream, $maxlength, $offset);
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

    /**
     * Return content
     *
     * @return string $content
     */
    public function getBodyContent()
    {
        return $this->getResponse()->getBodyContent();
    }

    /**
     * Reset the body stream
     *
     * @return void
     */
    public function resetBodyStream()
    {
        return $this->getResponse()->resetBodyStream();
    }

    /**
     * Resets the stream resource pointing to body content.
     *
     * @param resource $bodyStream The body content stream resource
     *
     * @return void
     */
    public function setBodyStream($bodyStream)
    {
        $this->getResponse()->setBodyStream($bodyStream);
    }
}
