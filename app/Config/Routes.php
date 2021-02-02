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
$routes->get('agents/agentList', 'Agents::agentList');
$routes->get('agents/crudAgents', 'Agents::crudAgents');
$routes->get('agents/editAgents/(:num)', 'Agents::editAgents/$1');
$routes->get('agents/updateAgents/(:num)', 'Agents::updateAgents/$1');
$routes->get('agents/deleteAgents/(:num)', 'Agents::deleteAgents/$1');
$routes->get('agents/addAssignClients', 'Agents::addAssignClients');
$routes->get('agents/getAssignClientsToAgents/(:num)', 'Agents::getAssignClientsToAgents/$1');
$routes->get('clients/clientList', 'Clients::clientList');
$routes->get('clients/crudClients', 'Clients::crudClients');
$routes->get('clients/editClients/(:num)', 'Clients::editClients/$1');
$routes->get('clients/updateClients/(:num)', 'Clients/updateClients/$1');
$routes->get('reports/reportList', 'Reports::reportList');
$routes->get('/reports/crudLeadGen/(:num)', 'Reports::crudLeadGen/$1');
$routes->get('reports/viewTasksById/(:num)','Reports::viewTasksById/$1');
$routes->get('agents/viewAgentsDetails/(:num)', 'Agents::viewAgentsDetails/$1');
$routes->get('agents/clientAgentsData/(:num)', 'Agents::clientAgentsData/$1');
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
