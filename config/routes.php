<?php
/**
 * CakePHP Plugin : CakePHP Subdomain Routing
 * Copyright (c) Multidimension.al (http://multidimension.al)
 * Github : https://github.com/multidimension-al/cakephp-subdomains
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE file
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright (c) Multidimension.al (http://multidimension.al)
 * @link      https://github.com/multidimension-al/cakephp-subdomains Github
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */

namespace Multidimensional\Subdomains\Config;

use Cake\Routing\Router;
use Multidimensional\Subdomains\Middleware\SubdomainMiddleware;
use Multidimensional\Subdomains\Routing\Route\SubdomainRoute;

$subdomainsObject = new SubdomainMiddleware();
$subdomains = $subdomainsObject->getSubdomains();

if (is_array($subdomains)) {
    foreach ($subdomains as $prefix) {
        Router::scope(
            '/',
            ['prefix' => $prefix],
            function ($routes) {
                $routes->fallbacks('Multidimensional/Subdomains.SubdomainRoute');
            }
        );
    }
}
