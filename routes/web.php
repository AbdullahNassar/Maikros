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

Route::get('/lang/{locale}', ['as' => 'site.lang', 'uses' => 'LangController@postIndex']);
Route::get('/markAsRead', function(){
    Auth::guard('admins')->user()->unreadNotifications->markAsRead();
    return redirect()->back();
})->name('markAsRead');
Route::get('/error', ['as' => 'site.error', 'uses' => 'Controller@error']);

Route::group(['namespace' => 'Site'], function () {
    //Login & Register
    Route::get('/register', ['as' => 'site.register', 'uses' => 'Auth\AuthController@getRegister']);
    Route::post('/postRegister', ['as' => 'site.postRegister', 'uses' => 'Auth\AuthController@postRegister']);
    Route::get('/forget', ['as' => 'site.forget', 'uses' => 'Auth\AuthController@forget']);
    Route::post('/change', ['as' => 'site.change', 'uses' => 'Auth\AuthController@change']);
    Route::get('/getlogin', ['as' => 'site.login', 'uses' => 'Auth\AuthController@getLogin']);
    Route::get('/companylogin', ['as' => 'site.companylogin', 'uses' => 'Auth\AuthController@companylogin']);
    Route::get('/companyregister', ['as' => 'site.companyregister', 'uses' => 'Auth\AuthController@companyregister']);
    Route::post('/postlogin', ['as' => 'site.postlogin', 'uses' => 'Auth\AuthController@postLogin']);
    Route::get('/logout', ['as' => 'site.logout', 'uses' => 'Auth\AuthController@logout']);
    Route::get('/phone', ['as' => 'member.phone', 'uses' => 'Auth\AuthController@phone']);
    Route::Post('/verify', ['as' => 'phone.verify', 'uses' => 'Auth\AuthController@verify']);
    Route::get('/error', ['as' => 'site.error', 'uses' => 'Auth\AuthController@error']);
    Route::post('/guestlogin', ['as' => 'site.guestlogin', 'uses' => 'Auth\AuthController@guestlogin']);
    Route::post('/guestRegister', ['as' => 'site.guestRegister', 'uses' => 'Auth\AuthController@guestRegister']);
    
    //Home
    Route::get('/', ['as' => 'site.home', 'uses' => 'HomeController@getIndex']);

    //Profiles
    Route::get('/profile', ['as' => 'site.profile', 'uses' => 'ProfilesController@profile']);
    Route::get('/dashboard', ['as' => 'site.dashboard', 'uses' => 'ProfilesController@dashboard']);
    Route::get('/booking', ['as' => 'site.booking', 'uses' => 'ProfilesController@booking']);
    Route::get('/multiProfile', ['as' => 'site.multiProfile', 'uses' => 'ProfilesController@multiProfile']);
    Route::post('/editProfile', ['as' => 'site.editProfile', 'uses' => 'ProfilesController@editProfile']);
    Route::post('/hotelApprove', ['as' => 'site.hotelApprove', 'uses' => 'ProfilesController@hotelApprove']);
    Route::post('/programApprove', ['as' => 'site.programApprove', 'uses' => 'ProfilesController@programApprove']);
    Route::post('/serviceApprove', ['as' => 'site.serviceApprove', 'uses' => 'ProfilesController@serviceApprove']);
    Route::post('/flightApprove', ['as' => 'site.flightApprove', 'uses' => 'ProfilesController@flightApprove']);
    //Hotel
    Route::get('/hotelProfile', ['as' => 'site.hotelProfile', 'uses' => 'ProfilesController@hotelProfile']);
    Route::get('/addHotel', ['as' => 'site.addHotel', 'uses' => 'ProfilesController@addHotel']);
    Route::post('/addHotel', ['as' => 'site.addHotel', 'uses' => 'ProfilesController@postHotel']);
    Route::get('/editHotel/{id}', ['as' => 'site.editHotel', 'uses' => 'ProfilesController@editHotel']);
    Route::post('/editHotelData', ['as' => 'site.editHotelData', 'uses' => 'ProfilesController@postEditHotel']);
    Route::get('/deleteRoom/{id}', ['as' => 'site.deleteRoom', 'uses' => 'ProfilesController@deleteRoom']);
    Route::get('/deleteFeature/{id}', ['as' => 'site.deleteFeature', 'uses' => 'ProfilesController@deleteFeature']);
    Route::get('/deleteFacility/{id}', ['as' => 'site.deleteFacility', 'uses' => 'ProfilesController@deleteFacility']);
    Route::get('/deleteImages/{id}', ['as' => 'site.deleteImages', 'uses' => 'ProfilesController@deleteImages']);
    Route::post('/addImages/{id}', ['as' => 'site.addImages', 'uses' => 'ProfilesController@addImages']);
    Route::get('/addHotelRooms', ['as' => 'site.addHotelRooms', 'uses' => 'ProfilesController@addHotelRooms']);
    Route::post('/postHotelRooms', ['as' => 'site.postHotelRooms', 'uses' => 'ProfilesController@postHotelRooms']);
    Route::get('/addHotelFeatures', ['as' => 'site.addHotelFeatures', 'uses' => 'ProfilesController@addHotelFeatures']);
    Route::post('/postHotelFeatures', ['as' => 'site.postHotelFeatures', 'uses' => 'ProfilesController@postHotelFeatures']);
    Route::get('/addHotelFacilities', ['as' => 'site.addHotelFacilities', 'uses' => 'ProfilesController@addHotelFacilities']);
    Route::post('/postHotelFacilities', ['as' => 'site.postHotelFacilities', 'uses' => 'ProfilesController@postHotelFacilities']);
    Route::get('/addHotelGallery', ['as' => 'site.addHotelGallery', 'uses' => 'ProfilesController@addHotelGallery']);
    Route::get('/hotelGallery', ['as' => 'site.hotelGallery', 'uses' => 'ProfilesController@hotelGallery']);
    Route::post('/postHotelGallery', ['as' => 'site.postHotelGallery', 'uses' => 'ProfilesController@postHotelGallery']);
    //Program
    Route::get('/tourProfile', ['as' => 'site.tourProfile', 'uses' => 'ProfilesController@tourProfile']);
    Route::get('/addProgram', ['as' => 'site.addProgram', 'uses' => 'ProfilesController@addProgram']);
    Route::post('/addProgram', ['as' => 'site.addProgram', 'uses' => 'ProfilesController@postProgram']);
    Route::get('/editProgram/{id}', ['as' => 'site.editProgram', 'uses' => 'ProfilesController@editProgram']);
    Route::post('/editProgramData', ['as' => 'site.editProgramData', 'uses' => 'ProfilesController@postEditProgram']);
    //Service
    Route::get('/companyProfile', ['as' => 'site.companyProfile', 'uses' => 'ProfilesController@companyProfile']);
    Route::get('/addService', ['as' => 'site.addService', 'uses' => 'ProfilesController@addService']);
    Route::post('/addService', ['as' => 'site.addService', 'uses' => 'ProfilesController@postService']);
    Route::get('/editService/{id}', ['as' => 'site.editService', 'uses' => 'ProfilesController@editService']);
    Route::post('/editServiceData', ['as' => 'site.editServiceData', 'uses' => 'ProfilesController@postEditService']);
    Route::get('/deleteServiceFeature/{id}', ['as' => 'site.deleteServiceFeature', 'uses' => 'ProfilesController@deleteServiceFeature']);
    Route::get('/deleteServiceImages/{id}', ['as' => 'site.deleteServiceImages', 'uses' => 'ProfilesController@deleteServiceImages']);
    Route::post('/addServiceImages/{id}', ['as' => 'site.addServiceImages', 'uses' => 'ProfilesController@addServiceImages']);
    Route::get('/addServiceFeatures', ['as' => 'site.addServiceFeatures', 'uses' => 'ProfilesController@addServiceFeatures']);
    Route::post('/postServiceFeatures', ['as' => 'site.postServiceFeatures', 'uses' => 'ProfilesController@postServiceFeatures']);
    Route::get('/serviceGallery', ['as' => 'site.serviceGallery', 'uses' => 'ProfilesController@serviceGallery']);
    Route::post('/postServiceGallery', ['as' => 'site.postServiceGallery', 'uses' => 'ProfilesController@postServiceGallery']);
    //Flight
    Route::get('/addFlight', ['as' => 'site.addFlight', 'uses' => 'ProfilesController@addFlight']);
    Route::post('/addFlight', ['as' => 'site.addFlight', 'uses' => 'ProfilesController@postFlight']);
    Route::get('/editFlight/{id}', ['as' => 'site.editFlight', 'uses' => 'ProfilesController@editFlight']);
    Route::post('/editFlightData', ['as' => 'site.editFlightData', 'uses' => 'ProfilesController@postEditFlight']);

    //Pages
    Route::get('/blog', ['as' => 'site.blog', 'uses' => 'HomeController@blog']);
    Route::get('/about', ['as' => 'site.about', 'uses' => 'HomeController@about']);
    Route::get('/contact', ['as' => 'site.contact', 'uses' => 'HomeController@contact']);
    Route::post('/claim', ['as' => 'site.claim', 'uses' => 'HomeController@claim']);
    Route::post('/subscribe', ['as' => 'site.subscribe', 'uses' => 'HomeController@subscribe']);
    Route::get('/faq', ['as' => 'site.faq', 'uses' => 'HomeController@faq']);
    Route::get('/privacy', ['as' => 'site.privacy', 'uses' => 'HomeController@privacy']);
    Route::get('/terms', ['as' => 'site.terms', 'uses' => 'HomeController@terms']);
    Route::get('/privacy', ['as' => 'site.privacy', 'uses' => 'HomeController@privacy']);
    Route::get('/hotels', ['as' => 'site.hotels', 'uses' => 'HomeController@hotels']);
    Route::get('/hotel/{id}', ['as' => 'site.hotel', 'uses' => 'HomeController@hotel']);
    Route::get('/umratak', ['as' => 'site.umratak', 'uses' => 'HomeController@umratak']);
    Route::get('/programmes', ['as' => 'site.programmes', 'uses' => 'HomeController@programmes']);
    Route::get('/program/{id}', ['as' => 'site.program', 'uses' => 'HomeController@program']);
    Route::get('/flights', ['as' => 'site.flights', 'uses' => 'HomeController@flights']);
    Route::get('/flight/{id}', ['as' => 'site.flight', 'uses' => 'HomeController@flight']);
    Route::get('/services', ['as' => 'site.services', 'uses' => 'HomeController@services']);
    Route::get('/service/{id}', ['as' => 'site.service', 'uses' => 'HomeController@service']);
    Route::get('/offices', ['as' => 'site.offices', 'uses' => 'HomeController@offices']);
    Route::get('/post/{id}', ['as' => 'site.post', 'uses' => 'HomeController@getPost']);
    Route::get('/cat/{id}', ['as' => 'site.cat', 'uses' => 'HomeController@getCat']);
    Route::get('/arsearch', ['as' => 'site.arsearch', 'uses' => 'HomeController@arsearch']);
    Route::get('/ensearch', ['as' => 'site.ensearch', 'uses' => 'HomeController@ensearch']);

    //Cart
    Route::get('/cart', ['as' => 'site.cart', 'uses' => 'CartController@index']);
    Route::post('/addCart', ['as' => 'site.addCart', 'uses' => 'CartController@addCart']);
    Route::get('/removeCart/{id}', ['as' => 'site.removeCart', 'uses' => 'CartController@removeCart']);
    Route::post('/addServiceCart', ['as' => 'site.addServiceCart', 'uses' => 'CartController@addCartService']);
    Route::post('/payfort', ['as' => 'site.payfort', 'uses' => 'CartController@payfort']);

    //Search
    Route::get('/hotelSearch', ['as' => 'site.hotelSearch', 'uses' => 'SearchController@hotelSearch']);
    Route::get('/mekkahSearch', ['as' => 'site.mekkahSearch', 'uses' => 'SearchController@mekkahSearch']);
    Route::get('/madinahSearch', ['as' => 'site.madinahSearch', 'uses' => 'SearchController@madinahSearch']);
    Route::get('/hotelRooms', ['as' => 'site.hotelRooms', 'uses' => 'SearchController@hotelRooms']);
    Route::get('/serviceSearch', ['as' => 'site.serviceSearch', 'uses' => 'SearchController@serviceSearch']);
    Route::get('/customerData', ['as' => 'site.customerData', 'uses' => 'SearchController@customerData']);
    Route::post('/postGuest', ['as' => 'site.postGuest', 'uses' => 'SearchController@postGuest']);
    Route::get('/guest', ['as' => 'site.guest', 'uses' => 'SearchController@guest']);

    //Booking
    Route::post('/hotelBooking', ['as' => 'site.hotelBooking', 'uses' => 'BookingController@hotelBooking']);
    Route::post('/programBooking', ['as' => 'site.programBooking', 'uses' => 'BookingController@programBooking']);
    Route::post('/flightBooking', ['as' => 'site.flightBooking', 'uses' => 'BookingController@flightBooking']);
    Route::post('/serviceBooking', ['as' => 'site.serviceBooking', 'uses' => 'BookingController@serviceBooking']);

    //Filters
    Route::get('/hotelFilter', ['as' => 'site.hotelFilter', 'uses' => 'SearchController@hotelFilter']);
    Route::get('/programFilter', ['as' => 'site.programFilter', 'uses' => 'SearchController@programFilter']);
    Route::get('/flightFilter', ['as' => 'site.flightFilter', 'uses' => 'SearchController@flightFilter']);
    Route::get('/serviceFilter', ['as' => 'site.serviceFilter', 'uses' => 'SearchController@serviceFilter']);

});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function () {
        Route::get('/', 'AuthController@getIndex');
        Route::get('/login', 'AuthController@getIndex');
        Route::post('/login', 'AuthController@postLogin')->name('admin.login');
        Route::get('/logout', 'AuthController@getLogout')->name('admin.logout');
    });

    Route::group(['middleware' => 'auth.admin'], function () {
        Route::get('/', ['as' => 'admin.home', 'uses' => 'HomeController@getIndex']);

        Route::group(['prefix' => 'hotels'], function () {
            Route::get('/', ['as' => 'hotel.get', 'uses' => 'HotelsController@getIndex']);
            Route::get('/getdata', ['as' => 'ajaxdata.getdata', 'uses' => 'HotelsController@getdata']);
            Route::post('/postdata', ['as' => 'ajaxdata.postdata', 'uses' => 'HotelsController@postdata']);
            Route::get('/fetchdata', ['as' => 'ajaxdata.fetchdata', 'uses' => 'HotelsController@fetchdata']);
            Route::get('/removedata', ['as' => 'ajaxdata.removedata', 'uses' => 'HotelsController@removedata']);
            Route::get('/massremove', ['as' => 'ajaxdata.massremove', 'uses' => 'HotelsController@massremove']);
            Route::get('/gallery/{id}', ['as' => 'ajaxdata.gallery', 'uses' => 'HotelsController@gallery']);
            Route::get('/getImages', ['as' => 'ajaxdata.getImages', 'uses' => 'HotelsController@getImages']);
            Route::post('/addImages/{id}', ['as' => 'ajaxdata.addImages', 'uses' => 'HotelsController@addImages']);
            Route::get('/removeImages/{id}', ['as' => 'ajaxdata.removeImages', 'uses' => 'HotelsController@removeImages']);
            Route::get('/hotelplace', ['as' => 'ajaxdata.hotelplace', 'uses' => 'HotelsController@hotelplace']);
            Route::get('/hotelcomfort', ['as' => 'ajaxdata.hotelcomfort', 'uses' => 'HotelsController@hotelcomfort']);
            Route::get('/place', ['as' => 'ajaxdata.place', 'uses' => 'HotelsController@place']);
            Route::get('/comfort', ['as' => 'ajaxdata.comfort', 'uses' => 'HotelsController@comfort']);
        });

        Route::group(['prefix' => 'pendingHotels'], function () {
            Route::get('/', ['as' => 'pendingHotel.get', 'uses' => 'PendingHotelsController@getIndex']);
            Route::get('/getpendingdata', ['as' => 'ajaxdata.getpendingdata', 'uses' => 'PendingHotelsController@getdata']);
            Route::post('/postpendingdata', ['as' => 'ajaxdata.postpendingdata', 'uses' => 'PendingHotelsController@postdata']);
            Route::get('/fetchpendingdata', ['as' => 'ajaxdata.fetchpendingdata', 'uses' => 'PendingHotelsController@fetchdata']);
            Route::get('/removependingdata', ['as' => 'ajaxdata.removependingdata', 'uses' => 'PendingHotelsController@removedata']);
            Route::get('/massremovepending', ['as' => 'ajaxdata.massremovepending', 'uses' => 'PendingHotelsController@massremove']);
            Route::get('/pendingGallery/{id}', ['as' => 'ajaxdata.pendingGallery', 'uses' => 'PendingHotelsController@gallery']);
            Route::get('/getPendingImages', ['as' => 'ajaxdata.getPendingImages', 'uses' => 'PendingHotelsController@getImages']);
            Route::post('/addPendingImages/{id}', ['as' => 'ajaxdata.addPendingImages', 'uses' => 'PendingHotelsController@addImages']);
            Route::get('/removePendingImages/{id}', ['as' => 'ajaxdata.removePendingImages', 'uses' => 'PendingHotelsController@removeImages']);
            Route::get('/pendinghotelplace', ['as' => 'ajaxdata.pendinghotelplace', 'uses' => 'PendingHotelsController@hotelplace']);
            Route::get('/pendingplace', ['as' => 'ajaxdata.pendingplace', 'uses' => 'PendingHotelsController@place']);
        });

        Route::group(['prefix' => 'hotelOrders'], function () {
            Route::get('/', ['as' => 'hotelOrder.get', 'uses' => 'HotelOrdersController@getIndex']);
            Route::get('/gethotelOrderdata', ['as' => 'ajaxdata.gethotelOrderdata', 'uses' => 'HotelOrdersController@getdata']);
            Route::post('/posthotelOrderdata', ['as' => 'ajaxdata.posthotelOrderdata', 'uses' => 'HotelOrdersController@postdata']);
            Route::get('/fetchhotelOrderdata', ['as' => 'ajaxdata.fetchhotelOrderdata', 'uses' => 'HotelOrdersController@fetchdata']);
            Route::get('/removehotelOrderdata', ['as' => 'ajaxdata.removehotelOrderdata', 'uses' => 'HotelOrdersController@removedata']);
            Route::get('/hotelOrdermassremove', ['as' => 'ajaxdata.hotelOrdermassremove', 'uses' => 'HotelOrdersController@massremove']);
            Route::get('/orderhotel', ['as' => 'ajaxdata.orderhotel', 'uses' => 'HotelOrdersController@orderhotel']);
        });

        Route::group(['prefix' => 'programOrders'], function () {
            Route::get('/', ['as' => 'programOrder.get', 'uses' => 'ProgramOrdersController@getIndex']);
            Route::get('/getprogramOrderdata', ['as' => 'ajaxdata.getprogramOrderdata', 'uses' => 'ProgramOrdersController@getdata']);
            Route::post('/postprogramOrderdata', ['as' => 'ajaxdata.postprogramOrderdata', 'uses' => 'ProgramOrdersController@postdata']);
            Route::get('/fetchprogramOrderdata', ['as' => 'ajaxdata.fetchprogramOrderdata', 'uses' => 'ProgramOrdersController@fetchdata']);
            Route::get('/removeprogramOrderdata', ['as' => 'ajaxdata.removeprogramOrderdata', 'uses' => 'ProgramOrdersController@removedata']);
            Route::get('/programOrdermassremove', ['as' => 'ajaxdata.programOrdermassremove', 'uses' => 'ProgramOrdersController@massremove']);
            Route::get('/orderprogram', ['as' => 'ajaxdata.orderprogram', 'uses' => 'ProgramOrdersController@orderprogram']);
        });

        Route::group(['prefix' => 'flightOrders'], function () {
            Route::get('/', ['as' => 'flightOrder.get', 'uses' => 'FlightOrdersController@getIndex']);
            Route::get('/getflightOrderdata', ['as' => 'ajaxdata.getflightOrderdata', 'uses' => 'FlightOrdersController@getdata']);
            Route::post('/postflightOrderdata', ['as' => 'ajaxdata.postflightOrderdata', 'uses' => 'FlightOrdersController@postdata']);
            Route::get('/fetchflightOrderdata', ['as' => 'ajaxdata.fetchflightOrderdata', 'uses' => 'FlightOrdersController@fetchdata']);
            Route::get('/removeflightOrderdata', ['as' => 'ajaxdata.removeflightOrderdata', 'uses' => 'FlightOrdersController@removedata']);
            Route::get('/flightOrdermassremove', ['as' => 'ajaxdata.flightOrdermassremove', 'uses' => 'FlightOrdersController@massremove']);
            Route::get('/orderflight', ['as' => 'ajaxdata.orderflight', 'uses' => 'FlightOrdersController@orderflight']);
        });

        Route::group(['prefix' => 'serviceOrders'], function () {
            Route::get('/', ['as' => 'serviceOrder.get', 'uses' => 'ServiceOrdersController@getIndex']);
            Route::get('/getserviceOrderdata', ['as' => 'ajaxdata.getserviceOrderdata', 'uses' => 'ServiceOrdersController@getdata']);
            Route::post('/postserviceOrderdata', ['as' => 'ajaxdata.postserviceOrderdata', 'uses' => 'ServiceOrdersController@postdata']);
            Route::get('/fetchserviceOrderdata', ['as' => 'ajaxdata.fetchserviceOrderdata', 'uses' => 'ServiceOrdersController@fetchdata']);
            Route::get('/removeserviceOrderdata', ['as' => 'ajaxdata.removeserviceOrderdata', 'uses' => 'ServiceOrdersController@removedata']);
            Route::get('/serviceOrdermassremove', ['as' => 'ajaxdata.serviceOrdermassremove', 'uses' => 'ServiceOrdersController@massremove']);
            Route::get('/orderservice', ['as' => 'ajaxdata.orderservice', 'uses' => 'ServiceOrdersController@orderservice']);
        });

        Route::group(['prefix' => 'sliders'], function () {
            Route::get('/', ['as' => 'slider.get', 'uses' => 'SlidersController@getIndex']);
            Route::get('/getsliderdata', ['as' => 'ajaxdata.getsliderdata', 'uses' => 'SlidersController@getdata']);
            Route::post('/postsliderdata', ['as' => 'ajaxdata.postsliderdata', 'uses' => 'SlidersController@postdata']);
            Route::get('/fetchsliderdata', ['as' => 'ajaxdata.fetchsliderdata', 'uses' => 'SlidersController@fetchdata']);
            Route::get('/removesliderdata', ['as' => 'ajaxdata.removesliderdata', 'uses' => 'SlidersController@removedata']);
            Route::get('/slidermassremove', ['as' => 'ajaxdata.slidermassremove', 'uses' => 'SlidersController@massremove']);
        });

        Route::group(['prefix' => 'features'], function () {
            Route::get('/', ['as' => 'feature.get', 'uses' => 'HotelFeaturesController@getIndex']);
            Route::get('/getfeaturedata', ['as' => 'ajaxdata.getfeaturedata', 'uses' => 'HotelFeaturesController@getdata']);
            Route::post('/postfeaturedata', ['as' => 'ajaxdata.postfeaturedata', 'uses' => 'HotelFeaturesController@postdata']);
            Route::get('/fetchfeaturedata', ['as' => 'ajaxdata.fetchfeaturedata', 'uses' => 'HotelFeaturesController@fetchdata']);
            Route::get('/removefeaturedata', ['as' => 'ajaxdata.removefeaturedata', 'uses' => 'HotelFeaturesController@removedata']);
            Route::get('/featuremassremove', ['as' => 'ajaxdata.featuremassremove', 'uses' => 'HotelFeaturesController@massremove']);
            Route::get('/hotel', ['as' => 'ajaxdata.hotel', 'uses' => 'HotelFeaturesController@hotel']);
            Route::get('/featurehotel', ['as' => 'ajaxdata.featurehotel', 'uses' => 'HotelFeaturesController@featurehotel']);
        });

        Route::group(['prefix' => 'pendingFeatures'], function () {
            Route::get('/', ['as' => 'pendingFeature.get', 'uses' => 'PendingHotelFeaturesController@getIndex']);
            Route::get('/getpendingfeaturedata', ['as' => 'ajaxdata.getpendingfeaturedata', 'uses' => 'PendingHotelFeaturesController@getdata']);
            Route::post('/postpendingfeaturedata', ['as' => 'ajaxdata.postpendingfeaturedata', 'uses' => 'PendingHotelFeaturesController@postdata']);
            Route::get('/fetchpendingfeaturedata', ['as' => 'ajaxdata.fetchpendingfeaturedata', 'uses' => 'PendingHotelFeaturesController@fetchdata']);
            Route::get('/removependingfeaturedata', ['as' => 'ajaxdata.removependingfeaturedata', 'uses' => 'PendingHotelFeaturesController@removedata']);
            Route::get('/pendingfeaturemassremove', ['as' => 'ajaxdata.pendingfeaturemassremove', 'uses' => 'PendingHotelFeaturesController@massremove']);
            Route::get('/pendinghotel', ['as' => 'ajaxdata.pendinghotel', 'uses' => 'PendingHotelFeaturesController@hotel']);
            Route::get('/pendingfeaturehotel', ['as' => 'ajaxdata.pendingfeaturehotel', 'uses' => 'PendingHotelFeaturesController@featurehotel']);
        });

        Route::group(['prefix' => 'rooms'], function () {
            Route::get('/', ['as' => 'room.get', 'uses' => 'HotelRoomsController@getIndex']);
            Route::get('/getroomdata', ['as' => 'ajaxdata.getroomdata', 'uses' => 'HotelRoomsController@getdata']);
            Route::post('/postroomdata', ['as' => 'ajaxdata.postroomdata', 'uses' => 'HotelRoomsController@postdata']);
            Route::get('/fetchroomdata', ['as' => 'ajaxdata.fetchroomdata', 'uses' => 'HotelRoomsController@fetchdata']);
            Route::get('/removeroomdata', ['as' => 'ajaxdata.removeroomdata', 'uses' => 'HotelRoomsController@removedata']);
            Route::get('/roommassremove', ['as' => 'ajaxdata.roommassremove', 'uses' => 'HotelRoomsController@massremove']);
            Route::get('/hotels', ['as' => 'ajaxdata.hotels', 'uses' => 'HotelRoomsController@hotel']);
            Route::get('/roomhotel', ['as' => 'ajaxdata.roomhotel', 'uses' => 'HotelRoomsController@roomhotel']);
        });

        Route::group(['prefix' => 'pendingRooms'], function () {
            Route::get('/', ['as' => 'pendingRoom.get', 'uses' => 'PendingHotelRoomsController@getIndex']);
            Route::get('/getpendingroomdata', ['as' => 'ajaxdata.getpendingroomdata', 'uses' => 'PendingHotelRoomsController@getdata']);
            Route::post('/postpendingroomdata', ['as' => 'ajaxdata.postpendingroomdata', 'uses' => 'PendingHotelRoomsController@postdata']);
            Route::get('/fetchpendingroomdata', ['as' => 'ajaxdata.fetchpendingroomdata', 'uses' => 'PendingHotelRoomsController@fetchdata']);
            Route::get('/removependingroomdata', ['as' => 'ajaxdata.removependingroomdata', 'uses' => 'PendingHotelRoomsController@removedata']);
            Route::get('/pendingroommassremove', ['as' => 'ajaxdata.pendingroommassremove', 'uses' => 'PendingHotelRoomsController@massremove']);
            Route::get('/pendinghotels', ['as' => 'ajaxdata.pendinghotels', 'uses' => 'PendingHotelRoomsController@hotel']);
            Route::get('/pendingroomhotel', ['as' => 'ajaxdata.pendingroomhotel', 'uses' => 'PendingHotelRoomsController@roomhotel']);
        });

        Route::group(['prefix' => 'comforts'], function () {
            Route::get('/', ['as' => 'comfort.get', 'uses' => 'ComfortsController@getIndex']);
            Route::get('/getcomfortdata', ['as' => 'ajaxdata.getcomfortdata', 'uses' => 'ComfortsController@getdata']);
            Route::post('/postcomfortdata', ['as' => 'ajaxdata.postcomfortdata', 'uses' => 'ComfortsController@postdata']);
            Route::get('/fetchcomfortdata', ['as' => 'ajaxdata.fetchcomfortdata', 'uses' => 'ComfortsController@fetchdata']);
            Route::get('/removecomfortdata', ['as' => 'ajaxdata.removecomfortdata', 'uses' => 'ComfortsController@removedata']);
            Route::get('/comfortmassremove', ['as' => 'ajaxdata.comfortmassremove', 'uses' => 'ComfortsController@massremove']);
            Route::get('/hotel', ['as' => 'ajaxdata.hotel', 'uses' => 'ComfortsController@hotel']);
            Route::get('/comforthotel', ['as' => 'ajaxdata.comforthotel', 'uses' => 'ComfortsController@comforthotel']);
        });

        Route::group(['prefix' => 'pendingComforts'], function () {
            Route::get('/', ['as' => 'pendingComfort.get', 'uses' => 'PendingComfortsController@getIndex']);
            Route::get('/getpendingcomfortdata', ['as' => 'ajaxdata.getpendingcomfortdata', 'uses' => 'PendingComfortsController@getdata']);
            Route::post('/postpendingcomfortdata', ['as' => 'ajaxdata.postpendingcomfortdata', 'uses' => 'PendingComfortsController@postdata']);
            Route::get('/fetchpendingcomfortdata', ['as' => 'ajaxdata.fetchpendingcomfortdata', 'uses' => 'PendingComfortsController@fetchdata']);
            Route::get('/removependingcomfortdata', ['as' => 'ajaxdata.removependingcomfortdata', 'uses' => 'PendingComfortsController@removedata']);
            Route::get('/pendingcomfortmassremove', ['as' => 'ajaxdata.pendingcomfortmassremove', 'uses' => 'PendingComfortsController@massremove']);
            Route::get('/pendinghotel', ['as' => 'ajaxdata.pendinghotel', 'uses' => 'PendingComfortsController@hotel']);
            Route::get('/pendingcomforthotel', ['as' => 'ajaxdata.pendingcomforthotel', 'uses' => 'PendingComfortsController@comforthotel']);
        });

        Route::group(['prefix' => 'servicefeatures'], function () {
            Route::get('/', ['as' => 'servicefeature.get', 'uses' => 'ServiceFeaturesController@getIndex']);
            Route::get('/getfeaturedata', ['as' => 'ajaxdata.getservicefeaturedata', 'uses' => 'ServiceFeaturesController@getdata']);
            Route::post('/postfeaturedata', ['as' => 'ajaxdata.postservicefeaturedata', 'uses' => 'ServiceFeaturesController@postdata']);
            Route::get('/fetchfeaturedata', ['as' => 'ajaxdata.fetchservicefeaturedata', 'uses' => 'ServiceFeaturesController@fetchdata']);
            Route::get('/removefeaturedata', ['as' => 'ajaxdata.removeservicefeaturedata', 'uses' => 'ServiceFeaturesController@removedata']);
            Route::get('/featuremassremove', ['as' => 'ajaxdata.servicefeaturemassremove', 'uses' => 'ServiceFeaturesController@massremove']);
            Route::get('/service', ['as' => 'ajaxdata.service', 'uses' => 'ServiceFeaturesController@service']);
            Route::get('/featureservice', ['as' => 'ajaxdata.featureservice', 'uses' => 'ServiceFeaturesController@featureservice']);
        });

        Route::group(['prefix' => 'pendingservicefeatures'], function () {
            Route::get('/', ['as' => 'pendingservicefeature.get', 'uses' => 'PendingServiceFeaturesController@getIndex']);
            Route::get('/getfeaturedata', ['as' => 'ajaxdata.getservicefeaturedata', 'uses' => 'PendingServiceFeaturesController@getdata']);
            Route::post('/postfeaturedata', ['as' => 'ajaxdata.postservicefeaturedata', 'uses' => 'PendingServiceFeaturesController@postdata']);
            Route::get('/fetchfeaturedata', ['as' => 'ajaxdata.fetchservicefeaturedata', 'uses' => 'PendingServiceFeaturesController@fetchdata']);
            Route::get('/removefeaturedata', ['as' => 'ajaxdata.removeservicefeaturedata', 'uses' => 'PendingServiceFeaturesController@removedata']);
            Route::get('/featuremassremove', ['as' => 'ajaxdata.servicefeaturemassremove', 'uses' => 'PendingServiceFeaturesController@massremove']);
            Route::get('/service', ['as' => 'ajaxdata.service', 'uses' => 'PendingServiceFeaturesController@service']);
            Route::get('/featureservice', ['as' => 'ajaxdata.featureservice', 'uses' => 'PendingServiceFeaturesController@featureservice']);
        });

        Route::group(['prefix' => 'services'], function () {
            Route::get('/', ['as' => 'service.get', 'uses' => 'ServicesController@getIndex']);
            Route::get('/getservicedata', ['as' => 'ajaxdata.getservicedata', 'uses' => 'ServicesController@getdata']);
            Route::post('/postservicedata', ['as' => 'ajaxdata.postservicedata', 'uses' => 'ServicesController@postdata']);
            Route::get('/fetchservicedata', ['as' => 'ajaxdata.fetchservicedata', 'uses' => 'ServicesController@fetchdata']);
            Route::get('/removeservicedata', ['as' => 'ajaxdata.removeservicedata', 'uses' => 'ServicesController@removedata']);
            Route::get('/servicemassremove', ['as' => 'ajaxdata.servicemassremove', 'uses' => 'ServicesController@massremove']);
            Route::get('/servicegallery/{id}', ['as' => 'ajaxdata.servicegallery', 'uses' => 'ServicesController@gallery']);
            Route::post('/addServiceImages/{id}', ['as' => 'ajaxdata.addServiceImages', 'uses' => 'ServicesController@addImages']);
            Route::get('/getImages', ['as' => 'ajaxdata.getServiceImages', 'uses' => 'ServicesController@getImages']);
            Route::get('/removeImages/{id}', ['as' => 'ajaxdata.removeServiceImages', 'uses' => 'ServicesController@removeImages']);
            Route::get('/serviceplace', ['as' => 'ajaxdata.serviceplace', 'uses' => 'ServicesController@serviceplace']);
            Route::get('/place', ['as' => 'ajaxdata.places', 'uses' => 'ServicesController@place']);
        });

        Route::group(['prefix' => 'pendingservices'], function () {
            Route::get('/', ['as' => 'pendingservice.get', 'uses' => 'PendingServicesController@getIndex']);
            Route::get('/getservicedata', ['as' => 'ajaxdata.getservicedata', 'uses' => 'PendingServicesController@getdata']);
            Route::post('/postservicedata', ['as' => 'ajaxdata.postservicedata', 'uses' => 'PendingServicesController@postdata']);
            Route::get('/fetchservicedata', ['as' => 'ajaxdata.fetchservicedata', 'uses' => 'PendingServicesController@fetchdata']);
            Route::get('/removeservicedata', ['as' => 'ajaxdata.removeservicedata', 'uses' => 'PendingServicesController@removedata']);
            Route::get('/servicemassremove', ['as' => 'ajaxdata.servicemassremove', 'uses' => 'PendingServicesController@massremove']);
            Route::get('/servicegallery/{id}', ['as' => 'ajaxdata.servicegallery', 'uses' => 'PendingServicesController@gallery']);
            Route::post('/addServiceImages/{id}', ['as' => 'ajaxdata.addServiceImages', 'uses' => 'PendingServicesController@addImages']);
            Route::get('/getImages', ['as' => 'ajaxdata.getServiceImages', 'uses' => 'PendingServicesController@getImages']);
            Route::get('/removeImages/{id}', ['as' => 'ajaxdata.removeServiceImages', 'uses' => 'PendingServicesController@removeImages']);
            Route::get('/serviceplace', ['as' => 'ajaxdata.serviceplace', 'uses' => 'PendingServicesController@serviceplace']);
            Route::get('/place', ['as' => 'ajaxdata.places', 'uses' => 'PendingServicesController@place']);
        });

        Route::group(['prefix' => 'programmes'], function () {
            Route::get('/', ['as' => 'program.get', 'uses' => 'ProgrammesController@getIndex']);
            Route::get('/getprogramdata', ['as' => 'ajaxdata.getprogramdata', 'uses' => 'ProgrammesController@getdata']);
            Route::post('/postprogramdata', ['as' => 'ajaxdata.postprogramdata', 'uses' => 'ProgrammesController@postdata']);
            Route::get('/fetchprogramdata', ['as' => 'ajaxdata.fetchprogramdata', 'uses' => 'ProgrammesController@fetchdata']);
            Route::get('/removeprogramdata', ['as' => 'ajaxdata.removeprogramdata', 'uses' => 'ProgrammesController@removedata']);
            Route::get('/programmassremove', ['as' => 'ajaxdata.programmassremove', 'uses' => 'ProgrammesController@massremove']);
            Route::get('/hotel', ['as' => 'ajaxdata.hotel', 'uses' => 'ProgrammesController@hotel']);
            Route::get('/flight', ['as' => 'ajaxdata.flight', 'uses' => 'ProgrammesController@flight']);
            Route::get('/service', ['as' => 'ajaxdata.service', 'uses' => 'ProgrammesController@service']);
            Route::get('/programHotels', ['as' => 'ajaxdata.programHotels', 'uses' => 'ProgrammesController@programHotels']);
            Route::get('/programFlights', ['as' => 'ajaxdata.programFlights', 'uses' => 'ProgrammesController@programFlights']);
            Route::get('/programServices', ['as' => 'ajaxdata.programServices', 'uses' => 'ProgrammesController@programServices']);
        });

        Route::group(['prefix' => 'pendingprogrammes'], function () {
            Route::get('/', ['as' => 'pendingprogram.get', 'uses' => 'PendingProgrammesController@getIndex']);
            Route::get('/getprogramdata', ['as' => 'ajaxdata.getprogramdata', 'uses' => 'PendingProgrammesController@getdata']);
            Route::post('/postprogramdata', ['as' => 'ajaxdata.postprogramdata', 'uses' => 'PendingProgrammesController@postdata']);
            Route::get('/fetchprogramdata', ['as' => 'ajaxdata.fetchprogramdata', 'uses' => 'PendingProgrammesController@fetchdata']);
            Route::get('/removeprogramdata', ['as' => 'ajaxdata.removeprogramdata', 'uses' => 'PendingProgrammesController@removedata']);
            Route::get('/programmassremove', ['as' => 'ajaxdata.programmassremove', 'uses' => 'PendingProgrammesController@massremove']);
            Route::get('/hotel', ['as' => 'ajaxdata.hotel', 'uses' => 'PendingProgrammesController@hotel']);
            Route::get('/flight', ['as' => 'ajaxdata.flight', 'uses' => 'PendingProgrammesController@flight']);
            Route::get('/service', ['as' => 'ajaxdata.service', 'uses' => 'PendingProgrammesController@service']);
            Route::get('/programHotels', ['as' => 'ajaxdata.programHotels', 'uses' => 'PendingProgrammesController@programHotels']);
            Route::get('/programFlights', ['as' => 'ajaxdata.programFlights', 'uses' => 'PendingProgrammesController@programFlights']);
            Route::get('/programServices', ['as' => 'ajaxdata.programServices', 'uses' => 'PendingProgrammesController@programServices']);
        });

        Route::group(['prefix' => 'flights'], function () {
            Route::get('/', ['as' => 'flight.get', 'uses' => 'FlightsController@getIndex']);
            Route::get('/getflightdata', ['as' => 'ajaxdata.getflightdata', 'uses' => 'FlightsController@getdata']);
            Route::post('/postflightdata', ['as' => 'ajaxdata.postflightdata', 'uses' => 'FlightsController@postdata']);
            Route::get('/fetchflightdata', ['as' => 'ajaxdata.fetchflightdata', 'uses' => 'FlightsController@fetchdata']);
            Route::get('/removeflightdata', ['as' => 'ajaxdata.removeflightdata', 'uses' => 'FlightsController@removedata']);
            Route::get('/flightmassremove', ['as' => 'ajaxdata.flightmassremove', 'uses' => 'FlightsController@massremove']);
        });

        Route::group(['prefix' => 'pendingflights'], function () {
            Route::get('/', ['as' => 'pendingflight.get', 'uses' => 'PendingFlightsController@getIndex']);
            Route::get('/getflightdata', ['as' => 'ajaxdata.getflightdata', 'uses' => 'PendingFlightsController@getdata']);
            Route::post('/postflightdata', ['as' => 'ajaxdata.postflightdata', 'uses' => 'PendingFlightsController@postdata']);
            Route::get('/fetchflightdata', ['as' => 'ajaxdata.fetchflightdata', 'uses' => 'PendingFlightsController@fetchdata']);
            Route::get('/removeflightdata', ['as' => 'ajaxdata.removeflightdata', 'uses' => 'PendingFlightsController@removedata']);
            Route::get('/flightmassremove', ['as' => 'ajaxdata.flightmassremove', 'uses' => 'PendingFlightsController@massremove']);
        });

        Route::group(['prefix' => 'offices'], function () {
            Route::get('/', ['as' => 'office.get', 'uses' => 'OfficesController@getIndex']);
            Route::get('/getofficedata', ['as' => 'ajaxdata.getofficedata', 'uses' => 'OfficesController@getdata']);
            Route::post('/postofficedata', ['as' => 'ajaxdata.postofficedata', 'uses' => 'OfficesController@postdata']);
            Route::get('/fetchofficedata', ['as' => 'ajaxdata.fetchofficedata', 'uses' => 'OfficesController@fetchdata']);
            Route::get('/removeofficedata', ['as' => 'ajaxdata.removeofficedata', 'uses' => 'OfficesController@removedata']);
            Route::get('/officemassremove', ['as' => 'ajaxdata.officemassremove', 'uses' => 'OfficesController@massremove']);
        });

        Route::group(['prefix' => 'areas'], function () {
            Route::get('/', ['as' => 'area.get', 'uses' => 'AreasController@getIndex']);
            Route::get('/getareatdata', ['as' => 'ajaxdata.getareadata', 'uses' => 'AreasController@getdata']);
            Route::post('/postareadata', ['as' => 'ajaxdata.postareadata', 'uses' => 'AreasController@postdata']);
            Route::get('/fetchareadata', ['as' => 'ajaxdata.fetchareadata', 'uses' => 'AreasController@fetchdata']);
            Route::get('/removeareadata', ['as' => 'ajaxdata.removeareadata', 'uses' => 'AreasController@removedata']);
            Route::get('/areamassremove', ['as' => 'ajaxdata.areamassremove', 'uses' => 'AreasController@massremove']);
        });

        Route::group(['prefix' => 'statics'], function () {
            Route::get('/', ['as' => 'static.get', 'uses' => 'StaticController@getIndex']);
            Route::post('/poststaticdata', ['as' => 'ajaxdata.poststaticdata', 'uses' => 'StaticController@postdata']);
        });

        Route::group(['prefix' => 'contacts'], function () {
            Route::get('/', ['as' => 'contact.get', 'uses' => 'ContactsController@getIndex']);
            Route::post('/postcontactdata', ['as' => 'ajaxdata.postcontactdata', 'uses' => 'ContactsController@postdata']);
        });

        Route::group(['prefix' => 'subscribers'], function () {
            Route::get('/index', ['as' => 'admin.subscribers', 'uses' => 'SubscribersController@getIndex']);
            Route::get('/send/{id}', ['as' => 'admin.subscriber.send', 'uses' => 'SubscribersController@getEmail']);
            Route::post('/sendMail', ['as' => 'sendMail', 'uses' => 'SubscribersController@sendEmail']);
            Route::get('/sendAll', ['as' => 'admin.subscriber.sendAll', 'uses' => 'SubscribersController@getAll']);
            Route::post('/sendAll', ['as' => 'admin.subscriber.sendAll', 'uses' => 'SubscribersController@sendAll']);
        });

        Route::group(['prefix' => 'users'], function () {
            Route::get('/', ['as' => 'user.get', 'uses' => 'UsersController@getIndex']);
            Route::get('/getuserdata', ['as' => 'ajaxdata.getuserdata', 'uses' => 'UsersController@getdata']);
            Route::post('/postuserdata', ['as' => 'ajaxdata.postuserdata', 'uses' => 'UsersController@postdata']);
            Route::get('/fetchuserdata', ['as' => 'ajaxdata.fetchuserdata', 'uses' => 'UsersController@fetchdata']);
            Route::get('/removeuserdata', ['as' => 'ajaxdata.removeuserdata', 'uses' => 'UsersController@removedata']);
            Route::get('/usermassremove', ['as' => 'ajaxdata.usermassremove', 'uses' => 'UsersController@massremove']);
        });

        Route::group(['prefix' => 'members'], function () {
            Route::get('/', ['as' => 'member.get', 'uses' => 'MembersController@getIndex']);
            Route::get('/getmemberdata', ['as' => 'ajaxdata.getmemberdata', 'uses' => 'MembersController@getdata']);
            Route::post('/postmemberdata', ['as' => 'ajaxdata.postmemberdata', 'uses' => 'MembersController@postdata']);
            Route::get('/fetchmemberdata', ['as' => 'ajaxdata.fetchmemberdata', 'uses' => 'MembersController@fetchdata']);
            Route::get('/removememberdata', ['as' => 'ajaxdata.removememberdata', 'uses' => 'MembersController@removedata']);
            Route::get('/membermassremove', ['as' => 'ajaxdata.membermassremove', 'uses' => 'MembersController@massremove']);
        });

        Route::group(['prefix' => 'posts'], function () {
            Route::get('/', ['as' => 'post.get', 'uses' => 'PostsController@getIndex']);
            Route::get('/getpostdata', ['as' => 'ajaxdata.getpostdata', 'uses' => 'PostsController@getdata']);
            Route::post('/postpostdata', ['as' => 'ajaxdata.postpostdata', 'uses' => 'PostsController@postdata']);
            Route::get('/fetchpostdata', ['as' => 'ajaxdata.fetchpostdata', 'uses' => 'PostsController@fetchdata']);
            Route::get('/removepostdata', ['as' => 'ajaxdata.removepostdata', 'uses' => 'PostsController@removedata']);
            Route::get('/postmassremove', ['as' => 'ajaxdata.postmassremove', 'uses' => 'PostsController@massremove']);
            Route::get('/cat', ['as' => 'ajaxdata.cat', 'uses' => 'PostsController@cat']);
            Route::get('/postcat', ['as' => 'ajaxdata.postcat', 'uses' => 'PostsController@postcat']);
        });

        Route::group(['prefix' => 'cats'], function () {
            Route::get('/', ['as' => 'cat.get', 'uses' => 'CatsController@getIndex']);
            Route::get('/getcatdata', ['as' => 'ajaxdata.getcatdata', 'uses' => 'CatsController@getdata']);
            Route::post('/postcatdata', ['as' => 'ajaxdata.postcatdata', 'uses' => 'CatsController@postdata']);
            Route::get('/fetchcatdata', ['as' => 'ajaxdata.fetchcatdata', 'uses' => 'CatsController@fetchdata']);
            Route::get('/removecatdata', ['as' => 'ajaxdata.removecatdata', 'uses' => 'CatsController@removedata']);
            Route::get('/catmassremove', ['as' => 'ajaxdata.catmassremove', 'uses' => 'CatsController@massremove']);
        });

        Route::get('/Email', ['as' => 'admin.mail', 'uses' => 'HomeController@mail']);
        Route::post('/sendMail', ['as' => 'admin.sendmail', 'uses' => 'HomeController@sendmail']);
        Route::get('/profile', ['as' => 'admin.profile', 'uses' => 'UsersController@getProfile']);
        Route::post('/profile', ['as' => 'admin.profile.edit', 'uses' => 'UsersController@editProfile']);
        Route::post('/profileimg', ['as' => 'admin.profile.image', 'uses' => 'UsersController@editProfileImage']);
        Route::post('/profilepass', ['as' => 'admin.profile.pass', 'uses' => 'UsersController@editProfilePass']);
        Route::get('/order', ['as' => 'admin.order', 'uses' => 'MessageController@order']);
        Route::post('/upload', ['as' => 'admin.upload.post', 'uses' => 'UploadController@getPost']);
        Route::post('/uploadIcon', ['as' => 'admin.upload.icon', 'uses' => 'UploadController@getPost2']);
        Route::post('/uploadImage', ['as' => 'admin.upload.image', 'uses' => 'UploadController@getPost3']);
        Route::post('/uploads', 'DataController@dropzoneStore')->name('admin.dropzoneStore');
        Route::post('/upload/images', ['as' => 'admin.upload.images', 'uses' => 'CatsController@getPostImages']);
    });
});