<?php

/**
 * TechDivision\Servlet\Http\HttpServlet
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
 * @author     Markus Stockbauer <ms@techdivision.com>
 * @author     Tim Wagner <tw@techdivision.com>
 * @copyright  2014 TechDivision GmbH <info@techdivision.com>
 * @license    http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link       http://www.appserver.io
 */

namespace TechDivision\Servlet\Http;

use TechDivision\Http\HttpProtocol;
use TechDivision\Servlet\GenericServlet;
use TechDivision\Servlet\ServletRequest;
use TechDivision\Servlet\ServletResponse;
use TechDivision\Servlet\ServletException;

/**
 * Abstract Http servlet implementation.
 *
 * @category   Appserver
 * @package    TechDivision_Servlet
 * @subpackage Http
 * @author     Markus Stockbauer <ms@techdivision.com>
 * @author     Tim Wagner <tw@techdivision.com>
 * @copyright  2014 TechDivision GmbH <info@techdivision.com>
 * @license    http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link       http://www.appserver.io
 */
abstract class HttpServlet extends GenericServlet
{

    /**
     * Implements Http CONNECT method.
     *
     * @param \TechDivision\Servlet\ServletRequest  $servletRequest  The request instance
     * @param \TechDivision\Servlet\ServletResponse $servletResponse The response instance
     *
     * @return void
     * @throws \TechDivision\Servlet\ServletException Is thrown if the request method is not implemented
     */
    public function doConnect(ServletRequest $servletRequest, ServletResponse $servletResponse)
    {
        throw new ServletException(sprintf('Method %s is not implemented in this servlet.', __METHOD__));
    }

    /**
     * Implements Http DELETE method.
     *
     * @param \TechDivision\Servlet\ServletRequest  $servletRequest  The request instance
     * @param \TechDivision\Servlet\ServletResponse $servletResponse The response instance
     *
     * @return void
     * @throws \TechDivision\Servlet\ServletException Is thrown if the request method is not implemented
     */
    public function doDelete(ServletRequest $servletRequest, ServletResponse $servletResponse)
    {
        throw new ServletException(sprintf('Method %s is not implemented in this servlet.', __METHOD__));
    }

    /**
     * Implements Http GET method.
     *
     * @param \TechDivision\Servlet\ServletRequest  $servletRequest  The request instance
     * @param \TechDivision\Servlet\ServletResponse $servletResponse The response instance
     *
     * @return void
     * @throws \TechDivision\Servlet\ServletException Is thrown if the request method is not implemented
     */
    public function doGet(ServletRequest $servletRequest, ServletResponse $servletResponse)
    {
        throw new ServletException(sprintf('Method %s is not implemented in this servlet.', __METHOD__));
    }

    /**
     * Implements Http HEAD method.
     *
     * @param \TechDivision\Servlet\ServletRequest  $servletRequest  The request instance
     * @param \TechDivision\Servlet\ServletResponse $servletResponse The response instance
     *
     * @return void
     * @throws \TechDivision\Servlet\ServletException Is thrown if the request method is not implemented
     */
    public function doHead(ServletRequest $servletRequest, ServletResponse $servletResponse)
    {
        throw new ServletException(sprintf('Method %s is not implemented in this servlet.', __METHOD__));
    }

    /**
     * Implements Http OPTIONS method.
     *
     * @param \TechDivision\Servlet\ServletRequest  $servletRequest  The request instance
     * @param \TechDivision\Servlet\ServletResponse $servletResponse The response instance
     *
     * @return void
     * @throws \TechDivision\Servlet\ServletException Is thrown if the request method is not implemented
     */
    public function doOptions(ServletRequest $servletRequest, ServletResponse $servletResponse)
    {
        throw new ServletException(sprintf('Method %s is not implemented in this servlet.', __METHOD__));
    }

    /**
     * Implements Http POST method.
     *
     * @param \TechDivision\Servlet\ServletRequest  $servletRequest  The request instance
     * @param \TechDivision\Servlet\ServletResponse $servletResponse The response instance
     *
     * @return void
     * @throws \TechDivision\Servlet\ServletException Is thrown if the request method is not implemented
     */
    public function doPost(ServletRequest $servletRequest, ServletResponse $servletResponse)
    {
        throw new ServletException(sprintf('Method %s is not implemented in this servlet.', __METHOD__));
    }

    /**
     * Implements Http PUT method.
     *
     * @param \TechDivision\Servlet\ServletRequest  $servletRequest  The request instance
     * @param \TechDivision\Servlet\ServletResponse $servletResponse The response instance
     *
     * @return void
     * @throws \TechDivision\Servlet\ServletException Is thrown if the request method is not implemented
     */
    public function doPut(ServletRequest $servletRequest, ServletResponse $servletResponse)
    {
        throw new ServletException(sprintf('Method %s is not implemented in this servlet.', __METHOD__));
    }

    /**
     * Implements Http TRACE method.
     *
     * @param \TechDivision\Servlet\ServletRequest  $servletRequest  The request instance
     * @param \TechDivision\Servlet\ServletResponse $servletResponse The response instance
     *
     * @return void
     * @throws \TechDivision\Servlet\ServletException Is thrown if the request method is not implemented
     */
    public function doTrace(ServletRequest $servletRequest, ServletResponse $servletResponse)
    {
        throw new ServletException(sprintf('Method %s is not implemented in this servlet.', __METHOD__));
    }

    /**
     * Delegation method for specific Http methods:
     *
     * @param \TechDivision\Servlet\ServletRequest  $servletRequest  The request instance
     * @param \TechDivision\Servlet\ServletResponse $servletResponse The response instance
     * 
     * @return void
     * @throws \TechDivision\Servlet\ServletException Is thrown if the request method is not available
     */
    public function service(ServletRequest $servletRequest, ServletResponse $servletResponse)
    {
        
        // pre-initialize response
        $servletResponse->addHeader(HttpProtocol::HEADER_NAME_X_POWERED_BY, get_class($this));
        
        // check the request method to invoke the appropriate method
        switch ($servletRequest->getMethod()) {
            case HttpProtocol::METHOD_CONNECT:
                $this->doConnect($servletRequest, $servletResponse);
                break;
            case HttpProtocol::METHOD_DELETE:
                $this->doDelete($servletRequest, $servletResponse);
                break;
            case HttpProtocol::METHOD_GET:
                $this->doGet($servletRequest, $servletResponse);
                break;
            case HttpProtocol::METHOD_HEAD:
                $this->doHead($servletRequest, $servletResponse);
                break;
            case HttpProtocol::METHOD_OPTIONS:
                $this->doOptions($servletRequest, $servletResponse);
                break;
            case HttpProtocol::METHOD_POST:
                $this->doPost($servletRequest, $servletResponse);
                break;
            case HttpProtocol::METHOD_PUT:
                $this->doPut($servletRequest, $servletResponse);
                break;
            case HttpProtocol::METHOD_TRACE:
                $this->doTrace($servletRequest, $servletResponse);
                break;
            default:
                throw new ServletException(
                    sprintf('%s is not implemented yet.', $servletRequest->getMethod())
                );
        }
    }
}
