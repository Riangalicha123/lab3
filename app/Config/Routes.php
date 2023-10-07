<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/login', 'AdminController::loginPage');
$routes->get('/signup', 'AdminController::signupPage');
$routes->post('/registerAcc', 'AdminController::register');
$routes->post('/loginAuth', 'AdminController::loginAuth');
$routes->get('/logout', 'AdminController::logout');



$routes->get('/main', 'UserController::main');
$routes->get('/about', 'UserController::about');
$routes->get('/contact', 'UserController::contact');
$routes->get('/new', 'UserController::new');
$routes->get('/product', 'UserController::product');
$routes->get('/cart', 'UserController::cart');


$routes->group('admin',['filter' => 'authGuard'], function($routes){
    $routes->get('/dashboard', 'AdminDashController::dashboard');
    $routes->get('/products', 'AdminDashController::viewProducts');
    $routes->post('saveProduct', 'AdminDashController::addProduct');
    $routes->get('deleteProd/(:any)', 'AdminDashController::deleteProd/$1');
    $routes->get('editProd/(:any)', 'AdminDashController::editProd/$1');
    $routes->post('editProd/updateProd', 'AdminDashController::updateProd');
});


