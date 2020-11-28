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


//Test  
 Route::get('/a', function () {
     return view('admin.bill.list');
});


// <Admin>
//Login Admin 
Route::group(['prefix' => 'admin','namespace' => 'admin'], function () { 
    Route::get('/login','LoginController@getLogin')->name('get-admin-login');
    Route::post('/login','LoginController@postLogin')->name('post-admin-login');
    Route::get('/logout','LoginController@getLogout')->name('get-admin-logout');
});

Route::group(['middleware' => 'CheckAdminLogin','prefix' => 'admin','namespace' => 'admin'], function () {
    
    //Home
    Route::get('/home','HomeController@getHome')->name('get-admin-home');

    //Category
    Route::get('/category/list','CategoryController@getList')->name('get-list-category');
    Route::get('/category/search','CategoryController@getSearch')->name('get-search-category');
    Route::POST('/category/list','CategoryController@postList')->name('post-list-category');
    Route::get('/category/add','CategoryController@getAdd')->name('get-add-category');
    Route::get('/category/detail/{category_id}','CategoryController@getDetail')->name('get-detail-category');
    Route::get('/category/edit/{category_id}','CategoryController@getEdit')->name('get-edit-category');
    Route::post('/category/edit','CategoryController@postEdit')->name('post-edit-category');
    Route::post('/category/add','CategoryController@postAdd')->name('post-add-category');
    Route::get('/category/delete/{category_id}','CategoryController@getDelete')->name('get-delete-category');
    Route::get('/category/active/{category_id}','CategoryController@active')->name('active-category');
    Route::get('/category/unactive/{category_id}','CategoryController@unactive')->name('unactive-category');
    Route::post('/category/process-all','CategoryController@process_all')->name('process-all-category');
    Route::post('/category/import','CategoryController@postImport')->name('import-category');
    Route::get('/category/export','CategoryController@getExport')->name('export-category');
    Route::get('/category/viewproduct/{id_cate}','CategoryController@viewProduct')->name('view-product-category');

    //Brand
    Route::get('/brand/search','BrandController@getSearch')->name('get-search-brand');
    Route::POST('/brand/list','BrandController@postList')->name('post-list-brand');
    Route::get('/brand/list','BrandController@getList')->name('get-list-brand');
    Route::get('/brand/add','BrandController@getAdd')->name('get-add-brand');
    Route::post('/brand/add','BrandController@postAdd')->name('post-add-brand');
    Route::get('/brand/edit/{brand_id}','BrandController@getEdit')->name('get-edit-brand');
    Route::post('/brand/edit','BrandController@postEdit')->name('post-edit-brand');
    Route::get('/brand/detail/{brand_id}','BrandController@getDetail')->name('get-detail-brand');
    Route::get('/brand/delete/{brand_id}','BrandController@getDelete')->name('get-delete-brand');
    Route::get('/brand/active/{brand_id}','BrandController@active')->name('active-brand');
    Route::get('/brand/unactive/{brand_id}','BrandController@unactive')->name('unactive-brand');
    Route::post('/brand/process-all','BrandController@process_all')->name('process-all-brand');
    Route::post('/brand/import','BrandController@postImport')->name('import-brand');
    Route::get('/brand/export','BrandController@getExport')->name('export-brand');
    Route::get('/brand/viewproduct/{id_brand}','BrandController@viewProduct')->name('view-product-brand');


    //Product
    Route::get('/product/search','ProductController@getSearch')->name('get-search-product');
    Route::POST('/product/list','ProductController@postList')->name('post-list-product');
    Route::get('/product/list','ProductController@getList')->name('get-list-product');
    Route::get('/product/add','ProductController@getAdd')->name('get-add-product');
    Route::post('/product/add','ProductController@postAdd')->name('post-add-product');
    Route::get('/product/edit/{product_id}','ProductController@getEdit')->name('get-edit-product');
    Route::post('/product/edit','ProductController@postEdit')->name('post-edit-product');
    Route::get('/product/detail/{product_id}','ProductController@getDetail')->name('get-detail-product');
    Route::get('/product/delete/{product_id}','ProductController@getDelete')->name('get-delete-product');
    Route::get('/product/active/{product_id}','ProductController@active')->name('active-product');
    Route::get('/product/unactive/{product_id}','ProductController@unactive')->name('unactive-product');
    Route::post('/product/process-all','ProductController@process_all')->name('process-all-product');

    //Supplier
    Route::get('/supplier/list','SupplierController@getList')->name('get-list-supplier');
    Route::get('/supplier/search','SupplierController@getSearch')->name('get-search-supplier');
    Route::POST('/supplier/list','SupplierController@postList')->name('post-list-supplier');
    Route::get('/supplier/add','SupplierController@getAdd')->name('get-add-supplier');
    Route::get('/supplier/detail/{id}','SupplierController@getDetail')->name('get-detail-supplier');
    Route::get('/supplier/edit/{id}','SupplierController@getEdit')->name('get-edit-supplier');
    Route::post('/supplier/edit','SupplierController@postEdit')->name('post-edit-supplier');
    Route::post('/supplier/add','SupplierController@postAdd')->name('post-add-supplier');
    Route::get('/supplier/delete/{id}','SupplierController@getDelete')->name('get-delete-supplier');
    Route::get('/supplier/active/{id}','SupplierController@active')->name('active-supplier');
    Route::get('/supplier/unactive/{id}','SupplierController@unactive')->name('unactive-supplier');
    Route::post('/supplier/process-all','SupplierController@process_all')->name('process-all-supplier');

    //Depot
    Route::POST('/depot/list','DepotController@postList')->name('post-list-depot');
    Route::get('/depot/list','DepotController@getList')->name('get-list-depot');
    Route::get('/depot/search','DepotController@getSearch')->name('get-search-depot');
    Route::get('/depot/import','DepotController@getImportSupplier')->name('get-bill-import-depot');
    Route::post('/depot/import','DepotController@postAddBillImport')->name('post-bill-import-depot');
    Route::post('/depot/import-detail','DepotController@postAddDetailBillImport')->name('post-detail-bill-import-depot');
    Route::get('/depot/payment/{id}','DepotController@payment')->name('payment-depot');
    Route::get('/depot/cancel/{id}','DepotController@cancel')->name('cancel-depot');
    Route::get('/depot/list-bill','DepotController@getListBill')->name('get-list-bill-depot');
    Route::get('/depot/detail/{id}','DepotController@getDetailBill')->name('get-detail-bill-depot');

    //User
    Route::get('/detail/{user_id}','UserController@getDetail')->name('get-detail-admin');
    Route::post('/user/add','UserController@postAdd')->name('post-add-admin');
    Route::get('/user/add','UserController@getAdd')->name('get-add-admin');
    Route::get('/user/list','UserController@getList')->name('get-list-admin');
    Route::get('/user/search','UserController@getSearch')->name('get-search-admin');
    Route::POST('/user/list','UserController@postList')->name('post-list-admin');
    Route::get('/edit-password/{user_id}','UserController@getEditPass')->name('get-edit-password-admin');
    Route::post('/user/edit-password','UserController@postEditPass')->name('post-edit-password-admin');
    Route::post('/user/edit','UserController@postEdit')->name('post-edit-admin');
    Route::get('/user/edit/{user_id}','UserController@getEdit')->name('get-edit-admin');
    Route::get('/admin/delete/{user_id}','UserController@getDelete')->name('get-delete-admin');
    Route::get('/admin/active/{id}','UserController@active')->name('active-admin');
    Route::get('/admin/unactive/{id}','UserController@unactive')->name('unactive-admin');
    Route::post('/admin/process-all','UserController@process_all')->name('process-all-admin');

    //customer
    Route::get('/customer/list','CustomerController@getList')->name('get-list-customer');
    Route::get('/customer/search','CustomerController@getSearch')->name('get-search-customer');
    Route::POST('/customer/list','CustomerController@postList')->name('post-list-customer');
    Route::get('/customer/detail/{id}','CustomerController@getDetail')->name('admin-get-detail-customer');
    Route::get('/customer/delete/{id}','CustomerController@getDelete')->name('get-delete-customer');
    Route::get('/customer/active/{id}','CustomerController@active')->name('active-customer');
    Route::get('/customer/unactive/{id}','CustomerController@unactive')->name('unactive-customer');
    Route::post('/customer/process-all','CustomerController@process_all')->name('process-all-customer');

    //voucher
    Route::get('/voucher/search','VoucherController@getSearch')->name('get-search-voucher');
    Route::POST('/voucher/list','VoucherController@postList')->name('post-list-voucher');
    Route::get('/voucher/list','VoucherController@getList')->name('get-list-voucher');
    Route::get('/voucher/add','VoucherController@getAdd')->name('get-add-voucher');
    Route::post('/voucher/add','VoucherController@postAdd')->name('post-add-voucher');
    Route::get('/voucher/edit/{id}','VoucherController@getEdit')->name('get-edit-voucher');
    Route::post('/voucher/edit','VoucherController@postEdit')->name('post-edit-voucher');
    Route::get('/voucher/detail/{id}','VoucherController@getDetail')->name('get-detail-voucher');
    Route::get('/voucher/delete/{id}','VoucherController@getDelete')->name('get-delete-voucher');
    Route::get('/voucher/active/{id}','VoucherController@active')->name('active-voucher');
    Route::get('/voucher/unactive/{id}','VoucherController@unactive')->name('unactive-voucher');
    Route::post('/voucher/process-all','VoucherController@process_all')->name('process-all-voucher');

    //Bill
    Route::get('/bill/list','BillController@getList')->name('get-list-bill');
    Route::POST('/bill/list','BillController@postList')->name('post-list-bill');
    Route::get('/bill/listCancle','BillController@getListCancle')->name('get-list-billCancle');
    Route::POST('/bill/listCancle','BillController@postListCancle')->name('post-list-billCancle');
    Route::get('/bill/listConfirm','BillController@getListConfirm')->name('get-list-billConfirm');
    Route::POST('/bill/listConfirm','BillController@postListConfirm')->name('post-list-billConfirm');
    Route::get('/bill/listNotConfirm','BillController@getListNotConfirm')->name('get-list-billNotConfirm');
    Route::POST('/bill/listNotConfirm','BillController@postListNotConfirm')->name('post-list-billNotConfirm');
    Route::get('/bill/listSuccess','BillController@getListSuccess')->name('get-list-billSuccess');
    Route::POST('/bill/listSuccess','BillController@postListSuccess')->name('post-list-billSuccess');
    Route::get('/bill/detail/{id}','BillController@getDetail')->name('get-detail-bill');
    Route::get('/bill/cancle/{id}','BillController@cancle')->name('cancle-bill');
    Route::get('/bill/confirm/{id}','BillController@confirm')->name('confirm-bill');
    Route::get('/bill/success/{id}','BillController@success')->name('success-bill');
    
});
// </Admin>


// <Client>
Route::group(['namespace' => 'client'], function () {
    //Login
    Route::post('/login','LoginController@postLogin')->name('post-client-login');
    Route::get('/logout','LoginController@getLogout')->name('get-client-logout');

    //HomeController
    Route::get('/','HomeController@getHome')->name('get-client-home');
    Route::get('/home','HomeController@getHome')->name('get-client-home');
    Route::get('/about','HomeController@getAbout')->name('get-client-about');
    Route::get('/contact','HomeController@getContact')->name('get-client-contact');
    Route::get('/account','HomeController@getAccount')->name('get-client-account');
    

    //Product
    Route::get('/product','ProductController@getProduct')->name('get-client-product');
    Route::get('/product/category/{id}','ProductController@getProductByCategory')->name('get-client-productByCategory');
    Route::get('/product/brand/{id}','ProductController@getProductByBrand')->name('get-client-productByBrand');
    Route::get('/product/detail/{id}','ProductController@getDetail')->name('get-client-productDetail');
    Route::get('/product/search','ProductController@getSearch')->name('get-client-productSearch');
    
    //Customer
    Route::post('/customer/add','CustomerController@postAdd')->name('post-add-customer');

    


});

Route::group(['middleware' => 'CheckClientLogin','namespace' => 'client'], function () {
    //test thanh toán
    Route::post('/cart','CartController@postCart')->name('test');
    Route::get('/cart/{id}','CartController@getCart')->name('getCart');
    Route::post('/cart/update','CartController@updateQuantity')->name('updateQuantity');
    Route::post('/cart/update_voucher','CartController@updateVoucher')->name('updateVoucher');
    Route::post('/cart/checkout','CartController@checkOut')->name('checkout');
});

// </Client>