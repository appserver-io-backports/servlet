<?php

/**
 * TechDivision\Servlet\SessionUtils
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
 * A servlet session implementation.
 *
 * @category   Appserver
 * @package    TechDivision_Servlet
 * @subpackage Http
 * @author     Tim Wagner <tw@techdivision.com>
 * @copyright  2014 TechDivision GmbH <info@techdivision.com>
 * @license    http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link       http://www.appserver.io
 */
class SessionUtils
{

    /**
     * Private constructor to disable direct instanciation.
     *
     * @return void
     */
    private function __construct()
    {
    }

    /**
     * Creates a random string with the passed length.
     *
     * @param integer $length The string lenght to generate
     *
     * @return string The random string
     */
    public static function generateRandomString($length = 32)
    {

        // prepare an array with the chars used to create a random string
        $letters = str_split('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz');

        // create and return the random string
        $bytes = '';
        foreach (range(1, $length) as $i) {
            $bytes = $letters[mt_rand(0, sizeof($letters) - 1)] . $bytes;
        }

        // return the unique ID
        return $bytes;
    }
}
