<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;


// Route::get("/optimize", function () {
//     Artisan::call("optimize");
//     Artisan::call("cache:clear");
//     Artisan::call("route:cache");
//     Artisan::call("config:cache");
// });

// Route::get('/fresh-db', function () {
//     try {
//         Artisan::call("migrate:fresh --seed");
//         $message = "Database migrated successfully";
//     } catch (Exception $exception) {
//         $message = $exception->getMessage();
//     }

//     return $message;
// });

Route::namespace('App\Http\Controllers\Backend')->prefix('admin')->group(function () {
    // Authentication routes
    Route::match(['get', 'post'], '/login', 'AuthController@login')->name('login');
    Route::get('logout', 'AuthController@logout')->name('logout');

    // Apply 'auth' middleware to all routes in this group
    Route::middleware(['auth'])->group(function () {
        Route::get('/', 'DashboardController@index');
        // profile
        Route::prefix('profile')
            ->name('admin.')
            ->group(function () {
                Route::get('/', 'UserController@profile')->name('profile');
                Route::post('update-profile/', 'UserController@updateProfile')->name('update-profile');
                Route::post('change-password/', 'UserController@changePassword')->name('change-password');
            });

        // Dashboard
        Route::prefix('dashboard')
            ->name('admin.dashboard.')
            ->group(function () {
                Route::get('/', 'DashboardController@index')->name('dashboard');
                Route::get("/stats", 'DashboardController@getStats')->name('stats');
            });

        // Customer Inquiry
        Route::prefix('customer-inquiries')
            ->name('admin.customer-inquiries.')
            ->group(function () {
                Route::get('/', 'CustomerInquiryController@index')->name('list');
                Route::post('/store', 'CustomerInquiryController@store')->name('store');
                Route::delete('/{id}', 'CustomerInquiryController@destroy')->name('delete');
            });

        // Services
        Route::prefix('services')
            ->name('admin.services.')
            ->group(function () {
                Route::get('/', 'ServiceController@index')->name('list');
                Route::get('/modal/{id?}', 'ServiceController@modal')->name('modal');
                Route::post('/store', 'ServiceController@store')->name('store');
                Route::delete('{id}', 'ServiceController@destroy')->name('delete');
                Route::get('/image-modal/{id}', 'ServiceController@imageModal')->name('image-modal');
                Route::post('upload-image', 'ServiceController@uploadImage')->name('upload-image');
                Route::delete('delete-image/{id}', 'ServiceController@deleteImage')->name('delete-image');
                Route::post('/update-status', 'ServiceController@updateStatus')->name('update-status');
            });

        // Products
        Route::prefix('products')
            ->name('admin.products.')
            ->group(function () {
                Route::get('/', 'ProductController@index')->name('list');
                Route::get('/modal/{id?}', 'ProductController@modal')->name('modal');
                Route::post('/store', 'ProductController@store')->name('store');
                Route::delete('{id}', 'ProductController@destroy')->name('delete');
                Route::get('/image-modal/{id}', 'ProductController@imageModal')->name('image-modal');
                Route::post('upload-image', 'ProductController@uploadImage')->name('upload-image');
                Route::delete('delete-image/{id}', 'ProductController@deleteImage')->name('delete-image');
                Route::post('/update-status', 'ProductController@updateStatus')->name('update-status');
            });

        // Sliders
        Route::prefix('sliders')
            ->name('admin.sliders.')
            ->group(function () {
                Route::get('/', 'SliderController@index')->name('list');
                Route::get('/modal/{id?}', 'SliderController@modal')->name('modal');
                Route::post('/store', 'SliderController@store')->name('store');
                Route::delete('{id}', 'SliderController@destroy')->name('delete');
                Route::post('/update-status', 'SliderController@updateStatus')->name('update-status');
            });

        // Settings
        Route::prefix('settings')
            ->name('admin.settings.')
            ->group(function () {
                Route::get('/', 'SettingController@index')->name('list');
                Route::post('/store', 'SettingController@store')->name('store');
            });

        // Testimonials
        Route::prefix('testimonials')
            ->name('admin.testimonials.')
            ->group(function () {
                Route::get('/', 'TestimonialController@index')->name('list');
                Route::get('/modal/{id?}', 'TestimonialController@modal')->name('modal');
                Route::post('/store', 'TestimonialController@store')->name('store');
                Route::delete('{id}', 'TestimonialController@destroy')->name('delete');
            });

        // Testimonials
        Route::prefix('pages')
            ->name('admin.pages.')
            ->group(function () {
                Route::get(
                    '/',
                    'PageController@index'
                )->name('list');
                Route::get('/modal/{id?}', 'PageController@modal')->name('modal');
                Route::post('/store', 'PageController@store')->name('store');
                Route::delete('{id}', 'PageController@destroy')->name('delete');
                Route::post('/update-status', 'PageController@updateStatus')->name('update-status');
            });

        // Our Team
        Route::prefix('our-team')
            ->name('admin.our-team.')
            ->group(function () {
                Route::get('/', 'OurTeamController@index')->name('list');
                Route::get('/modal/{id?}', 'OurTeamController@modal')->name('modal');
                Route::post('/store', 'OurTeamController@store')->name('store');
                Route::delete('{id}', 'OurTeamController@destroy')->name('delete');
                Route::post('/update-status', 'OurTeamController@updateStatus')->name('update-status');
            });

        // Appointment
        Route::prefix('appointment')
            ->name('admin.appointment.')
            ->group(function () {
                Route::get('/', 'AppointmentController@index')->name('list');
                Route::delete('{id}', 'AppointmentController@destroy')->name('delete');
                Route::post('/update-status', 'AppointmentController@updateStatus')->name('update-status');
            });

        // Breadcrumb
        Route::prefix('breadcrumbs')
        ->name('admin.breadcrumbs.')
        ->group(function () {
            Route::get('/', 'BreadCrumbController@index')->name('list');
            Route::get('/modal/{id?}', 'BreadCrumbController@modal')->name('modal');
            Route::post('/store', 'BreadCrumbController@store')->name('store');
        });
    });
});


# FRONT SITE ROUTES
Route::namespace('App\Http\Controllers\Frontend')->group(function () {
    Route::get('/', 'SiteController@index')->name('index');
    Route::get('about', 'SiteController@about')->name('about');
    Route::get('services', 'SiteController@services')->name('services');
    Route::get('service-details/{slug}', 'SiteController@serviceDetails')->name('service-details');
    Route::get('products/{service?}', 'SiteController@products')->name('products');
    Route::get('product-detail/{id}', 'SiteController@productDetail')->name('product-detail');
    Route::get('contact-us', 'SiteController@contactUs')->name('contact-us');
    Route::post('store-customer-inquiry', 'SiteController@storeCustomerInquiry')->name('store-customer-inquiry');
    Route::get('appointment', 'SiteController@appointment')->name('appointment');
    Route::post('store-appointment', 'SiteController@storeAppointment')->name('store-appointment');
    Route::get('language/{locale}', 'SiteController@changeLocale')->name('language');
});
