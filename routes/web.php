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






Route::get('/','FrontController@index')->name('index');
Route::get('/courseDetail/{course}','FrontController@ShowCourse')->name('courseDetail');
Route::get('/category/{id}','FrontController@categories')->name('category');
Route::get('/showcase','MyCourseController@showcase')->name('data.showcase');

Auth::routes();


//Route Student
Route::group(['middleware' => ['auth','checkRole:student']], function ()
    {
        Route::get('/my-course','MyCourseController@index')->name('profile');
        Route::get('/my-course/account','MyCourseController@account')->name('user.account');
        Route::post('/my-course/update/{id}','MyCourseController@resetPassword')->name('account.update');
        Route::post('/user-update/update/{id}','MyCourseController@update')->name('update.user');
        Route::get('/my-course/{id}','MyCourseController@showCourse')->name('myCourse.show');
        Route::get('/getcertificate/certificate','MyCourseController@getCertificate')->name('myCourse.certicifate');
        Route::post('/storecertificate','MyCourseController@storeCertificate')->name('store.certicifate');
        Route::get('/project','MyCourseController@getProject')->name('data.Project');
        Route::get('/project/{id}/edit','MyCourseController@editProject')->name('edit.data.Project');
        Route::put('/project/{id}','MyCourseController@updateProject')->name('update.data.Project');
        Route::delete('/project/{id}','MyCourseController@destroyProject')->name('data.destroy.project');
        Route::get('/lesson/{id}', 'LessonController@index')->name('lesson');
        Route::get('/lesson/{id}/{lessonid}', 'LessonController@show')->name('show');
        Route::post('/order/{id}','FrontController@order')->name('order');
        Route::get('/checkout','FrontController@checkout')->name('checkout');
        Route::delete('/checkout/{id}','FrontController@checkout_destroy')->name('checkout.delete');
        Route::get('/confirm-checkout','FrontController@checkout_confirm')->name('checkout.confirm');
        Route::get('/history','FrontController@history_transaction')->name('history.transaction');
        Route::get('/history/{id}','FrontController@history_detail')->name('history.detail');
        Route::post('review', 'ReviewController@store')->name('review.store');
    }
);

//Route Mentor
Route::group(['middleware' => ['auth','checkRole:mentor']], function ()
{
    Route::get('/dashboard','MentorController@index')->name('mentor.dashboard');
//MentorCrudCourse
    Route::get('/showCourse','MentorController@showMentorCourse')->name('mentor.course');
    Route::get('/revenue','MentorController@revenue')->name('mentor.revenue');
    Route::get('/createCourse','MentorController@createCourse')->name('mentor.create.course');
    Route::post('/storeCourse','MentorController@storeCourse')->name('mentor.store.course');
    Route::get('/editCourse/{id}/edit','MentorController@editCourse')->name('mentor.edit.course');
    Route::put('/updateCourse/{id}','MentorController@updateCourse')->name('mentor.update.course');
    Route::delete('/destroyCourse/{id}','MentorController@destroyCourse')->name('mentor.destroy.course');

//MentorCrudChapter
    Route::get('/showChapter','MentorController@showChapter')->name('mentor.chapter');
    Route::get('/createChapter','MentorController@createChapter')->name('mentor.create.chapter');
    Route::post('/storeChapter','MentorController@storeChapter')->name('mentor.store.chapter');
    Route::get('/editChapter/{id}/edit','MentorController@editChapter')->name('mentor.edit.chapter');
    Route::put('/updateChapter/{id}','MentorController@updateChapter')->name('mentor.update.chapter');
    Route::delete('/destroyChapter/{id}','MentorController@destroyChapter')->name('mentor.destroy.chapter');

//MentorCrudLesson
    Route::get('/showLesson','MentorController@showLesson')->name('mentor.lesson');
    Route::get('/createLesson','MentorController@createLesson')->name('mentor.create.lesson');
    Route::post('/storeLesson','MentorController@storeLesson')->name('mentor.store.lesson');
    Route::get('/editLesson/{id}/edit','MentorController@editLesson')->name('mentor.edit.lesson');
    Route::put('/updateLesson/{id}','MentorController@updateLesson')->name('mentor.update.lesson');
    Route::delete('/destroyLesson/{id}','MentorController@destroyLesson')->name('mentor.destroy.lesson');

//UpdatePassword
    Route::get('/myMentor/account','MentorController@account')->name('mentor.account');
    Route::put('/myMentor/update/{id}','MentorController@updateMentor')->name('mentor.account.update');
    Route::get('/mentorPassword/password','MentorController@password')->name('mentor.password');
    Route::put('/mentorPassword/update/{id}','MentorController@resetPassword')->name('mentor.password.update');
}
);

//Route Admin
Route::group(['namespace' => 'admin', 'prefix' => 'admin', 'middleware' => ['auth','checkRole:admin']], function ()
    {
        
        Route::get('dashboard', 'DashboardController@index')->name('dashboard.index');
        Route::resource('category', 'CategoryController');
        Route::resource('course', 'CourseController');
        Route::resource('mentor', 'MentorController');
        Route::resource('chapter', 'ChapterController');
        Route::resource('lesson', 'LessonController');
        Route::resource('user-admin', 'UserController');
        Route::resource('transaction', 'TransactionController');
        Route::resource('setting', 'SettingController');
        Route::get('/admin/password','UserController@password')->name('admin.password');
        Route::put('/admin/update/{id}','UserController@ressetPassword')->name('admin.password.update');
        Route::get('/certificate','TransactionController@certificate')->name('certificate.index');
        Route::get('/certificate/{id}','TransactionController@certificateEdit')->name('certificate.edit');
        Route::put('/certificate/{id}','TransactionController@certificateUpdate')->name('certificate.update');
      
    }
);





Route::get('/home', 'HomeController@index')->name('home');
