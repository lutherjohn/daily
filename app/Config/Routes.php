<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Pages::index');
$routes->get('pages/dashboard', 'Pages::dashboard');
$routes->get('pages/loginValidation', 'Pages::loginValidation');
$routes->get('admin/agentList', 'Admin::agentList');
$routes->get('admin/crudAgents', 'Admin::crudAgents');
$routes->get('admin/editAgents/(:num)', 'Admin::editAgents/$1');
$routes->get('admin/updateAgents/(:num)', 'Admin::updateAgents/$1');
$routes->get('admin/deleteAgents/(:num)', 'Admin::deleteAgents/$1');
$routes->get('admin/addAssignClients', 'Admin::addAssignClients');
$routes->get('admin/getAssignClientsToAgents/(:num)', 'Admin::getAssignClientsToAgents/$1');
$routes->get('admin/clientList', 'Admin::clientList');
$routes->get('admin/crudClients', 'Admin::crudClients');
$routes->get('admin/editClients/(:num)', 'Admin::editClients/$1');
$routes->get('admin/updateClients/(:num)', 'Admin/updateClients/$1');
$routes->get('admin/reportList', 'Admin::reportList');
$routes->get('/admin/crudLeadGen/(:num)', 'Admin::crudLeadGen/$1');
$routes->get('admin/viewTasksById/(:num)','Admin::viewTasksById/$1');
$routes->get('admin/viewAgentsDetails/(:num)', 'Admin::viewAgentsDetails/$1');
$routes->get('admin/clientAgentsData/(:num)', 'Admin::clientAgentsData/$1');
$routes->get('(:any)', 'Pages::showme/$1');

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
