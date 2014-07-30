<?php

/**
 * TechDivision\Servlet\Http\HttpServletResponseWrapper
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

use TechDivision\Http\HttpCookieInterface;
use TechDivision\Servlet\ServletResponseWrapper;

/**
 * A Http servlet response implementation.
 *
 * @category   Appserver
 * @package    TechDivision_Servlet
 * @subpackage Http
 * @author     Tim Wagner <tw@techdivision.com>
 * @copyright  2014 TechDivision GmbH <info@techdivision.com>
 * @license    http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link       http://www.appserver.io
 */
class HttpServletResponseWrapper extends ServletResponseWrapper implements HttpServletResponse
{

    /**
     * Injects the passed response instance into this servlet response.
     *
     * @param \TechDivision\Servlet\Http\HttpServletResponse $response The response instance used for initialization
     *
     * @return void
     */
    public function injectHttpResponse(HttpServletResponse $response)
    {
        $this->injectResponse($response);
    }

    /**
     * Adds a cookie.
     *
     * @param \TechDivision\Http\HttpCookieInterface $cookie The cookie instance to add
     *
     * @return void
     */
    public function addCookie(HttpCookieInterface $cookie)
    {
        $this->getResponse()->addCookie($cookie);
    }

    /**
     * Returns TRUE if the response already has a cookie with the passed
     * name, else FALSE.
     *
     * @param string $cookieName Name of the cookie to be checked
     *
     * @return boolean TRUE if the response already has the cookie, else FALSE
     */
    public function hasCookie($cookieName)
    {
        return $this->getResponse()->hasCookie($cookieName);
    }

    /**
     * Returns the cookie with the  a cookie
     *
     * @param string $cookieName Name of the cookie to be checked
     *
     * @return \TechDivision\Http\HttpCookieInterface $cookie The cookie instance
     */
    public function getCookie($cookieName)
    {
        return $this->getResponse()->getCookie($cookieName);
    }

    /**
     * Set's the headers
     *
     * @param array $headers The headers array
     *
     * @return void
     */
    public function setHeaders(array $headers)
    {
        $this->getResponse()->setHeaders($headers);
    }

    /**
     * Return's the headers array
     *
     * @return array
     */
    public function getHeaders()
    {
        return $this->getResponse()->getHeaders();
    }

    /**
     * Add's a header to array
     *
     * @param string     $header The header label e.g. Accept or Content-Length
     * @param string|int $value  The header value
     *
     * @return void
     */
    public function addHeader($header, $value)
    {
        $this->getResponse()->addHeader($header, $value);
    }

    /**
     * Returns header info by given key
     *
     * @param string $key The headers key to return
     *
     * @return string|null
     */
    public function getHeader($key)
    {
        return $this->getResponse()->getHeader($key);
    }

    /**
     * Return's the headers as string
     *
     * @return string
     */
    public function getHeadersAsString()
    {
        return $this->getResponse()->getHeadersAsString();
    }

    /**
     * Removes one single header from the headers array.
     *
     * @param string $header The header to remove
     *
     * @return void
     */
    public function removeHeader($header)
    {
        $this->getResponse()->removeHeader($header);
    }

    /**
     * Checks if header exists by given name.
     *
     * @param string $name The header name to check
     *
     * @return boolean TRUE if the header is available, else FALSE
     */
    public function hasHeader($name)
    {
        return $this->getResponse()->hasHeader($name);
    }

    /**
     * Returns Http response code number only.
     *
     * @return string
     */
    public function getStatusCode()
    {
        return $this->getResponse()->getStatusCode();
    }

    /**
     * Gets the response Reason-Phrase, a short textual description of the
     * Status-Code.
     *
     * Because a Reason-Phrase is not a required element in response
     * Status-Line, the Reason-Phrase value MAY be null. Implementations MAY
     * choose to return the default RFC 2616 recommended reason phrase for the
     * response's Status-Code.
     *
     * @return string|null Reason phrase, or null if unknown.
     */
    public function getStatusReasonPhrase()
    {
        return $this->getResponse()->getStatusReasonPhrase();
    }

    /**
     * Returns response Http version.
     *
     * @return string
     */
    public function getVersion()
    {
        return $this->getResponse()->getVersion();
    }

    /**
     * Reset the body stream.
     *
     * @return void
     */
    public function resetBodyStream()
    {
        return $this->getResponse()->resetBodyStream();
    }

    /**
     * Sets the HTTP response status code.
     *
     * @param integer $code The HTTP status code to set
     *
     * @return void
     */
    public function setStatusCode($code)
    {
        $this->getResponse()->setStatusCode($code);
    }
}
