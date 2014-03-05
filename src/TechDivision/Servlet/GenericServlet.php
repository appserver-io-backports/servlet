<?php

/**
 * TechDivision\Servlet\GenericServlet
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
 * @author    Tim Wagner <tw@techdivision.com>
 * @author    Johann Zelger <jz@techdivision.com>
 * @copyright 2014 TechDivision GmbH <info@techdivision.com>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.appserver.io
 */

namespace TechDivision\Servlet;

/**
 * Abstract servlet implementation.
 *
 * @category  Appserver
 * @package   TechDivision_Servlet
 * @author    Markus Stockbauer <ms@techdivision.com>
 * @author    Tim Wagner <tw@techdivision.com>
 * @author    Johann Zelger <jz@techdivision.com>
 * @copyright 2014 TechDivision GmbH <info@techdivision.com>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.appserver.io
 */
abstract class GenericServlet implements Servlet
{

    /**
     * The servlet configuration.
     *
     * @var \TechDivision\Servlet\ServletConfig
     */
    protected $servletConfig;
    
    /**
     * Information about the servlet, such as author, version, and copyright.
     * 
     * @var string
     */
    protected $servletInfo = '';

    /**
     * Injects the shutdown handler.
     *
     * @param \TechDivision\Servlet\ShutdownHandler $shutdownHandler The shutdown handler
     *
     * @return void
     */
    public function injectShutdownHandler(ShutdownHandler $shutdownHandler)
    {
        $shutdownHandler->register($this);
    }

    /**
     * Initializes the servlet with the passed configuration.
     *
     * @param \TechDivision\Servlet\ServletConfig $servletConfig The configuration to initialize the servlet with
     * 
     * @return void
     */
    public function init(ServletConfig $servletConfig)
    {
        $this->servletConfig = $servletConfig;
    }

    /**
     * Returns the servlet configuration.
     *
     * @return \TechDivision\Servlet\ServletConfig The servlet configuration
     */
    public function getServletConfig()
    {
        return $this->servletConfig;
    }

    /**
     * Returns information about the servlet, such as author, version, and copyright. By default, this method 
     * returns an empty string. You have to override this method to have it return a meaningful value.
     *
     * @return string The servlet information
     */
    public function getServletInfo()
    {
        return $this->servletInfo;
    }

    /**
     * Returns the servlet context instance.
     *
     * @return \TechDivision\Servlet\ServletContext The servlet context instance
     */
    public function getServletContext()
    {
        return $this->getServletConfig()->getServletContext();
    }

    /**
     * Returns the servlets name from the web.xml configuration file.
     *
     * @return string The servlet name
     */
    public function getServletName()
    {
        return $this->getServletConfig()->getServletName();
    }

    /**
     * Returns the init parameter with the passed name.
     *
     * @param string $name Name of the init parameter to return
     *
     * @return null|string
     */
    public function getInitParameter($name)
    {
        return $this->getServletConfig()->getInitParameter($name);
    }

    /**
     * Will be invoked by the PHP when the servlets destruct method or exit() or die() has been invoked.
     *
     * @param \TechDivision\Servlet\ServletResponse $servletResponse The response sent back to the client
     *
     * @return void
     */
    public function shutdown(ServletResponse $servletResponse)
    {

        $content = '';

        // check of output buffer has content
        if (ob_get_length()) {
            // set content with output buffer
            $content = ob_get_clean();
        }

        // set content to response
        $servletResponse->setContent($content);
    }
}
