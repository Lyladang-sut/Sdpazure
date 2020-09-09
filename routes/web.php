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

Auth::routes();
Route::get('/404', function(){
    return view('unauthorized');
})->name('404');

Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'user'], function () {
        Route::get('/', function () {
            $data = [
                'institutions'  => \App\TrainingProvider::all(),
                'courses'       => \App\CourseTopic::all(),
                'provinces'     => \App\Province::all(),
                'districts'     => \App\District::select('District', 'Province')->get()->groupBy('Province'),
                'batches'       => \App\BatchId::all(),
            ];
            return view('trainee.index')->with($data);
        })->name('home');

        Route::resource('trainee', 'TraineeController');
        Route::get('trainee/{trainee}/delete', 'TraineeController@Delete')->name('trainee.delete');
        Route::post('trainee/existedtrainee', 'TraineeController@getExistedTrainee')->name('trainee.existeddata');
        Route::get('trainee/{id}/edit/{section}', 'TraineeController@edit')->name('trainee.edit.section');
        Route::put('trainee/{id}/update/{section}', 'TraineeController@update')->name('trainee.update.section');
        Route::put('trainee/{id}/updatehousehold/{section}', 'TraineeController@householdUpdate')->name('trainee.updatehousehold.section');
        Route::put('trainee/{id}/updateregistration/{section}', 'TraineeController@registrationUpdate')->name('trainee.updateregistration.section');
        Route::get('/datatable/trainee', 'TraineeController@Datatable')->name('trainee.datatable');
        Route::get('/trainee/{id}/household', 'HouseholdController@create')->name('trainee.household');
        Route::put('/household/update', 'HouseholdController@update')->name('household.update');
        Route::put('/registration/update', 'TraineeController@registration')->name('registration.update');
        Route::resource('trainingaccess', 'TrainingAccessController');
        Route::resource('posttrainingsupport', 'PostTrainingSupportController');
        Route::resource('posttrainingemployment', 'PostTrainingEmploymentController');

        Route::resource('enterprise', 'EnterpriseController');
        Route::get('enterprise/{enterprise}/delete', 'EnterpriseController@Delete')->name('enterprise.delete');
        Route::get('enterprise/{id}/edit/{section}', 'EnterpriseController@edit')->name('enterprise.edit.section');
        Route::get('/datatable/enterprise', 'EnterpriseController@Datatable')->name('enterprise.datatable');
        Route::resource('enterpriseemployment', 'EnterpriseEmploymentController');
        Route::resource('enterprisecontact', 'EnterpriseContactController');
        Route::resource('enterpriseassessor', 'EnterpriseAssessorController');
        Route::resource('enterpriserecruitment', 'EnterpriseRecruitmentController');


        Route::resource('industry', 'IndustryController');
        Route::get('/industry/{industry}/delete', 'IndustryController@Delete')->name('industry.delete');
        Route::get('industry/{id}/edit/{section}', 'IndustryController@edit')->name('industry.edit.section');
        Route::get('/datatable/industry', 'IndustryController@Datatable')->name('industry.datatable');
        Route::resource('omtrainer', 'OMTrainerExperienceController');
        Route::resource('emptrain', 'OMEmpTrainController');
        Route::resource('industrytraining', 'OMTrainingAccessController');
        Route::resource('ownermanager', 'OwnerManagerController');
    });

    Route::group(['middleware' => 'sdp'], function () {

        Route::resource('provider', 'TrainingProviderController');
        Route::get('provider/{id}/edit/{section}', 'TrainingProviderController@edit')->name('provider.edit.section');
        Route::put('provider/{id}/update/{section}', 'TrainingProviderController@update')->name('provider.update.section');
        Route::get('/provider/{provider}/delete', 'TrainingProviderController@Delete')->name('provider.delete');
        Route::get('/datatable/provider', 'TrainingProviderController@Datatable')->name('provider.datatable');
        Route::resource('providercontact', 'ProviderContactController');
        Route::resource('providertrainer', 'ProviderTrainerController');
        Route::resource('providerassessor', 'ProviderAssessorController');

        Route::resource('tot', 'TOTController');
        Route::get('/tot/{tot}/delete', 'TOTController@Delete')->name('tot.delete');
        Route::get('/datatable/tot', 'TOTController@Datatable')->name('tot.datatable');
        Route::resource('tottraining', 'TOTTrainingController');

        Route::resource('toa', 'TOAController');
        Route::get('/toa/{toa}/delete', 'TOAController@Delete')->name('toa.delete');
        Route::get('/datatable/toa', 'TOAController@Datatable')->name('toa.datatable');

        Route::resource('rpl', 'RPLController');
        Route::get('/rpl/{rpl}/delete', 'RPLController@Delete')->name('rpl.delete');
        Route::get('/datatable/rpl', 'RPLController@Datatable')->name('rpl.datatable');
    });

    Route::group(['middleware' => 'administrator'], function () {

        Route::resource('user', 'UserController');
        Route::get('/user/{user}/delete', 'UserController@Delete')->name('user.delete');
        Route::get('/datatable/user', 'UserController@Datatable')->name('user.datatable');

        Route::resource('trainer-survey', 'TrainerSurveyController');
        Route::get('trainer-survey/{id}/delete', 'TrainerSurveyController@Delete')->name('trainer-survey.delete');
        Route::get('/datatable/trainer-survey', 'TrainerSurveyController@Datatable')->name('trainer-survey.datatable');

        Route::resource('course-survey', 'CourseSurveyController');
        Route::get('/course-survey/{id}/delete', 'CourseSurveyController@Delete')->name('course-survey.delete');
        Route::get('/datatable/course-survey', 'CourseSurveyController@Datatable')->name('course-survey.datatable');

        Route::resource('manual-result', 'ManualResultController');
        Route::get('/datatable/manual-result', 'ManualResultController@Datatable')->name('manual-result.datatable');
        Route::get('/manual-result/{id}/delete', 'ManualResultController@Delete')->name('manual-result.delete');
        Route::get('manual-result/{id}/edit/{section}', 'ManualResultController@edit')->name('manual-result.edit.section');

        Route::get('/address/province', 'AddressController@province')->name('address.province');
        Route::get('/address/province/{province}', 'AddressController@district')->name('address.district');
        Route::get('/address/province/{province}/district/{district}', 'AddressController@commune')->name('address.commune');
        Route::get('/address/province/{province}/district/{district}/commune/{commune}', 'AddressController@village')->name('address.village');

        Route::get('course/topics', 'CourseController@CourseTopics');
        Route::get('course/topic/{fuck}/courses', 'CourseController@CoursesByTopic');

        Route::get('imagegenerate', function () {
	
            /* php artisan migrate */
            \Artisan::call('traineeimage:convert');
            \Artisan::call('psimage:convert');
            dd("Done");
        });

        Route::get('cache/clear', function () {
	
            /* php artisan migrate */
            \Artisan::call('config:cache');
          
            dd("Cache clear");
        });
        
    });
    Route::get('/logout', 'Auth\LoginController@logout')->name('logout' );
});

Route::get('/home', 'HomeController@index');
