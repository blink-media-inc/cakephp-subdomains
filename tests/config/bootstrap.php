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
 * @copyright     (c) Multidimension.al (http://multidimension.al)
 * @link          https://github.com/multidimension-al/cakephp-subdomains Github
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
 
namespace Multidimensional\Subdomains\Tests\Config;

use Cake\Core\Configure;
use Cake\Event\EventManager;

use Multidimensional\Subdomains\Middleware\SubdomainMiddleware;

Configure::write('Multidimensional/Subdomains.Subdomains', ['admin']);

/*
 *  Middleware
 */
 
EventManager::instance()->on(
    'Server.buildMiddleware',
    function($event, $middleware) {
        $middleware->add(new SubdomainMiddleware());
    }
);
