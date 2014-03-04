<?php

/**
 * TechDivision\Servlet\Servlet
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
 * @author    Markus Stockbauer <ms@techdivision.com>
 * @copyright 2014 TechDivision GmbH <info@techdivision.com>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.appserver.io
 */

namespace TechDivision\Servlet;

/**
 * Interface for all servlets.
 *
 * @category  Appserver
 * @package   TechDivision_Servlet
 * @author    Markus Stockbauer <ms@techdivision.com>
 * @copyright 2014 TechDivision GmbH <info@techdivision.com>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.appserver.io
 */
interface Servlet
{

    /**
     * Initializes the servlet with the passed configuration.
     *
     * @param \TechDivision\Servlet\ServletConfig $config The configuration to initialize the servlet with
     *
     * @throws \TechDivision\Servlet\ServletException Is thrown if the configuration has errors
     * @return void
     */
    public function init(ServletConfig $config);

    /**
     * Return's the servlet's configuration.
     *
     * @return \TechDivision\Servlet\ServletConfig The servlet's configuration
     */
    public function getServletConfig();

    /**
     * Returns the servlet context instance
     * 
     * @return \TechDivision\Servlet\ServletContext The servlet context instance
     */
    public function getServletContext();

    /**
     * Delegates to http method specific functions like doPost() for POST e.g.
     *
     * @param \TechDivision\Servlet\ServletRequest  $servletRequest  The request instance
     * @param \TechDivision\Servlet\ServletResponse $servletResponse The response sent back to the client
     * 
     * @return void
     */
    public function service(ServletRequest $servletRequest, ServletResponse $servletResponse);

    /**
     * Returns an array with the servlet information.
     *
     * @return array The server information
     */
    public function getServletInfo();

    /**
     * Will be invoked by the PHP when the servlets destruct method or exit() or die() has been invoked.
     * 
     * @param \TechDivision\Servlet\ServletResponse $servletResponse The response sent back to the client
     *
     * @return void
     */
    public function shutdown(ServletResponse $servletResponse);

    /**
     * Destroys the object on shutdown.
     *
     * @return void
     */
    public function destroy();
}
