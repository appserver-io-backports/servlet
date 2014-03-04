<?php

/**
 * TechDivision\Servlet\ServletRequest
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
 * Here are some examples of the expected results:
 * 
 * http://127.0.0.1:8586/example/index/index.do 
 *   => using of "Servlets/IndexServlet.php" 
 *   getServerName():  127.0.0.1
 *   getContextPath(): /example 
 *   getServletPath(): /TechDivision/Example/Servlets/IndexServlet.php 
 *   getPathInfo(): /index/index.do
 * 
 * http://example.local:8586/index/index.do 
 *   => using of "Servlets/IndexServlet.php"
 *   getServerName():  example.local 
 *   getContextPath(): /example 
 *   getServletPath(): /TechDivision/Example/Servlets/IndexServlet.php 
 *   getPathInfo():    /index/index.do
 * 
 * http://localhost:8586/example/static/images/logo.png 
 *   => using of "/TechDivision/Example/Servlets/StaticResourceServlet.php"
 *   getServerName():  localhost
 *   getContextPath(): /example 
 *   getServletPath(): /TechDivision/Example/Servlets/StaticResourceServlet.php
 *   getPathInfo():    /static/images/logo.png
 * 
 * http://example.local:8586/static/images/logo.png 
 *   => using of "/TechDivision/Example/Servlets/StaticResourceServlet.php"
 *   getServerName():  example.local
 *   getContextPath(): /example 
 *   getServletPath(): /TechDivision/Example/Servlets/StaticResourceServlet.php
 *   getPathInfo():    /static/images/logo.png
 *
 * @category  Appserver
 * @package   TechDivision_Servlet
 * @author    Tim Wagner <tw@techdivision.com>
 * @copyright 2014 TechDivision GmbH <info@techdivision.com>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.appserver.io
 */
interface ServletRequest
{
    
    /**
     * Returns the host name passed with the request header.
     * 
     * @return string The host name of this request
     */
    public function getServerName();

    /**
     * Returns an array with all request parameters.
     *
     * @return array The array with the request parameters
     */
    public function getParameterMap();

    /**
     * Returns accepted encodings data
     *
     * @return array
     */
    public function getAcceptedEncodings();

    /**
     * Returns the servers IP v4 address.
     *
     * @return string The servers IP v4 address
     */
    public function getServerAddress();

    /**
     * Returns server port
     *
     * @return string
     */
    public function getServerPort();

    /**
     * Return request content. 
     *
     * @return string The request content
     */
    public function getContent();

    /**
     * Returns protocol version, HTTP/1.1 for example.
     *
     * @return string The protocol version
     */
    public function getVersion();

    /**
     * Returns the clients IP address to send the content back to.
     *
     * @return mixed The clients IP addrress
     */
    public function getClientIp();

    /**
     * Returns the clients port to send the content back to.
     *
     * @return integer The clients port
     */
    public function getClientPort();

    /**
     * Returns the parameter with the passed name if available or null
     * if the parameter not exists.
     *
     * @param string  $name   The name of the parameter to return
     * @param integer $filter The filter to use
     *
     * @return string|null
     */
    public function getParameter($name, $filter = FILTER_SANITIZE_STRING);

    /**
     * Returns a part object by given name
     *
     * @param string $name The name of the form part
     *
     * @return \TechDivision\Http\HttpPart
     */
    public function getPart($name);

    /**
     * Returns the parts collection as array
     *
     * @return array A collection of HttpPart objects
     */
    public function getParts();
}
