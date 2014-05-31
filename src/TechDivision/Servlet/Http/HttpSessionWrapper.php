<?php

/**
 * TechDivision\Servlet\Http\HttpSessionWrapper
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
* @package    TechDivision_ServletEngine
* @subpackage Http
* @author     Tim Wagner <tw@techdivision.com>
* @copyright  2014 TechDivision GmbH <info@techdivision.com>
* @license    http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
* @link       http://www.appserver.io
*/

namespace TechDivision\Servlet\Http;

use TechDivision\Servlet\ServletSession;
use TechDivision\Servlet\ServletSessionWrapper;

/**
 * A wrapper to simplify session handling.
 *
 * @category   Appserver
 * @package    TechDivision_ServletEngine
 * @subpackage Http
 * @author     Tim Wagner <tw@techdivision.com>
 * @copyright  2014 TechDivision GmbH <info@techdivision.com>
 * @license    http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link       http://www.appserver.io
 */
class HttpSessionWrapper extends ServletSessionWrapper implements HttpSession
{

    /**
     * The request instance we're working on.
     *
     * @var \TechDivision\Servlet\Http\HttpServletRequest
     */
    protected $request;

    /**
     * Injects the request instance.
     *
     * @param \TechDivision\Servlet\Http\HttpServletRequest $request The request instance we're working on
     *
     * @return void
     */
    public function injectRequest(HttpServletRequest $request)
    {
        $this->request = $request;
    }

    /**
     * Returns the request instance we're working on.
     *
     * @return \TechDivision\Servlet\Http\HttpServletRequest
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * Returns the response instance we're working on.
     *
     * @return \TechDivision\Servlet\Http\HttpServletResponse
     */
    public function getResponse()
    {
        return $this->request->getResponse();
    }

    /**
     * Creates and returns the session cookie to be added to the response.
     *
     * @param \TechDivision\Servlet\Http\ServletResponse $response The response that will be sent back to the client
     *
     * @return void
     */
    public function start()
    {

        // we need the session to be started
        if ($this->isStarted()) {
            return;
        }

        // create a new cookie with the session values
        $cookie = new Cookie(
            $this->getName(),
            $this->getId(),
            $this->getLifetime(),
            $this->getMaximumAge(),
            $this->getDomain(),
            $this->getPath(),
            $this->isSecure(),
            $this->isHttpOnly()
        );

        // start the session and set the started flag
        $this->getSession()->start();

        // add the cookie to the response
        $this->getRequest()->setRequestedSessionId($this->getId());
        $this->getResponse()->addCookie($cookie);
    }

    /**
     * Generates and propagates a new session ID and transfers all existing data
     * to the new session.
     *
     * @return string The new session ID
     * @throws \TechDivision\Servlet\IllegalStateException
     */
    public function renewId()
    {
        throw new \Exception(__METHOD__ . ' not implemented yet');
    }

    /**
     * Shuts down this session
     *
     * This method must not be called manually – it is invoked by Flow's object
     * management.
     *
     * @return void
     */
    public function shutdownObject()
    {
        throw new \Exception(__METHOD__ . ' not implemented yet');
    }

    /**
     * Explicitly writes and closes the session
     *
     * @return void
     */
    public function close()
    {
        throw new \Exception(__METHOD__ . ' not implemented yet');
    }
}
