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
Route::get('/', 'Web\WebController@index')->name('homepage');
Route::get('/contact-us', 'Web\WebController@contact_us')->name('contact_us');
Route::get('/terms-of-use', 'Web\WebController@terms_of_use')->name('terms_of_use');
Route::get('/privacy-policy', 'Web\WebController@privacy_policy')->name('privacy_policy');
Route::get('/how-we-work', 'Web\WebController@how_we_work')->name('how_we_work');
Route::get('/frequesntly-asked-questions', 'Web\WebController@faqs')->name('faqs');
Route::get('/download-center', 'Web\WebController@download_center')->name('download_center');
Route::get('/download-file/{name}', 'Web\WebController@download_file')->name('download_file');


Route::prefix('services')->namespace('Web')->as('services.')->middleware(['auth'])->group(function () {
    Route::get('plans', 'PlanController@index')->name('plans');
});


Route::prefix('our-blog')->as('our_blog.')->group(function () {
    Route::get('/search', 'Web\BlogController@blog_posts')->name('blog_search');
    Route::get('/', 'Web\BlogController@blog_posts')->name('blog_posts');
    Route::get('/post/{id}/{slug}', 'Web\BlogController@blog_post_info')->name('blog_post_info');
    Route::get('/category/{id}/{slug}', 'Web\BlogController@blog_category_posts')->name('blog_category_posts');
    Route::post('/comment', 'Web\BlogController@blog_comment')->name('blog_comment');
});

Route::prefix('verified-courses')->as('our_courses.')->group(function () {
    Route::get('/index', 'Web\CourseController@courses')->name('courses');
    Route::get('/search', 'Web\CourseController@courses')->name('course_search');
    Route::get('/details/{id}/{slug}', 'Web\CourseController@course_info')->name('course_info');
    Route::get('/category/{id}/{slug}', 'Web\CourseController@category_courses')->name('category_courses');
});

Route::prefix('my-courses')->namespace('Student')->as('my_courses.')->middleware(['auth'])->group(function () {
    Route::get('/take-course/{id}/{slug}', 'CourseController@take_course')->name('take_course');
    Route::get('/section/video/{id}', 'CourseController@section_video')->name('section_video');
    Route::get('/download/section-resource/{id}', 'CourseController@download_resource')->name('download_resource');
});

Route::prefix('cart')->namespace('Student')->as('cart.')->middleware(['auth'])->group(function () {
    Route::get('/items', 'CartController@items')->name('items');
    Route::post('/add', 'CartController@addCourseToCart')->name('add');
    Route::post('/remove', 'CartController@removeCourseFromCart')->name('remove');
    Route::post('/checkout', 'CartController@checkout')->name('checkout');
    Route::get('/checkout/success/{data}', 'CartController@checkoutSuccess')->name('checkout.success');
});

Auth::routes(['verify' => true , 'register' => true]);
// Route::get('/t', function () {
//     event(new \App\Events\SendMessage());
//     dd('Event Run Successfully.');
// });

Route::middleware('auth')->group(function (){

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/user-dashboard', 'Agent\HomeController@index')->name('user_dashboard');


    Route::middleware('agent')->prefix('agent')->group( function (){
        Route::get('/chat-with-clients', 'Agent\ChatController@index')->name('agent_chats');
        Route::get('/agent-coupons', 'Agent\AgentController@agent_coupons')->name('agent_coupons');
        Route::get('/agent-transactions', 'Agent\AgentController@agent_transactions')->name('agent_transactions');

        Route::post('find-account-details','Agent\AgentController@account_details');
        Route::post('sell-coupon','Agent\AgentController@sell_coupon')->name('sell_coupon');
        Route::post('update-transaction-pin','Agent\AgentController@update_pin')->name('update_pin');



    });


    Route::middleware('auth')->group(function (){

        Route::get('/administrator-dashboard', 'Admin\HomeController@index')->name('admin_dashboard');

        Route::prefix('blog')->as('blog.')->group(function () {
            Route::resource('categories','Admin\BlogCategoryController');
            Route::resource('posts','Admin\BlogPostController');
            Route::resource('comments','Admin\BlogCommentController');
        });

        Route::prefix('course')->as('course.')->group(function () {
            Route::resource('categories','Admin\CourseCategoryController');
            Route::resource('details','Admin\CourseController');
            Route::get('sections/create/{id}','Admin\CourseSectionController@create')->name('sections.create');
            Route::resource('sections','Admin\CourseSectionController')->except(['create']);
            Route::resource('sections/resources','Admin\CourseSectionResourceController')->except(['index' , 'edit' , 'create']);
            Route::resource('comments','Admin\BlogCommentController');
            Route::get('/section/file/{id}', 'Admin\CourseSectionController@section_file')->name('sections.file');
        });




        Route::resource('users','Admin\UsersController');

        Route::resource('transactions','Admin\TransactionsController')->only('show');
        Route::get('debit-transactions','Admin\TransactionsController@debit_index')->name('debit_trans');
        Route::get('credit-transactions','Admin\TransactionsController@credit_index')->name('credit_trans');

        Route::resource('investments','Admin\InvestmentsController')->only('index','show');
        Route::get('pending-investments','Admin\InvestmentsController@pending')->name('pending_investments');
        Route::post('approve-investments','Admin\InvestmentsController@approve')->name('approve_investments');
        Route::post('extend-investment-date','Admin\InvestmentsController@extendInvestmentDate')->name('extend_investment_date');

        Route::resource('withdrawals','Admin\WithdrawalsController')->only('index','show');
        Route::get('pending-withdrawals','Admin\WithdrawalsController@pending')->name('pending_withdrawals');
        Route::post('process-withdrawal','Admin\WithdrawalsController@process')->name('process_withdrawal');
        Route::post('cancel-withdrawal','Admin\WithdrawalsController@cancel')->name('cancel_withdrawal');
        Route::post('approve-withdrawal','Admin\WithdrawalsController@approve')->name('approve_withdrawal');

        Route::resource('coupons','Admin\CouponsController')->only('index','show','store');

        Route::resource('adverts','Admin\AdvertsController');

        Route::resource('agents','Admin\AgentsController');
        Route::post('/refill-agent-wallet', 'Admin\AgentsController@refill_agent')->name('refill_agent');

        Route::resource('logs','Admin\LogsController');

        Route::get('/referrals-index', 'Admin\HomeController@referrals')->name('referrals.index');
        Route::resource('advertmedia','Admin\AdvertMediaController');


    });
});

Route::get('/barcode', 'Main\Profile@barcode')->name('barcode');

Route::get('/command', function() {
    $output = [];  //'--path' => 'vendor/laravel/passport/database/migrations'
    \Artisan::call('passport:client --personal --no-interaction', $output);
    dd($output);
});
