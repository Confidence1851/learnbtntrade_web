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
Route::get('/terms-and-conditions', 'Web\WebController@terms_and_conditions')->name('terms_and_conditions');
Route::get('/privacy-policy', 'Web\WebController@privacy_policy')->name('privacy_policy');
Route::get('/how-we-work', 'Web\WebController@how_we_work')->name('how_we_work');
Route::get('/frequesntly-asked-questions', 'Web\WebController@faqs')->name('faqs');
Route::get('/download-center', 'Web\WebController@download_center')->name('download_center');
Route::get('/download-file/{name}', 'Web\WebController@download_file')->name('download_file');
Route::get('/avatar/{path}', 'Web\WebController@userAvatar')->name('user.avatar');


Route::prefix('services')->namespace('Web')->as('services.')->group(function () {
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

Route::middleware('auth')->group(function (){

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/user-dashboard', 'Agent\HomeController@index')->name('user_dashboard');


    Route::middleware('blogger')->namespace('Blogger')->prefix('blogger')->group( function (){
        Route::get('/dashboard', 'HomeController@index')->name('blogger_dashboard');

        Route::prefix('blog')->as('blogger.')->group(function () {
            Route::resource('categories','BlogCategoryController');
            Route::resource('posts','BlogPostController');
            Route::resource('comments','BlogCommentController');
        });
    });


    Route::middleware('instructor')->namespace('Instructor')->prefix('instructor')->as('instructors.')->group( function (){
        Route::get('/dashboard', 'HomeController@index')->name('instructor_dashboard');
        Route::as('course.')->prefix('course')->group(function () {
            Route::resource('details','CourseController');
            Route::get('sections/create/{id}','CourseSectionController@create')->name('sections.create');
            Route::resource('sections','CourseSectionController')->except(['create']);
            Route::resource('sections/resources','CourseSectionResourceController')->except(['index' , 'edit' , 'create']);
            Route::get('/section/file/{id}', 'CourseSectionController@section_file')->name('sections.file');
        });
    });


    Route::middleware(['blogger' , 'blogger' , 'instructor'])->namespace('Admin')->prefix('super-user')->group(function (){
        Route::get('profile/edit', 'UsersController@editProfile')->name('edit.profile');
        Route::post('/profile/update', 'UsersController@updateProfile')->name('profile.update');
        Route::post('profile/password-reset', 'UsersController@profile_password_reset')->name('profile.password_reset');
    });


    Route::middleware('admin')->namespace('Admin')->prefix('admin')->group(function (){

        Route::get('/dashboard', 'HomeController@index')->name('admin_dashboard');

        Route::prefix('blog')->as('blog.')->group(function () {
            Route::resource('categories','BlogCategoryController');
            Route::resource('posts','BlogPostController');
            Route::resource('comments','BlogCommentController');
        });


        Route::prefix('course')->as('course.')->group(function () {
            Route::resource('categories','CourseCategoryController');
            Route::resource('details','CourseController');
            Route::get('sections/create/{id}','CourseSectionController@create')->name('sections.create');
            Route::resource('sections','CourseSectionController')->except(['create']);
            Route::resource('sections/resources','CourseSectionResourceController')->except(['index' , 'edit' , 'create']);
            Route::resource('comments','BlogCommentController');
            Route::get('/section/file/{id}', 'CourseSectionController@section_file')->name('sections.file');
        });

        Route::resource('orders','OrderController');
        Route::get('/orders/receipt/{id}/download', 'OrderController@download_receipt')->name('orders.receipts.download');
        Route::get('/orders/status/{id}', 'OrderController@status')->name('orders.status');

        Route::resource('bloggers','BloggersController');




        Route::resource('users','UsersController');
        Route::get('enrolled/users','UsersController@enrolled')->name('users.enrolled');
        Route::post('users/password/reset/{id}','UsersController@password_reset')->name('users.password_reset');

        Route::resource('transactions','TransactionsController')->only('show');
        Route::get('debit-transactions','TransactionsController@debit_index')->name('debit_trans');
        Route::get('credit-transactions','TransactionsController@credit_index')->name('credit_trans');

        Route::resource('investments','InvestmentsController')->only('index','show');
        Route::get('pending-investments','InvestmentsController@pending')->name('pending_investments');
        Route::post('approve-investments','InvestmentsController@approve')->name('approve_investments');
        Route::post('extend-investment-date','InvestmentsController@extendInvestmentDate')->name('extend_investment_date');

        Route::resource('withdrawals','WithdrawalsController')->only('index','show');
        Route::get('pending-withdrawals','WithdrawalsController@pending')->name('pending_withdrawals');
        Route::post('process-withdrawal','WithdrawalsController@process')->name('process_withdrawal');
        Route::post('cancel-withdrawal','WithdrawalsController@cancel')->name('cancel_withdrawal');
        Route::post('approve-withdrawal','WithdrawalsController@approve')->name('approve_withdrawal');

        Route::resource('coupons','CouponsController')->only('index','show','store');

        Route::resource('instructors','InstructorsController');
        Route::get('/instructor/requests', 'InstructorsController@requests')->name('instructors.requests');
        Route::get('/instructors/status', 'InstructorsController@status')->name('instructors.status');

        Route::resource('agents','AgentsController');
        Route::post('/refill-agent-wallet', 'AgentsController@refill_agent')->name('refill_agent');

        Route::resource('logs','LogsController');

        Route::get('/referrals-index', 'HomeController@referrals')->name('referrals.index');
        Route::resource('advertmedia','AdvertMediaController');


    });
});

Route::get('/barcode', 'Main\Profile@barcode')->name('barcode');

Route::get('/command', function() {
    $output = [];  //'--path' => 'vendor/laravel/passport/database/migrations'
    \Artisan::call('migrate', $output);
    dd($output);
});
