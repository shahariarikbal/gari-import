<?php

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

//Route::get('/', function () {
//    return view('fontend.home.index');
//});

use App\CmsPage;
use App\GenarelSetting;


Auth::routes(['register' => false]);

Route::get('/add-pages', 'HomeController@index')->name('home');


Route::get('/', 'Web\WebController@index');
Route::get('/about-us', 'Web\WebController@about');
Route::get('/terms-condition', 'Web\WebController@termsCondition');
Route::get('/import-regulations', 'Web\WebController@importRegulations');
Route::get('/shipping-info', 'Web\WebController@shippingInfo');
Route::get('/stock-list', 'Web\WebController@stockList');


Route::get('/our-banks', 'Web\WebController@ourBanks');

// stock
Route::get('/vehicles/{make}-{model}/{stocks_id}', 'Web\WebController@stockDetails');
Route::get('/inquiry-data-show/{stock}', 'Web\WebController@stockDetailsShow');
Route::post('/stock-inquiry', 'Web\WebController@stockInquiry');
Route::get('/vehicles-image-download/{stocks_id}', 'Web\WebController@imageDownload');

Route::get('/vehicle-from-stock', 'Web\WebController@vehicle');
Route::get('/vehicle-from-auction', 'Web\WebController@auction');
Route::get('/auction-sheet-guide', 'Web\WebController@auctionSheetGuide');

Route::get('/how-to-buy', 'Web\WebController@howtobuy');
Route::get('/news', 'Web\WebController@newsIndex');
Route::get('/news-details/{news}', 'Web\WebController@newsDetails');
Route::get('/faqs', 'Web\WebController@faqs');
Route::get('/contact', 'Web\WebController@contact');
Route::get('/online-payment', 'Web\WebController@payment');
Route::post('/query-send', 'Web\WebController@contactQuery');
Route::get('/verify-auction-sheet', 'Web\WebController@verifyAuctionSheet')->name('web.verifyAuctionSheet');
Route::get('/verify-auction-sheet/chassis-check', 'Web\WebController@chassisCheck')->name('web.chassis-check');
Route::get('/verify-auction-sheet/report', 'Web\WebController@chassisCheckReport')->name('web.chassisCheckReport');
Route::get('/report/{url_id}', 'Web\WebController@chassisReport')->name('web.chassisReport');
Route::get('/report/pdfview/{url_id}', 'Web\WebController@reportPdfview')->name('web.pdfview');

Route::get('/payment-success', 'Web\WebController@paymentSuccess');
Route::get('/payment-error', 'Web\WebController@paymentError');

Route::get('/search', 'Web\WebController@search')->name('search');



// Admin panel
Route::group(['middleware' => 'auth'],
    function () {
        Route::get('/general-settings', 'Admin\SettingController@index');
        Route::get('/edit-general-settings/{general}', 'Admin\SettingController@edit');
        Route::post('/update-general-settings/{general}', 'Admin\SettingController@update');

// About us page
        Route::get('/admin-about-us', 'Admin\SettingController@aboutUs');
        Route::post('/about-us-store', 'Admin\SettingController@aboutUsStor');
        Route::get('/admin/contact/{contact}', 'Admin\ContactController@contact');
        Route::post('/contact-info-update/{contact}', 'Admin\ContactController@contactUpdate');
        Route::get('/admin/contact-query', 'Admin\ContactController@showContactQuery');
        Route::get('/admin/quiry-data-view/{id}', 'Admin\ContactController@showContactQueryDetails');
        Route::post('/admin/delete-query', 'Admin\ContactController@deleteQuery');

// Terms and Conditions
        Route::get('/admin/terms-condition', 'Admin\SettingController@termsConditionForm');
        Route::post('/store/terms-condition', 'Admin\SettingController@termsConditionDataStore');


        Route::get('/add-pages', 'Admin\CmsController@index');
        Route::get('/new-page-create', 'Admin\CmsController@newPage');
        Route::post('/store-new-page', 'Admin\CmsController@pageStore');
        Route::get('/page-edit/{cmspage}', 'Admin\CmsController@pageEdit');
        Route::get('/page-inactive/{cmspage}', 'Admin\CmsController@pageInactive');
        Route::get('/page-active/{cmspage}', 'Admin\CmsController@pageActive');
        Route::post('/page-delete/{cmspage}', 'Admin\CmsController@pageDelete');
        Route::post('/cms-page-settings', 'Admin\CmsController@cmsPageSetting');
        Route::post('/store-shipping-info', 'Admin\CmsController@shippingInfo');

        Route::get('/admin/news-list', 'Admin\CmsController@showNewsForm');
        Route::get('/admin/create-news', 'Admin\CmsController@newsFormShow');
        Route::post('/store-news', 'Admin\CmsController@newsStore');
        Route::get('/news-edit/{news}', 'Admin\CmsController@newsEdit');
        Route::post('/update-news/{news}', 'Admin\CmsController@newsUpdate');
        Route::get('/news-published/{news}', 'Admin\CmsController@newspublished');
        Route::get('/news-unpublished/{news}', 'Admin\CmsController@newsUnpublished');
        Route::post('/news-delete', 'Admin\CmsController@newsDelete');
        Route::post('ckeditor/upload', 'Admin\CmsController@upload')->name('ckeditor.upload');

// FAQ
        Route::get('/admin/faq-list', 'Admin\CmsController@faqList');
        Route::get('/admin/create-faq', 'Admin\CmsController@faqCreate');
        Route::post('/store-faq', 'Admin\CmsController@faqStore');
        Route::get('/faq-edit/{faq}', 'Admin\CmsController@faqEdit');
        Route::post('/update-faq/{faq}', 'Admin\CmsController@faqUpdate');
        Route::get('/faq-published/{faq}', 'Admin\CmsController@faqPublished');
        Route::get('/faq-unpublished/{faq}', 'Admin\CmsController@faqUnpublished');
        Route::post('/faq-delete', 'Admin\CmsController@faqDelete');

//StockController
        Route::get('/admin/stock-list', 'StockController@index');
        Route::get('/add-new', 'StockController@create');
        Route::post('/store-stock-list', 'StockController@store');
        Route::get('/stock-list/edit/{id}', 'StockController@edit');
        Route::post('/stock-list/update/{id}', 'StockController@update');
        Route::post('/delete-stock-list', 'StockController@stockDelete');
        Route::get('/stock-inquiry', 'StockController@showStockListInquiry');
        Route::get('/inquiry-data-view/{id}', 'StockController@showInquiry');
        Route::post('/inquiry/delete', 'StockController@inquiryDelete');

        Route::get('/stock/image/delete/{id}', 'StockController@imageDelete');

        Route::post('/store-seo-info', 'Admin\CmsController@seoStore');
        Route::post('/store-import-regulation', 'Admin\CmsController@importRegulationStore');


        Route::get('/admin/bank-list', 'Admin\BankController@list');
        Route::get('/add-new-bank', 'Admin\BankController@bankCreateShowForm');
        Route::get('/bank-info-edit/{bank}', 'Admin\BankController@bankEditForm');
        Route::post('/update-bank-list/{bank}', 'Admin\BankController@bankUpdateForm');
        Route::post('/delete-bank-list', 'Admin\BankController@bankDelete');
        Route::get('/bank-info-active/{bank}', 'Admin\BankController@bankActive');
        Route::get('/bank-info-inactive/{bank}', 'Admin\BankController@bankInactive');
        Route::post('/store-bank-list', 'Admin\BankController@store');
//Online payments

        Route::get('/show-online-payments', 'Admin\BankController@onlinePayments');
        Route::post('/online-payment/delete', 'Admin\BankController@onlinePaymentDelete');

        Route::get('/admin/vehicle-list', 'Admin\VehicleController@list');
        Route::get('/add-new-vehicle', 'Admin\VehicleController@create');
        Route::post('/store-vehicle-list', 'Admin\VehicleController@store');
        Route::post('/update-vehicle-list/{vehicle}', 'Admin\VehicleController@update');
        Route::get('/how-to-buy-edit/{vehicle}', 'Admin\VehicleController@edit');
        Route::get('/how-to-buy-delete/{vehicle}', 'Admin\VehicleController@trash');
        Route::post('/vehicle/sortable', 'Admin\VehicleController@vehicleSortable');

        Route::get('/slider/delete/{img}', 'Admin\CmsController@sliderDelete');
        Route::get('/brand/delete/{img}', 'Admin\CmsController@brandLogoDelete');
    });




// SSLCOMMERZ Start

Route::post('/pay', 'SslCommerzPaymentController@index');

Route::post('/success', 'SslCommerzPaymentController@success');
Route::post('/fail', 'SslCommerzPaymentController@fail');
Route::post('/cancel', 'SslCommerzPaymentController@cancel');

Route::post('/ipn', 'SslCommerzPaymentController@ipn');
//SSLCOMMERZ END


Route::get('order', function () {
    $seoSettings = CmsPage::where('id', 4)->first();
    $settings = GenarelSetting::first();
    return view('fontend.order.order', compact('seoSettings', 'settings'));
});

