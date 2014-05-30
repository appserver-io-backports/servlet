<?php

/**
 * TechDivision\Servlet\Http\HttpSession
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
 * Interfaces for all servlet sessions.
 *
 * @category   Appserver
 * @package    TechDivision_Servlet
 * @subpackage Http
 * @author     Tim Wagner <tw@techdivision.com>
 * @copyright  2014 TechDivision GmbH <info@techdivision.com>
 * @license    http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link       http://www.appserver.io
 */
interface HttpSession
{

    /**
     * Tells if the session has been started already.
     *
     * @return boolean
     */
    public function isStarted();

    /**
     * Starts the session, if it has not been already started
     *
     * @return void
     */
    public function start();

    /**
     * Returns TRUE if there is a session that can be resumed.
     *
     * If a to-be-resumed session was inactive for too long, this function will
     * trigger the expiration of that session. An expired session cannot be resumed.
     *
     * NOTE that this method does a bit more than the name implies: Because the
     * session info data needs to be loaded, this method stores this data already
     * so it doesn't have to be loaded again once the session is being used.
     *
     * @return boolean
     */
    public function canBeResumed();

    /**
     * Resumes an existing session, if any.
     *
     * @return integer If a session was resumed, the inactivity of since the last request is returned
     */
    public function resume();

    /**
     * Returns the current session identifier
     *
     * @return string The current session identifier
     * @throws \TechDivision\Servlet\IllegalStateException
     */
    public function getId();

    /**
     * Generates and propagates a new session ID and transfers all existing data
     * to the new session.
     *
     * @return string The new session ID
     * @throws \TechDivision\Servlet\IllegalStateException
     */
    public function renewId();

    /**
     * Returns the data associated with the given key.
     *
     * @param string $key An identifier for the content stored in the session.
     *
     * @return mixed The contents associated with the given key
     * @throws \TechDivision\Servlet\IllegalStateException
     */
    public function getData($key);

    /**
     * Returns TRUE if a session data entry $key is available.
     *
     * @param string $key Entry identifier of the session data
     *
     * @return boolean
     * @throws \TechDivision\Servlet\IllegalStateException
     */
    public function hasKey($key);

    /**
     * Stores the given data under the given key in the session
     *
     * @param string $key  The key under which the data should be stored
     * @param mixed  $data The data to be stored
     *
     * @return void
     * @throws \TechDivision\Servlet\IllegalStateException
     */
    public function putData($key, $data);

    /**
     * Returns the unix time stamp marking the last point in time this session has
     * been in use.
     *
     * For the current (local) session, this method will always return the current
     * time. For a remote session, the unix timestamp will be returned.
     *
     * @return integer UNIX timestamp
     * @throws \TechDivision\Servlet\IllegalStateException
     */
    public function getLastActivityTimestamp();

    /**
     * Tags this session with the given tag.
     *
     * Note that third-party libraries might also tag your session. Therefore it is
     * recommended to use namespaced tags such as "Acme-Demo-MySpecialTag".
     *
     * @param string $tag The tag – must match be a valid cache frontend tag
     *
     * @return void
     * @throws \TechDivision\Servlet\IllegalStateException
     */
    public function addTag($tag);

    /**
     * Removes the specified tag from this session.
     *
     * @param string $tag The tag – must match be a valid cache frontend tag
     *
     * @return void
     * @throws \TechDivision\Servlet\IllegalStateException
     */
    public function removeTag($tag);

    /**
     * Returns the tags this session has been tagged with.
     *
     * @return array The tags or an empty array if there aren't any
     * @throws \TechDivision\Servlet\IllegalStateException
     */
    public function getTags();

    /**
     * Shuts down this session
     *
     * This method must not be called manually – it is invoked by Flow's object
     * management.
     *
     * @return void
     */
    public function shutdownObject();

    /**
     * Explicitly writes and closes the session
     *
     * @return void
     */
    public function close();

    /**
     * Explicitly destroys all session data
     *
     * @return void
     * @throws \TechDivision\Servlet\IllegalStateException
     */
    public function destroy();

    /**
     * Iterates over all existing sessions and removes their data if the inactivity
     * timeout was reached.
     *
     * @return void
     */
    public function collectGarbage();

    /**
     * Creates and returns the session cookie to be added to the response.
     *
     * @param \TechDivision\Servlet\Http\ServletResponse The response that will be sent back to the client
     *
     * @return void
     */
    public function processResponse(HttpServletResponse $response);
}
