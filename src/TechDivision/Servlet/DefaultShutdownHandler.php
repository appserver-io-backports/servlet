<?php

/**
 * TechDivision\Servlet\DefaultShutdownHandler
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
 * @author    Johann Zelger <jz@techdivision.com>
 * @copyright 2014 TechDivision GmbH <info@techdivision.com>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.appserver.io
 */

namespace TechDivision\Servlet;

/**
 * Default shutdown handler implementations.
 *
 * @category  Appserver
 * @package   TechDivision_Servlet
 * @author    Johann Zelger <jz@techdivision.com>
 * @copyright 2014 TechDivision GmbH <info@techdivision.com>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.appserver.io
 */
class DefaultShutdownHandler implements ShutdownHandler
{

    /**
     * The Http servlet response instance.
     *
     * @var \TechDivision\Servlet\ServletResponse
     *
     */
    public $servletResponse;

    /**
     * Initializes the shutdown handler with the Http servlet response instance.
     * 
     * @param \TechDivision\Servlet\ServletResponse $servletResponse The Http servlet response instance
     *
     * @return void
     */
    public function __construct(ServletResponse $servletResponse)
    {
        $this->servletResponse = $servletResponse;
    }

    /**
     * It registers a shutdown function callback on the given servlet object.
     * So every servlet implementation can handle the shutdown on its own.
     *
     * @param \TechDivision\Servlet\Servlet $servlet The servlet instance
     *
     * @return void
     */
    public function register(Servlet $servlet)
    {
        ob_start();
        register_shutdown_function(
            array(&$servlet, 'shutdown'),
            $this->servletResponse
        );
    }
}
