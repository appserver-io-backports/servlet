<?php

/**
 * TechDivision\Servlet\ServletSession
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

namespace TechDivision\Servlet;

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
interface ServletSession
{

    /**
     * Starts the session, if it has not been already started
     *
     * @return void
     */
    public function start();

    /**
     * Tells if the session has been started already.
     *
     * @return boolean
     */
    public function isStarted();

    /**
     * Returns the current session identifier
     *
     * @return string The current session identifier
     */
    public function getId();

    /**
     * Returns the unix time stamp marking the last point in time this session has
     * been in use.
     *
     * For the current (local) session, this method will always return the current
     * time. For a remote session, the unix timestamp will be returned.
     *
     * @return integer UNIX timestamp
     */
    public function getLastActivityTimestamp();

    /**
     * Returns the session name.
     *
     * @return string The session name
     */
    public function getName();

    /**
     * Returns date and time after the session expires.
     *
     * @return integer|DateTime The date and time after the session expires
     */
    public function getLifetime();

    /**
     * Returns the number of seconds until the session expires.
     *
     * @return integer|null Number of seconds until the session expires
     */
    public function getMaximumAge();

    /**
     * Returns the host to which the user agent will send this cookie.
     *
     * @return string|null The host to which the user agent will send this cookie
     */
    public function getDomain();

    /**
     * Returns the path describing the scope of this cookie.
     *
     * @return string The path describing the scope of this cookie
     */
    public function getPath();

    /**
     * Returns if this session should only be sent through a "secure" channel by the user agent.
     *
     * @return boolean TRUE if the session should only be sent through a "secure" channel, else FALSE
     */
    public function isSecure();

    /**
     * Returns if this session should only be used through the HTTP protocol.
     *
     * @return boolean TRUE if the session should only be used through the HTTP protocol
     */
    public function isHttpOnly();

    /**
     * Returns the data associated with the given key.
     *
     * @param string $key An identifier for the content stored in the session.
     *
     * @return mixed The contents associated with the given key
     */
    public function getData($key);

    /**
     * Returns TRUE if a session data entry $key is available.
     *
     * @param string $key Entry identifier of the session data
     *
     * @return boolean
     */
    public function hasKey($key);

    /**
     * Stores the given data under the given key in the session
     *
     * @param string $key  The key under which the data should be stored
     * @param mixed  $data The data to be stored
     *
     * @return void
     */
    public function putData($key, $data);

    /**
     * Tags this session with the given tag.
     *
     * Note that third-party libraries might also tag your session. Therefore it is
     * recommended to use namespaced tags such as "Acme-Demo-MySpecialTag".
     *
     * @param string $tag The tag – must match be a valid cache frontend tag
     *
     * @return void
     */
    public function addTag($tag);

    /**
     * Removes the specified tag from this session.
     *
     * @param string $tag The tag – must match be a valid cache frontend tag
     *
     * @return void
     */
    public function removeTag($tag);

    /**
     * Returns the tags this session has been tagged with.
     *
     * @return array The tags or an empty array if there aren't any
     */
    public function getTags();

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
     * Explicitly destroys all session data.
     *
     * @param string $reason The reason why the session has been destroyed
     *
     * @return void
     */
    public function destroy($reason);

    /**
     * Returns the checksum for this session instance.
     *
     * @return string The checksum
     */
    public function checksum();
}
