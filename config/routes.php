<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

/**
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass()`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 *
 * Cache: Routes are cached to improve performance, check the RoutingMiddleware
 * constructor in your `src/Application.php` file to change this behavior.
 *
 */
Router::defaultRouteClass(DashedRoute::class);

Router::scope('/', function (RouteBuilder $routes) {
    /**
     * Here, we are connecting '/' (base path) to a controller called 'Pages',
     * its action called 'display', and we pass a param to select the view file
     * to use (in this case, src/Template/Pages/home.ctp)...
     */
  //  $routes->connect('/', ['controller' => 'Users', 'action' => 'index']);
    $routes->connect('/', ['controller' => 'Users', 'action' => 'login']);
    /**
     * ...and connect the rest of 'Pages' controller's URLs.
     */
    $routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);

    $routes->scope('/api', function (RouteBuilder $routes) {
        $routes->resources('Companies');
        $routes->resources('Branches');
        $routes->resources('Departments');
        $routes->resources('Permissions');
        $routes->resources('Employees');
        $routes->resources('Roles');
        $routes->resources('Accounts');
        $routes->resources('Bills');
        $routes->resources('Branches');
        $routes->resources('Roles');
        $routes->resources('Clients');
        $routes->resources('Confiscations');
        $routes->resources('Contacts');
        $routes->resources('Damages');
        $routes->resources('Departments');
        $routes->resources('Deposits');
        $routes->resources('Employees');
        $routes->resources('Evictions');
        $routes->resources('Exceptions');
        $routes->resources('Expenses');
        $routes->resources('Installments');
        $routes->resources('Kins');
        $routes->resources('Messages');
        $routes->resources('Passwords');
        $routes->resources('Payments');
        $routes->resources('Penalties');
        $routes->resources('Properties');
        $routes->resources('Refunds');
        $routes->resources('Rents');
        $routes->resources('Requisitions');
        $routes->resources('Securities');
        $routes->resources('Tenants');
        $routes->resources('Units');
        $routes->resources('Users');
        $routes->resources('Utilities');

        /**
         * Connect catchall routes for all controllers.
         *
         * Using the argument `DashedRoute`, the `fallbacks` method is a shortcut for
         *    `$routes->connect('/:controller', ['action' => 'index'], ['routeClass' => 'DashedRoute']);`
         *    `$routes->connect('/:controller/:action/*', [], ['routeClass' => 'DashedRoute']);`
         *
         * Any route class can be used with this method, such as:
         * - DashedRoute
         * - InflectedRoute
         * - Route
         * - Or your own route class
         *
         * You can remove these routes once you've connected the
         * routes you want in your application.
         */

    });
    $routes->fallbacks(DashedRoute::class);
});



