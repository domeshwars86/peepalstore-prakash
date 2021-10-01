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

Route::get('/', function () {
    return view('pages.landing.index');
    // return view('welcome');
});
Route::get('/logout', 'AuthController@logout');

Route::post('/verifyLoginCredential','AuthController@login');

Route::group(['middleware'=>['LoginCheck']],function(){
    //-----OnlyAdminAccessibleRoute-----
    Route::group(['middleware' => ['OnlyAdminAccessibleRoute']], function() {
        Route::get('/admin/dashboard', 'PageController@adminDashboard');
    });

    //-----OnlyStaffAccessibleRoute-----
    Route::group(['middleware' => ['OnlyStaffAccessibleRoute']], function() {
        
    });

    //-----AdminAndStaffAccessibleRoute-----
    Route::group(['middleware' => ['AdminAndStaffAccessibleRoute']], function() {
        //----- Product-----
        Route::get('/admin/product_list','ProductController@get_product')->name('get_product');
        Route::post('/admin/get-product-list','ProductController@getProductList');
        Route::post('/admin/edit-product-record','ProductController@editProductRecord');
        Route::post('/admin/update-product-record','ProductController@updateProductRecords');
    });
    
});




Route::get('/about_us', 'PageController@about_us')->name('about_us');
Route::get('/contact', 'PageController@contact')->name('contact');
Route::get('/all_list', 'PageController@all_list')->name('all_list');
Route::get('/admin_panel', 'PageController@admin_panel')->name('admin_panel');

// mst_brand
Route::post('/register/brand','BrandController@create_brand')->name('master.brand');
Route::get('/brand_list','BrandController@get_brand')->name('get_brand');
Route::post('/brand_delete_modal','BrandController@delete_record')->name('brand_delete');
Route::post('/update/{id}','BrandController@update')->name('update.brand'); 

//mst_category
Route::post('/register/category','CategoryController@create_category')->name('master.category');
Route::get('/category_list','CategoryController@get_category')->name('get_category');
Route::post('/category_delete_modal','CategoryController@delete_record')->name('category_delete');
Route::post('/update-category/{id}','CategoryController@update')->name('update.category');

//product
Route::post('/register/product','ProductController@create_product')->name('master.product');
// Route::get('/product_list','ProductController@get_product')->name('get_product');
Route::post('/product_delete_modal','ProductController@delete_record')->name('product_delete');
Route::post('/update-product/{id}','ProductController@update')->name('update.product');


//search routes
Route::get('/product_list_search','ProductController@product_list_search')->name('product_list_search');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
