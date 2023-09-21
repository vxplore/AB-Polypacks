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
$routes->get('/admin/logout', 'Admin\Auth::logout');
$routes->get('/admin/dashboard', 'Admin\Dashboard::index');
$routes->get('/admin/SEO', 'Admin\SEO::index');
$routes->get('/admin/SEO/edit-content/(:any)', 'Admin\SEO::get_SEO_content_edit_view/$1');
$routes->post('/admin/SEO/save-content', 'Admin\SEO::save_SEO_content');
$routes->get('/admin/pages/edit-content/(:any)', 'Admin\Pages::get_page_contents_edit_view/$1');
$routes->get('/admin/banners', 'Admin\Banners::index');
$routes->get('/admin/banners/add', 'Admin\Banners::get_banner_add_view');
$routes->post('/admin/banners/add-new-banner', 'Admin\Banners::add_new_banner');
$routes->get('/admin/banners/edit/(:any)', 'Admin\Banners::get_banner_edit_view/$1');
$routes->post('/admin/banners/save-banner-details', 'Admin\Banners::save_banner_details');
$routes->post('/admin/banners/change-banner-status', 'Admin\Banners::change_banner_status');
$routes->post('/admin/banners/change-banner-appearing-order', 'Admin\Banners::change_banner_appearing_order');
$routes->get('/admin/banners/delete/(:any)', 'Admin\Banners::delete_banner/$1');
$routes->get('/admin/clients', 'Admin\Clients::index');
$routes->post('/admin/clients/add-new-client', 'Admin\Clients::add_new_client');
$routes->post('/admin/clients/edit-client-details', 'Admin\Clients::edit_client_details');
$routes->post('/admin/clients/change-client-appearing-order', 'Admin\Clients::change_client_appearing_order');
$routes->get('/admin/clients/delete/(:any)', 'Admin\Clients::delete_client/$1');
$routes->get('/admin/product/categories', 'Admin\Product::get_product_categories_view');
$routes->post('/admin/product/categories/add-new-category', 'Admin\Product::add_new_category');
$routes->post('/admin/product/categories/edit-category-details', 'Admin\Product::edit_category_details');
$routes->post('/admin/product/categories/change-category-appearing-order', 'Admin\Product::change_category_appearing_order');
$routes->post('/admin/product/categories/change-category-status', 'Admin\Product::change_category_status');
$routes->get('/admin/product/categories/delete/(:any)', 'Admin\Product::delete_category/$1');
$routes->get('/admin/product/list', 'Admin\Product::get_product_list_view');
$routes->post('/admin/product/add-new-product', 'Admin\Product::add_new_product');
$routes->post('/admin/product/edit-product-details', 'Admin\Product::edit_product_details');
$routes->post('/admin/product/change-product-appearing-order', 'Admin\Product::change_product_appearing_order');
$routes->post('/admin/product/change-product-status', 'Admin\Product::change_product_status');
$routes->get('/admin/product/delete/(:any)', 'Admin\Product::delete_product/$1');
$routes->get('/admin/testimonials', 'Admin\Testimonials::index');
// ======================
// Admin Panel Routes End
// ======================