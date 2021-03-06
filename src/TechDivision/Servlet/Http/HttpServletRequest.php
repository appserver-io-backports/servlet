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

use TechDivision\Servlet\ServletRequest;
use TechDivision\HttpMessage\RequestInterface;

/**
 * A servlet request implementation.
 *
 * Here are some examples of the expected results:
 *
 * http://127.0.0.1:8586/example/index/index.do
 *   getServerName():  127.0.0.1
 *   getContextPath(): /example
 *   getServletPath(): /index/index.do
 *   getPathInfo():
 *
 * http://example.local:8586/index/index.do
 *   getServerName():  example.local
 *   getContextPath(): /example
 *   getServletPath(): /index/index.do
 *   getPathInfo():
 *
 * http://example.local:8586/images.do/static/images/logo.png
 *   getServerName():  example.local
 *   getContextPath(): /example
 *   getServletPath(): /images.do
 *   getPathInfo():    /static/images/logo.png
 *
 * @category   Appserver
 * @package    TechDivision_Servlet
 * @subpackage Http
 * @author     Tim Wagner <tw@techdivision.com>
 * @copyright  2014 TechDivision GmbH <info@techdivision.com>
 * @license    http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link       http://www.appserver.io
 */
interface HttpServletRequest extends ServletRequest, RequestInterface
{

    /**
     * Returns the application context name (application name prefixed with a slash) for the actual request.
     *
     * @return string The application context name
     */
    public function getContextPath();

    /**
     * Returns the path to the servlet used to handle this request.
     *
     * @return string The relative path to the servlet
     */
    public function getServletPath();

    /**
     * Returns the session for this request.
     *
     * @param boolean $create TRUE to create a new session, else FALSE
     *
     * @return \TechDivision\Servlet\Http\HttpSession The session instance
     */
    public function getSession($create = false);

    /**
     * Returns the absolute path info started from the context path.
     *
     * @return string the absolute path info
     */
    public function getPathInfo();

    /**
     * Returns the server name.
     *
     * @return string The server name
     */
    public function getServerName();

    /**
     * Returns query string of the actual request.
     *
     * @return string|null The query string of the actual request
     */
    public function getQueryString();

    /**
     * Returns header info by given key
     *
     * @param string $name The header key to get
     *
     * @return string|null
     */
    public function getHeader($name);

    /**
     * Returns headers data
     *
     * @return array
     */
    public function getHeaders();

    /**
     * Returns true if the request has a cookie header with the passed
     * name, else false.
     *
     * @param string $cookieName Name of the cookie header to be checked
     *
     * @return boolean true if the request has the cookie, else false
     */
    public function hasCookie($cookieName);

    /**
     * Returns the value of the cookie with the passed name.
     *
     * @param string $cookieName The name of the cookie to return
     *
     * @return \TechDivision\Http\HttpCookieInterface The cookie instance
     */
    public function getCookie($cookieName);
}
