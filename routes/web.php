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

/* Middleware for minifing html */



//Route::middleware(['HtmlMinifier'])->group(static function () {




    /* Middleware for minifing html */



    /* Frontend section */

    Route::get('/', [App\Http\Controllers\Frontend\IndexController::class, 'home'])->name('home');


    // Product Category
    Route::get('products/{slug}/', [App\Http\Controllers\Frontend\IndexController::class, 'productCategory'])->name('local.ville');

    // Tous Locaux
    Route::get('locaux/', [App\Http\Controllers\Frontend\IndexController::class, 'tousLocaux'])->name('tous.locaux');

    Route::post('locaux/{slug}/child', [\App\Http\Controllers\CategoryContoller::class, 'getChildByParentSlug']);


    // Tous Locaux à vendre
    Route::get('vendre/', [App\Http\Controllers\Frontend\IndexController::class, 'vendreLocaux'])->name('vendre.locaux');

    Route::post('vendre/{slug}/child', [\App\Http\Controllers\CategoryContoller::class, 'getChildByParentSlug']);

    // Tous Locaux à louer
    Route::get('louer/', [App\Http\Controllers\Frontend\IndexController::class, 'louerLocaux'])->name('louer.locaux');

    Route::post('vendre/{slug}/child', [\App\Http\Controllers\CategoryContoller::class, 'getChildByParentSlug']);



    // Product Detail

    Route::get('product-detail/{slug}/', [App\Http\Controllers\Frontend\IndexController::class, 'productDetail'])->name('product.detail');

    // Blog List
    Route::get('news/', [App\Http\Controllers\Frontend\IndexController::class, 'actualiteList'])->name('news.list');
    Route::get('evenement/', [App\Http\Controllers\Frontend\IndexController::class, 'eventList'])->name('event.list');

    // blog Detail

    Route::get('blog-detail/{slug}/', [App\Http\Controllers\Frontend\IndexController::class, 'blogDetail'])->name('blog.detail');

    // Service Detail

    Route::get('services/{slug}/', [App\Http\Controllers\Frontend\IndexController::class, 'serviceDetail'])->name('service.detail');


    // Ma selection
    Route::post('add-to-cart', [App\Http\Controllers\Frontend\CartController::class, 'addtocart'])->name('addtocart.status');
    //Load selection
    Route::get('load-cart-data', [App\Http\Controllers\Frontend\CartController::class, 'cartloadbyajax'])->name('loadtocart.status');

    // Liste Sélection
    Route::get('selection', [App\Http\Controllers\Frontend\CartController::class, 'index'])->name('maselection.status');
    // Supprimer Sélection
    Route::get('delete-from-selection', [App\Http\Controllers\Frontend\CartController::class, 'deletefromselection'])->name('deleteselection.status');

    // About Us
    Route::get('a-propos', [App\Http\Controllers\Frontend\IndexController::class, 'aboutUs'])->name('about.us');

    // Contact Us
    Route::get('contact', [App\Http\Controllers\Frontend\IndexController::class, 'contactUs'])->name('contact.us');

    Route::post('/contact-submit', fn() => event(new RegisterInterest))->middleware(['honey'])->name('contact.submit');

    Route::post('contact-submit', [App\Http\Controllers\Frontend\IndexController::class, 'contactSubmit'])->name('contact.submit');

    // Request a Quote (devis)
    //Route::get('devis', [App\Http\Controllers\Frontend\IndexController::class, 'contactUs'])->name('contact.us');
    Route::post('devis-submit', [App\Http\Controllers\Frontend\IndexController::class, 'devisSubmit'])->name('devis.submit');


    // News letter


    Route::post('add-to-news', [App\Http\Controllers\Frontend\NewsLetterController::class, 'addtonews'])->name('addtonews.status');





    // authentication

    Route::get('user/auth', [App\Http\Controllers\Frontend\IndexController::class, 'userAuth'])->name('user.auth');

    Route::post('user/login', [App\Http\Controllers\Frontend\IndexController::class, 'loginSubmit'])->name('login.submit');

    Route::post('user/register', [App\Http\Controllers\Frontend\IndexController::class, 'registerSubmit'])->name('register.submit');

    Route::get('user/logout', [App\Http\Controllers\Frontend\IndexController::class, 'userLogout'])->name('user.logout');



    /* End Frontend section */
//});


/**************************************************************************************************************/
Auth::routes(['register' => false]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




// Admin dashboard

Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'admin'], function () {
    Route::get('/', [App\Http\Controllers\AdminController::class, 'admin'])->name('admin');


    // Banner section

    Route::resource('banner', App\Http\Controllers\BannerController::class);
    Route::post('banner_status', [\App\Http\Controllers\BannerController::class, 'bannerStatus'])->name('banner.status');



    // localisation section

    Route::resource('localisation', App\Http\Controllers\CategoryContoller::class);
    Route::post('localisation_status', [\App\Http\Controllers\CategoryContoller::class, 'localisationStatus'])->name('localisation.status');

    Route::post('localisation/{id}/child', [\App\Http\Controllers\CategoryContoller::class, 'getChildByParentID']);

    Route::post('gamme/{id}/child', [\App\Http\Controllers\CategoryContoller::class, 'getGammeByParentID']);

    Route::post('sousgamme/{id}/child', [\App\Http\Controllers\CategoryContoller::class, 'getSousGammeByParentID']);

    // Speciality section

    Route::resource('specialite', App\Http\Controllers\BrandController::class);
    Route::post('specialite_status', [\App\Http\Controllers\BrandController::class, 'specialiteStatus'])->name('specialite.status');

    // Team section

    Route::resource('equipe', App\Http\Controllers\TeamController::class);
    Route::post('equipe_status', [\App\Http\Controllers\TeamController::class, 'equipeStatus'])->name('equipe.status');

    // Actualité section

    Route::resource('actualite', App\Http\Controllers\blogController::class);
    Route::post('actualite_status', [\App\Http\Controllers\blogController::class, 'actualiteStatus'])->name('actualite.status');

     // Service section

    Route::resource('service', App\Http\Controllers\serviceController::class);
    Route::post('service_status', [\App\Http\Controllers\serviceController::class, 'serviceStatus'])->name('service.status');

    // Local section

    Route::resource('product', App\Http\Controllers\ProductController::class);
    Route::post('local_status', [\App\Http\Controllers\ProductController::class, 'localStatus'])->name('local.status');


        // Gamme section

        Route::resource('gamme', App\Http\Controllers\GammeController::class);
 // Sous Gamme section

 Route::resource('sous_gamme', App\Http\Controllers\SousGammeController::class);

    // History section

    Route::resource('/history', App\Http\Controllers\HistoryController::class);
    // Témoignage section

    Route::resource('/feedback', App\Http\Controllers\FeedbackController::class);
    Route::post('feedback_status', [\App\Http\Controllers\FeedbackController::class, 'feedbackStatus'])->name('feedback.status');

    // AboutUs section

    Route::get('aboutus', [App\Http\Controllers\AboutusController::class, 'index'])->name('about.index');
    Route::put('aboutus-update', [App\Http\Controllers\AboutusController::class, 'aboutUpdate'])->name('about.update');


    Route::resource('/mission', App\Http\Controllers\MissionController::class);
    Route::resource('/solide', App\Http\Controllers\SolideExController::class);

    // Contacts section


    Route::resource('/contacts', App\Http\Controllers\ContactAdminController::class);

    // Devis section

    Route::resource('/devis', App\Http\Controllers\devisAdminController::class);

    // Newsletter section

    Route::resource('/newsletter', App\Http\Controllers\newsletterController::class);


    // Users section

    Route::resource('user', App\Http\Controllers\UserController::class);
    Route::post('user_status', [\App\Http\Controllers\UserController::class, 'userStatus'])->name('user.status');
});
Route::fallback(\CodeZero\LocalizedRoutes\Controller\FallbackController::class)->middleware(\CodeZero\LocalizedRoutes\Middleware\SetLocale::class);
