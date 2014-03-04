<?php

/**
 * TechDivision\Servlet\Http\HttpServletRequestWrapper
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

use TechDivision\Servlet\ServletRequestWrapper;

/**
 * A servlet request implementation.
 *
 * @category   Appserver
 * @package    TechDivision_Servlet
 * @subpackage Http
 * @author     Tim Wagner <tw@techdivision.com>
 * @copyright  2014 TechDivision GmbH <info@techdivision.com>
 * @license    http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link       http://www.appserver.io
 */
class HttpServletRequestWrapper extends ServletRequestWrapper implements HttpServletRequest
{
    
    /**
     * Injects the passed request instance into this servlet request.
     * 
     * @param \TechDivision\Servlet\Http\HttpServletRequest $request The request instance used for initialization
     * 
     * @return void
     */
    public function __construct(HttpServletRequest $request)
    {
        parent::__construct($request);
    }
    
    /**
     * Returns the application context name (application name prefixed with a slash) for the actual request.
     * 
     * @return string The application context name
     */
    public function getContextPath()
    {
        return $this->getRequest()->getContextPath();
    }
    
    /**
     * Returns the path to the servlet used to handle this request.
     * 
     * @return string The relative path to the servlet
     */
    public function getServletPath()
    {
        return $this->getRequest()->getServletPath();
    }

    /**
     * Returns the session for this request.
     * 
     * @param boolean $create TRUE to create a new session, else FALSE
     *
     * @return \TechDivision\Servlet\Http\HttpSession The session instance
     */
    public function getSession($create = false)
    {
        return $this->getRequest()->getSession($create);
    }
    
    /**
     * Returns the absolute path info started from the context path.
     * 
     * @return string the absolute path info
     * @see \TechDivision\Servlet\ServletRequest::getPathInfo()
     */
    public function getPathInfo()
    {
        return $this->getRequest()->getPathInfo();
    }

    /**
     * Returns query string of the actual request.
     *
     * @return string|null The query string of the actual request
     */
    public function getQueryString()
    {
        return $this->getRequest()->getQueryString();
    }

    /**
     * Returns header info by given key
     *
     * @param string $key The header key to get
     *
     * @return string|null
     */
    public function getHeader($key)
    {
        return $this->getRequest()->getHeader($key);
    }

    /**
     * Returns headers data
     *
     * @return array
     */
    public function getHeaders()
    {
        return $this->getRequest()->getHeaders();
    }

    /**
     * Returns request method
     *
     * @return string
     */
    public function getMethod()
    {
        return $this->getRequest()->getMethod();
    }

    /**
     * Returns request uri
     *
     * @return string
     */
    public function getUri()
    {
        return $this->getRequest()->getUri();
    }

    /**
     * Returns true if the request has a cookie header with the passed
     * name, else false.
     *
     * @param string $cookieName Name of the cookie header to be checked
     *
     * @return boolean true if the request has the cookie, else false
     */
    public function hasCookie($cookieName)
    {
        return $this->getRequest()->hasCookie($cookieName);
    }

    /**
     * Returns the value of the cookie with the passed name.
     *
     * @param string $cookieName The name of the cookie to return
     *
     * @return mixed The cookie value
     */
    public function getCookie($cookieName)
    {
        return $this->getRequest()->getCookie($cookieName);
    }
}
