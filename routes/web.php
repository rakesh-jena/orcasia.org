<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TutController;
use App\Http\Controllers\CYPController;
use App\Http\Controllers\CYPVolunteerController;
use App\Http\Controllers\CYPEventTypeController;
use App\Http\Controllers\AboutPageController;
use App\Http\Controllers\MissionController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\GraphsController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Event\PartnerController;
use App\Http\Controllers\Event\AboutController;
use App\Http\Controllers\Event\SpeakerController;
use App\Http\Controllers\Event\MediaController;
use App\Http\Controllers\Event\ScheduleController;
use App\Http\Controllers\Event\RegisterationController;


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

/**
 * ------------------------------------------------------------------------
 * ADMIN DASHBOARD URLs
 * ------------------------------------------------------------------------
 * */
Route::domain('gcns.orcasia.org')->group(function () {
     Route::get('/', function () {
         return view('gcns.home');
     });
     Route::get('/event/speaker/{id}', [SpeakerController::class, 'getSpeakerData']);
 });

Route::middleware(['auth', 'admin'])->group(function () {
    /**Dashboard */
    Route::get('yn-admin', [DashboardController::class, 'index']);
    Route::put('yn-admin', [DashboardController::class, 'update_profile']);
    Route::put('approved', [ArticleController::class, 'update_status_approved']);
    Route::resource('yn-admin/users', UserController::class);
    Route::resource('yn-admin/tags', TagController::class);
    Route::resource('yn-admin/articles', ArticleController::class);
    Route::resource('yn-admin/category', CategoryController::class);
    Route::resource('yn-admin/profiles', ProfileController::class);
    Route::resource('yn-admin/cyp', CYPController::class);
    Route::get('yn-admin/cyp_design', [CYPController::class, 'cypDesign']);
    Route::post('yn-admin/cyp_banner', [CYPController::class, 'cypBanner']);
    Route::resource('yn-admin/cyp_eventTypes', CYPEventTypeController::class);
    Route::resource('yn-admin/cyp_volunteers', CYPVolunteerController::class);
    Route::get('yn-admin/design_25under25', [ProfileController::class, 'design']);
    Route::post('yn-admin/section_featured', [TutController::class, 'featured']);
    Route::post('yn-admin/section_one', [TutController::class, 'section_one']);
    Route::post('yn-admin/section_two', [TutController::class, 'section_two']);
    Route::post('yn-admin/section_three', [TutController::class, 'section_three']);
    Route::post('yn-admin/section_four', [TutController::class, 'section_four']);
    Route::post('yn-admin/section_five', [TutController::class, 'section_five']);
    Route::get('yn-admin/subscribers', [SubscriberController::class, 'index']);
    Route::get('yn-admin/all-users', [UserController::class, 'all_users']);
    Route::post('yn-admin/s_featured', [DashboardController::class, 's_featured']);
    Route::post('yn-admin/s_agenda', [DashboardController::class, 's_agenda']);
    Route::post('yn-admin/s_scoop', [DashboardController::class, 's_scoop']);
    Route::post('yn-admin/s_fullscreen', [DashboardController::class, 's_fullscreen']);
    Route::post('yn-admin/s_g_three', [DashboardController::class, 's_g_three']);
    Route::post('yn-admin/s_g_five', [DashboardController::class, 's_g_five']);
    Route::post('yn-admin/s_first', [DashboardController::class, 's_first']);
    Route::post('yn-admin/s_second', [DashboardController::class, 's_second']);
    Route::post('yn-admin/s_last', [DashboardController::class, 's_last']);
    Route::post('yn-admin/case_studies', [DashboardController::class, 'case_studies']);
    Route::post('check-category', [CategoryController::class, 'check_if_used']);
    Route::post('check-tag', [TagController::class, 'check_if_used']);
    Route::resource('yn-admin/graphsPage', GraphsController::class);
    Route::post('check-graph', [GraphsController::class,'check_if_used']);
    Route::resource('yn-admin/fileUpload', FileUploadController::class);
    Route::resource('yn-admin/event/partner', PartnerController::class);
    Route::resource('yn-admin/event/about', AboutController::class);
    Route::resource('yn-admin/event/speaker', SpeakerController::class);
    Route::resource('yn-admin/event/media', MediaController::class);
    Route::resource('yn-admin/event/schedule', ScheduleController::class);
    Route::get('yn-admin/event/schedule/{id}/sessionAdd', [ScheduleController::class,'sessionAdd']);
    Route::post('yn-admin/event/schedule/{id}/sessionCreate', [ScheduleController::class,'sessionCreate']);
    Route::get('yn-admin/event/schedule/{scheduleId}/{sessionId}/sessionEdit/', [ScheduleController::class,'sessionEdit']);
    Route::put('yn-admin/event/schedule/{scheduleId}/{sessionId}/sessionUpdate/', [ScheduleController::class,'sessionUpdate']);
    Route::delete('yn-admin/event/schedule/{scheduleId}/{sessionId}/sessionDestroy/', [ScheduleController::class,'sessionDestroy']);
    Route::resource('yn-admin/event/registeration', RegisterationController::class);
});

/**
 * ------------------------------------------------------------------------
 * AUTHOR DASHBOARD URLs
 * ------------------------------------------------------------------------
 * */
Route::middleware(['auth', 'author'])->group(function () {
    Route::get('yn-author', [AuthorController::class, 'index']);
    Route::put('yn-author', [AuthorController::class, 'update_profile']);
    Route::get('yn-author/articles', [AuthorController::class, 'articles']);
    Route::get('yn-author/articles/create', [AuthorController::class, 'add_article']);
    Route::get('yn-author/articles/{id}/edit', [AuthorController::class, 'edit_article']);
    Route::post('yn-author/articles', [AuthorController::class, 'store_article']);
    Route::put('yn-author/articles/{id}', [AuthorController::class, 'update_article']);
    Route::delete('yn-author/articles/{id}', [AuthorController::class, 'delete_article']);
    Route::put('send-for-approval', [ArticleController::class, 'update_status_processing']);
    Route::put('yn-author/change-password', [AuthController::class, 'change_password']);
});
/**Authentication */
Route::get('/yn-login', function () {
    return view('admin.login');
});

Route::get('/login', function () {
    return view('frontend.login');
})->name('login');

Route::get('/register', function () {
    return view('frontend.register');
});
Route::post('/user_login', [AuthController::class, 'authenticate']);
Route::post('/user_register', [UserController::class, 'store']);
Route::get('/user_logout', [AuthController::class, 'logout']);
/**
 * ------------------------------------------------------------------------
 * WEBPAGE URLs
 * ------------------------------------------------------------------------
 * */
Route::get('/', function () {
    return view('frontend.home');
})->name('homepage');

Route::get('/news', function(){
    return view('frontend.article.view');
});
Route::get('/events/{slug}/', [ArticleController::class, 'viewevent']);
Route::get('/infographics/{slug}/', [ArticleController::class, 'graphics']);
Route::get('/centralcommittee/20cc/{slug}/', [ArticleController::class, 'twentycc']);
Route::get('/article/{slug}/{id}', [ArticleController::class, 'show']);
Route::get('/article/{slug}', [ArticleController::class, 'cicmnews']);
Route::get('/{slug}', [ArticleController::class, 'featured']);
Route::get('/tag/{slug}', [TagController::class, 'show']);
Route::get('/category/{slug}', [CategoryController::class, 'show']);
Route::get('/author/{slug}', [UserController::class, 'show']);
Route::post('/add-subscriber', [SubscriberController::class, 'store']);
Route::post('/search', [ArticleController::class, 'search']);
Route::post('/search/ajax', [ArticleController::class, 'ajax_search']);
Route::post('/ajax-load-more', [ArticleController::class, 'ajax_loadmore']);
Route::get('/pages/authors', [UserController::class, 'showAuthors']);

/**
 * ------------------------------------------------------------------------
 * ORCA frontend URLs
 * ------------------------------------------------------------------------
 * */
 
 
Route::get('/pages/about',[AboutPageController::class,'index']);
Route::get('/pages/mission',[MissionController::class,'index']);
Route::get('/pages/team',[TeamController::class,'index']);
Route::get('/pages/graphs',[GraphsController::class,'show']);

Route::get('/pages/publication', function () {
    return view('frontend.publications');
});

Route::get('/pages/onv', function () {
    return view('onv');
});

Route::get('/pages/share', function () {
    return view('share');
});

Route::get('/pages/submission', function () {
    return view('submission');
});

Route::get('/pages/partners', function () {
    return view('partners');
});

Route::get('/pages/orcafiles', function () {
    return view('orcafiles');
});


Route::get('/pages/india-china-trade-dashboard', function () {
    return view('india-china-trade-dashboard');
});

Route::get('/pages/china-census-dashboard', function () {
    return view('china-census-dashboard');
});

Route::get('/pages/china-provinces-dashboard', function () {
    return view('china-provinces-dashboard');
});

Route::get('/pages/china-public-diplomacy-dashboard', function () {
    return view('china-public-diplomacy-dashboard');
});

Route::get('/pages/events', function () {
    return view('events');
});

Route::get('/infographics', function () {
    return view('infographics');
});


Route::get('/pages/19cc/part1', function () {
    return view('part1');
});



Route::get('/pages/19cc/part2', function () {
    return view('part2');
});



Route::get('/pages/20cc/overview', function () {
    return view('overview');
});

Route::get('/pages/infographics', function () {
    return view('infographics');
});


/**
 * ------------------------------------------------------------------------
 * ORCA Contact form
 * ------------------------------------------------------------------------
 * */
 
 
 Route::get('/pages/contact', function () {
    return view('contact');
});

 Route::get('/pages/test', function () {
    return view('test');
});

// tags

// Route::get('tag/{slug}', 'TagController@show')->name('tag.show');
Route::get('tag/{slug}', [TagController::class,'show'])->name('tag.show');
Route::post('scheduleRegistration', [RegisterationController::class,'scheduleRegistration'])->name('scheduleRegistration');

Route::get('/pages/gcns', function () {
    return view('gcns/home');
});
Route::get('/event/speaker/{id}', [SpeakerController::class, 'getSpeakerData']);
Route::get('/pages/allspeakers', function () {
    return view('gcns/allspeakers');
});