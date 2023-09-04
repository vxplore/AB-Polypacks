<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// ===========================
// Client Website Routes Start
// ===========================
$routes->get('/', 'Client\Home::index');
$routes->get('/about', 'Client\About::index');
$routes->get('/products', 'Client\Products::index');
$routes->get('/infrastructure', 'Client\Infrastructure::index');
$routes->get('/quality', 'Client\Quality::index');
$routes->get('/carrer', 'Client\Carrer::index');
$routes->get('/client', 'Client\Client::index');
$routes->get('/blog', 'Client\Blog::index');
$routes->get('/contact-us', 'Client\Contact_us::index');
$routes->get('/privacy-policy', 'Client\Privacy_policy::index');
$routes->get('/terms-and-conditions', 'Client\Terms_and_conditions::index');
// =========================
// Client Website Routes End
// =========================


// ========================
// Admin Panel Routes Start
// ========================
$routes->get('/admin', 'Admin\Auth::index');
$routes->post('/admin/verify-user', 'Admin\Auth::verify_user');
$routes->get('/admin/signup', 'Admin\Auth::get_signup_view');
$routes->get('/admin/dashboard', 'Admin\Dashboard::index');
// ======================
// Admin Panel Routes End
// ======================