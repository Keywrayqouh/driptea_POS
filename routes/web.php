<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/{any}', 'App\Http\Controllers\PageController@index')->where('any', '.*');
Route::post('register', 'App\Http\Controllers\UserController@register');
Route::post('login', 'App\Http\Controllers\UserController@authenticate');
Route::post('tokenRefresh', 'App\Http\Controllers\UserController@tokenRefresh');
Route::post('deaunthenticate', 'App\Http\Controllers\UserController@deaunthenticate');
Route::post('getUserData', 'App\Http\Controllers\UserController@userdata');
Route::post('getUserName', 'App\Http\Controllers\UserController@getUserName');
Route::post('SaveNEWdata', 'App\Http\Controllers\UserController@SaveNEWdata');


Route::post('addCategory','App\Http\Controllers\AddCategoryController@addCategory');
Route::post('updateCategory','App\Http\Controllers\AddCategoryController@updateCategory');
Route::post('retrieveCategory','App\Http\Controllers\AddCategoryController@retrieveCategory');
Route::post('retrieveCategoryAscending','App\Http\Controllers\AddCategoryController@retrieveCategoryAscending');
Route::post('retrieveCategoryForSales','App\Http\Controllers\AddCategoryController@retrieveCategoryAscending');


Route::post('addCustomer','App\Http\Controllers\CustomerDetailsController@insertCustomer');

Route::post('addOrder','App\Http\Controllers\OrderController@addOrder');
Route::post('updateStatus','App\Http\Controllers\OrderController@updateStatus');
Route::post('updateOnlineStatus','App\Http\Controllers\OrderController@updateOnlineStatus');
Route::post('deleteOrder','App\Http\Controllers\OrderController@deleteOrder');
Route::post('retrieveOrder','App\Http\Controllers\OrderController@retrieveOrder');
Route::post('retrieveCustomerOrder','App\Http\Controllers\OrderController@retrieveCustomerOrder');
Route::post('retrieveOnlineOrder','App\Http\Controllers\OrderController@retrieveOnlineOrder');
Route::post('retrieveWholeOrder','App\Http\Controllers\OrderController@retrieveWholeOrder');
Route::post('getOrder','App\Http\Controllers\OrderController@getOrder');


Route::post('retrieveSalesReportPerCategory','App\Http\Controllers\OrderController@retrieveSalesReportPerCategory');


Route::post('addingAddOns','App\Http\Controllers\AddAddOnsController@addAddons');
Route::post('retrievingAddOns','App\Http\Controllers\AddAddOnsController@retrieveAddOns');
Route::post('updateStatusAddOns','App\Http\Controllers\AddAddOnsController@updateStatusAvailable');
Route::post('updateAddOns','App\Http\Controllers\AddAddOnsController@updateAddOns');
Route::post('retrieveOneAddOn','App\Http\Controllers\AddAddOnsController@retrieveOneAddOn');
Route::post('retrieveAllAddOns','App\Http\Controllers\AddAddOnsController@retrieveAllAddOns');
Route::post('retrieveOneAddOnName','App\Http\Controllers\AddAddOnsController@retrieveOneAddOnName');

Route::post('addingCupType','App\Http\Controllers\CupTypeController@addingCupType');
Route::post('retrieveCupType','App\Http\Controllers\CupTypeController@retrieveCupType');
Route::post('retrieveOneCupType','App\Http\Controllers\CupTypeController@retrieveOneCupType');
Route::post('updateAvailableCupType','App\Http\Controllers\CupTypeController@updateAvailableCupType');
Route::post('editingCupType','App\Http\Controllers\CupTypeController@editingCupType');
Route::post('retrieveAllCupType','App\Http\Controllers\CupTypeController@retrieveAllCupType');

Route::post('addCheckout','App\Http\Controllers\StoreCheckoutsController@addCheckout');
Route::post('retrieveCheckouts','App\Http\Controllers\StoreCheckoutsController@retrieveCheckouts');
Route::post('retrieveAllCheckouts','App\Http\Controllers\StoreCheckoutsController@retrieveAllCheckouts');
Route::post('retrieveOnlineCheckouts','App\Http\Controllers\StoreCheckoutsController@retrieveOnlineCheckouts');
Route::post('retrieveAllSales','App\Http\Controllers\StoreCheckoutsController@retrieveAllSales');

Route::post('getDailySales','App\Http\Controllers\StoreCheckoutsController@retrieveDailySales');
Route::post('getmonthlySales','App\Http\Controllers\StoreCheckoutsController@retrieveMonthlySales');
Route::post('getQuarterlySales','App\Http\Controllers\StoreCheckoutsController@retrieveQuarterSales');
Route::post('getSemi-AnnualSales','App\Http\Controllers\StoreCheckoutsController@retrieveSemiSales');
Route::post('getAnnualSales','App\Http\Controllers\StoreCheckoutsController@retrieveAnnualSales');
Route::post('getyears','App\Http\Controllers\StoreCheckoutsController@retrieveYears');
Route::post('getTopProd','App\Http\Controllers\OrderController@retrieveTopProducts');
Route::post('addIncomingCups','App\Http\Controllers\QuantityCupsController@addIncomingCups');
Route::post('updateRemainingCups','App\Http\Controllers\QuantityCupsController@updateRemainingCups');
Route::post('retrieveCupSize','App\Http\Controllers\QuantityCupsController@retrieveCupSize');

Route::post('retrieveCupForInventory','App\Http\Controllers\QuantityCupsController@retrieveCupSize');

Route::post('retrieveYear','App\Http\Controllers\StoreCheckoutsController@retrieveYear');

//SalesInventory
Route::post('retrieveDailySales','App\Http\Controllers\StoreCheckoutsController@retrieveDailySales');
Route::group(['middleware' => ['jwt.verify']], function() {
    Route::post('user', 'App\Http\Controllers\UserController@getAuthenticatedUser');
    Route::post('formSubmit','App\Http\Controllers\ProductController@formSubmit');
    Route::post('updateProduct','App\Http\Controllers\ProductController@updateProduct');
    Route::post('retrieveProduct','App\Http\Controllers\ProductController@retrieveProduct');
    Route::post('retrieveOneProduct','App\Http\Controllers\ProductController@retrieveOneProduct');
    Route::post('retrieveAllProduct','App\Http\Controllers\ProductController@retrieveAllProduct');
    Route::post('retrieveAllProductAscending','App\Http\Controllers\ProductController@retrieveAllProductAscending');
    Route::post('updateStatusProduct','App\Http\Controllers\ProductController@updateStatusProduct');

    Route::post('addCategory','App\Http\Controllers\AddCategoryController@addCategory');
    Route::post('updateCategory','App\Http\Controllers\AddCategoryController@updateCategory');
    Route::post('retrieveCategory','App\Http\Controllers\AddCategoryController@retrieveCategory');
    Route::post('retrieveCategoryAscending','App\Http\Controllers\AddCategoryController@retrieveCategoryAscending');
    Route::post('retrieveCategoryForSales','App\Http\Controllers\AddCategoryController@retrieveCategoryAscending');

    Route::post('addCustomer','App\Http\Controllers\CustomerDetailsController@insertCustomer');

    Route::post('addOrder','App\Http\Controllers\OrderController@addOrder');
    Route::post('updateStatus','App\Http\Controllers\OrderController@updateStatus');
    Route::post('updateOnlineStatus','App\Http\Controllers\OrderController@updateOnlineStatus');
    Route::post('deleteOrder','App\Http\Controllers\OrderController@deleteOrder');
    Route::post('retrieveOrder','App\Http\Controllers\OrderController@retrieveOrder');
    Route::post('retrieveCustomerOrder','App\Http\Controllers\OrderController@retrieveCustomerOrder');
    Route::post('retrieveOnlineOrder','App\Http\Controllers\OrderController@retrieveOnlineOrder');
    Route::post('retrieveWholeOrder','App\Http\Controllers\OrderController@retrieveWholeOrder');
    Route::post('getOrder','App\Http\Controllers\OrderController@getOrder');
    Route::post('retrieveSalesReportPerCategory','App\Http\Controllers\OrderController@retrieveSalesReportPerCategory');


    Route::post('addingAddOns','App\Http\Controllers\AddAddOnsController@addAddons');
    Route::post('retrievingAddOns','App\Http\Controllers\AddAddOnsController@retrieveAddOns');
    Route::post('updateStatusAddOns','App\Http\Controllers\AddAddOnsController@updateStatusAvailable');
    Route::post('updateAddOns','App\Http\Controllers\AddAddOnsController@updateAddOns');
    Route::post('retrieveOneAddOn','App\Http\Controllers\AddAddOnsController@retrieveOneAddOn');
    Route::post('retrieveAllAddOns','App\Http\Controllers\AddAddOnsController@retrieveAllAddOns');
    Route::post('retrieveOneAddOnName','App\Http\Controllers\AddAddOnsController@retrieveOneAddOnName');

    Route::post('addingCupType','App\Http\Controllers\CupTypeController@addingCupType');
    Route::post('retrieveCupType','App\Http\Controllers\CupTypeController@retrieveCupType');
    Route::post('retrieveOneCupType','App\Http\Controllers\CupTypeController@retrieveOneCupType');
    Route::post('updateAvailableCupType','App\Http\Controllers\CupTypeController@updateAvailableCupType');
    Route::post('editingCupType','App\Http\Controllers\CupTypeController@editingCupType');
    Route::post('retrieveAllCupType','App\Http\Controllers\CupTypeController@retrieveAllCupType');

    Route::post('addCheckout','App\Http\Controllers\StoreCheckoutsController@addCheckout');
    Route::post('retrieveCheckouts','App\Http\Controllers\StoreCheckoutsController@retrieveCheckouts');
    Route::post('retrieveAllCheckouts','App\Http\Controllers\StoreCheckoutsController@retrieveAllCheckouts');
    Route::post('retrieveOnlineCheckouts','App\Http\Controllers\StoreCheckoutsController@retrieveOnlineCheckouts');
    Route::post('retrieveAllSales','App\Http\Controllers\StoreCheckoutsController@retrieveAllSales');

    Route::post('getDailySales','App\Http\Controllers\StoreCheckoutsController@retrieveDailySales');
    Route::post('getmonthlySales','App\Http\Controllers\StoreCheckoutsController@retrieveMonthlySales');
    Route::post('getQuarterlySales','App\Http\Controllers\StoreCheckoutsController@retrieveQuarterSales');
    Route::post('getSemi-AnnualSales','App\Http\Controllers\StoreCheckoutsController@retrieveSemiSales');
    Route::post('getAnnualSales','App\Http\Controllers\StoreCheckoutsController@retrieveAnnualSales');
    Route::post('getyears','App\Http\Controllers\StoreCheckoutsController@retrieveYears');
    Route::post('retrieveYear','App\Http\Controllers\StoreCheckoutsController@retrieveYear');
    Route::post('retrieveDailySales','App\Http\Controllers\StoreCheckoutsController@retrieveDailySales');
    
    Route::post('getTopProd','App\Http\Controllers\OrderController@retrieveTopProducts');
    Route::post('addIncomingCups','App\Http\Controllers\QuantityCupsController@addIncomingCups');
    Route::post('updateRemainingCups','App\Http\Controllers\QuantityCupsController@updateRemainingCups');
    Route::post('retrieveCupSize','App\Http\Controllers\QuantityCupsController@retrieveCupSize');
    Route::post('retrieveCupForInventory','App\Http\Controllers\QuantityCupsController@retrieveCupSize');

});
 