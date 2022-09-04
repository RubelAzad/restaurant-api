<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->post('/user-login', 'LoginController@userLogin');
// Show ALL products
$router->get('/products', 'ProductController@index');

//show Each Products By ID
$router->get('/products/{id}', 'ProductController@show');

//store products
$router->post('/products/create', 'ProductController@store');

//update products
$router->post('/products/update/{id}', 'ProductController@update');

// Delete
$router->delete('/products/delete/{id}', 'ProductController@destroy');

$router->get('/categories', 'RcategoryController@index');
$router->get('/categories1', 'RcategoryController@category');
$router->get('/categories/{id}', 'RitemController@show');
$router->get('/products/{id}', 'RitemController@itemshow');
$router->get('/categories1', 'RitemController@show1');
//$router->get('/employees', 'EmployeeController@index');
$router->get('/employees/hotel/{id}', 'EmployeeController@hotel');
$router->get('/employees/reservation/{id}', 'EmployeeController@reservation');
$router->get('/employees/walk/{id}', 'EmployeeController@walk');
$router->get('/employee', 'EmployeeController@employeetype');
$router->post('/employee/create', 'EmployeeController@store');
$router->get('/tables', 'TableController@index');


$router->get('/products1/{id}', 'RitemController@itemshow1');
$router->get('/menus/{id}', 'RitemController@menu');
//order route
$router->post('/create-orders', 'OrderController@createOrUpdateOrder');
$router->post('/order-payment', 'OrderController@orderPayment');
$router->post('/order-then-payment', 'OrderController@orderThenPayment');
$router->get('/restaurant-order-list', 'OrderController@restaurantOrderList');
$router->get('/room-service-order-list', 'OrderController@roomServiceOrderList');
$router->post('/restaurant-cancel-order', 'OrderController@restaurantOrderCancel');
$router->post('/room-service-cancel-order', 'OrderController@roomServiceOrderCancel');

$router->get('/restaurant-order-list/{id}', 'OrderController@restaurantOrderListStatus');
$router->get('/restaurant-order-edit/{id}', 'OrderController@restaurantEditOrderId');


$router->get('/menu-type/{id}', 'RsettingController@menuId');
$router->get('/floor-list', 'TableController@floorName');
$router->get('/floor-list/{id}', 'TableController@floorNameId');
$router->post('/create-reservation', 'BookingController@createReservation');
$router->get('/reservation-list', 'BookingController@reservationList');
$router->get('/current-date/{date}', 'BookingController@currentDate');

//$router->get('/restaurant-reservation/{id}', 'BookingController@restaurantReservationOffline');

$router->get('/restaurant-reservation-offline/{token}', 'BookingController@restaurantReservationOffline');
$router->get('/restaurant-pos-login/{token}', 'LoginController@restaurantPosLogin');
$router->get('/restaurant-pos-logout/{id}', 'LoginController@userPosLogout');

/* General Setting Route */

$router->get('/settings', 'GeneralSettingsController@generalSetting');


//Room service Route

$router->get('/room-service-settings', 'RoomserviceController@roomServiceSetting');
$router->get('/room-products/{id}', 'RoomserviceController@itemRoomService');
$router->get('/room-service-products/{id}', 'RitemController@itemIdWiseRoomServiceItem');
$router->get('/room-service-categories/{id}', 'RitemController@catIdWiseItemWithRoomServiceItem');
$router->get('/room-service-price', 'RitemController@itemWiseRoomServicePrice');
$router->get('/room-service-order-list/{id}', 'OrderController@roomServiceOrderListStatus');

//Card Type

$router->get('/card-type', 'CardPosController@cardType');
$router->get('/type-wise-card-number/{id}', 'CardPosController@typeWiseCardNumber');
$router->get('/member-card-info/{id}', 'CardPosController@memberCardInformation');


//event
$router->get('/event-list', 'EventController@index');
$router->get('/event-type/{id}', 'EventController@eventType');
$router->post('/create-event-booking', 'BookingEventController@createEventBooking');


$router->get('/', function () use ($router) {
    return $router->app->version();
});
