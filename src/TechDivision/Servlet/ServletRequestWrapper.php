<?php

/**
 * TechDivision\Servlet\ServletRequestWrapper
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
 * A servlet request implementation.
 *
 * @category  Appserver
 * @package   TechDivision_Servlet
 * @author    Tim Wagner <tw@techdivision.com>
 * @copyright 2014 TechDivision GmbH <info@techdivision.com>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.appserver.io
 */
class ServletRequestWrapper implements ServletRequest
{

    /**
     * The servlet request instance.
     *
     * @var \TechDivision\Servlet\ServletRequest
     */
    protected $request;

    /**
     * Injects the passed request instance into this servlet request.
     *
     * @param \TechDivision\Servlet\ServletRequest $request The request instance used for initialization
     *
     * @return void
     */
    public function injectRequest(ServletRequest $request)
    {
        $this->request = $request;
    }

    /**
     * Sets the passed request instance into this servlet request.
     *
     * @param \TechDivision\Servlet\ServletRequest $request The request instance used for initialization
     *
     * @return void
     */
    public function setRequest(ServletRequest $request)
    {
        $this->request = $request;
    }

    /**
     * Returns the wrapped request object.
     *
     * @return \TechDivision\Servlet\ServletRequest The wrapped request object
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * Returns an part instance
     *
     * @return Part
     */
    public function getHttpPartInstance()
    {
        return $this->getRequest()->getHttpPartInstance();
    }

    /**
     * Returns an array with all request parameters.
     *
     * @return array The array with the request parameters
     */
    public function getParameterMap()
    {
        return $this->getRequest()->getParams();
    }

    /**
     * Return request content.
     *
     * @return resource The request content
     */
    public function getBodyStream()
    {
        return $this->getRequest()->getBodyStream();
    }

    /**
     * Returns protocol version
     *
     * @return string
     */
    public function getVersion()
    {
        return $this->getRequest()->getVersion();
    }

    /**
     * Returns the parameter with the passed name if available or null
     * if the parameter not exists.
     *
     * @param string  $name   The name of the parameter to return
     * @param integer $filter The filter to use
     *
     * @return string|null
     * @todo Implement filter handling
     */
    public function getParameter($name, $filter = FILTER_SANITIZE_STRING)
    {
        return $this->getRequest()->getParam($name);
    }

    /**
     * Returns a part object by given name
     *
     * @param string $name The name of the form part
     *
     * @return \TechDivision\Http\HttpPart
     */
    public function getPart($name)
    {
        return $this->getRequest()->getPart($name);
    }

    /**
     * Returns the parts collection as array
     *
     * @return array A collection of HttpPart objects
     */
    public function getParts()
    {
        return $this->getRequest()->getParts();
    }

    /**
     * Sets the flag to mark the request dispatched.
     *
     * @param boolean $dispatched TRUE if the request has already been dispatched, else FALSE
     *
     * @return void
     */
    public function setDispatched($dispatched = true)
    {
        $this->getRequest()->setDispatched($dispatched);
    }

    /**
     * Sets the flag that shows if the request has already been dispatched.
     *
     * @return boolean TRUE if the request has already been dispatched, else FALSE
     */
    public function isDispatched()
    {
        return $this->getRequest()->isDispatched();
    }
}
