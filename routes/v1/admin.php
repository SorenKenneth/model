<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'namespace' => '\App\Http\Controllers\Api\V1\Admin'], function () {
    Route::group(['prefix' => 'game'], function () {
        Route::post('', 'GameController@index')->name('api.admin.game.index');
        Route::post('create', 'GameController@create')->name('api.admin.game.create');
        Route::post('update', 'GameController@update')->name('api.admin.game.update');
        Route::post('delete', 'GameController@delete')->name('api.admin.game.delete');
        Route::post('course', 'GameController@course')->name('api.admin.game.course');
        Route::post('plays', 'GameController@plays')->name('api.admin.game.plays');
    });
    Route::group(['prefix' => 'user'], function () {
        Route::post('', 'UserController@index')->name('api.admin.user.index');
        Route::post('create', 'UserController@create')->name('api.admin.user.create');
        Route::post('detail', 'UserController@detail')->name('api.admin.user.detail');
        Route::post('update', 'UserController@update')->name('api.admin.user.update');
        Route::post('change_password', 'UserController@changePassword')->name('api.admin.user.change_password');
        Route::post('change_status', 'UserController@changeStatus')->name('api.admin.user.change_status');
        Route::post('delete', 'UserController@delete')->name('api.admin.user.delete');
    });

    Route::group(['prefix' => 'moet-unit'], function () {
        Route::post('/', 'MoetUnitController@index')->name('api.admin.moet-unit.index');
        Route::post('create', 'MoetUnitController@create')->name('api.admin.moet-unit.create');
        Route::post('update', 'MoetUnitController@update')->name('api.admin.moet-unit.update');
        Route::get('detail/{id}', 'MoetUnitController@detail')->name('api.admin.moet-unit.detail');
        Route::post('delete', 'MoetUnitController@delete')->name('api.admin.moet-unit.delete');
        Route::post('/enroll-students', 'MoetUnitController@enrollStudents')->name('api.admin.moet-unit.enroll-students');
    });

    Route::group(['prefix' => 'course'], function () {
        Route::post('index', 'CourseController@index')->name('api.admin.course.index');
        Route::post('create', 'CourseController@create')->name('api.admin.course.create');
        Route::post('update', 'CourseController@update')->name('api.admin.course.update');
        Route::post('delete', 'CourseController@delete')->name('api.admin.course.delete');
        Route::post('detail', 'CourseController@detail')->name('api.admin.course.detail');
        Route::group(['prefix' => 'enroll'], function () {
            Route::post('', 'CourseEnrollController@index')->name('api.admin.course.enroll.index');
            Route::post('add_single', 'CourseEnrollController@addSingle')->name('api.admin.course.enroll.add_single');
            Route::post('add_multiple', 'CourseEnrollController@addMultiple')->name('api.admin.course.enroll.add_multiple');
            Route::post('delete', 'CourseEnrollController@delete')->name('api.admin.course.enroll.delete');
            Route::post('search-students', 'CourseEnrollController@searchStudents')->name('api.admin.course.enroll.search-students');
        });
        Route::group(['prefix' => 'module'], function () {
            Route::post('get_list_module_label', 'CourseModuleController@getListModuleLabel')->name('api.admin.course.module.get_list_module_label');
            Route::post('add_module_label', 'CourseModuleController@addModuleLabel')->name('api.admin.course.module.add_module_label');
            Route::post('update_module_label', 'CourseModuleController@updateModuleLabel')->name('api.admin.course.module.update_module_label');
            Route::post('sort_module', 'CourseModuleController@sortModule')->name('api.admin.course.module.sort_module');

            Route::post('list_game_of_module', 'CourseModuleController@listGameOfModule')->name('api.admin.course.module.list_game_of_module');
            Route::post('add_game', 'CourseModuleController@addGameToCourse')->name('api.admin.course.module.add_game');
            Route::post('delete_game', 'CourseModuleController@update')->name('api.admin.course.module.delete_game');
            Route::post('update', 'CourseModuleController@update')->name('api.admin.course.module.update');
            Route::post('sort_game_of_module', 'CourseModuleController@sortGameOfModule')->name('api.admin.course.module.sort_game_of_module');
        });
        Route::group(['prefix' => 'grade'], function () {
            Route::post('', 'CourseGradeController@index')->name('api.admin.course.grade.index');
        });
        Route::group(['prefix' => 'gradebook'], function () {
            Route::post('', 'CourseGradeBookController@index')->name('api.admin.course.enroll.index');
            Route::post('export', 'CourseGradeBookController@export')->name('api.admin.course.gradebook.export');
        });
    });

    Route::group(['prefix' => 'school-year'], function () {
        Route::post('/', 'SchoolYearController@index')->name('api.admin.school-year.index');
        Route::post('create', 'SchoolYearController@create')->name('api.admin.school-year.create');
        Route::post('update', 'SchoolYearController@update')->name('api.admin.school-year.update');
        Route::get('edit/{id}', 'SchoolYearController@edit')->name('api.admin.school-year.edit');
        Route::post('delete', 'SchoolYearController@delete')->name('api.admin.school-year.delete');
    });

    Route::group(['prefix' => 'school-year'], function () {
        Route::post('/', 'SchoolYearController@index')->name('api.admin.school-year.index');
        Route::post('create', 'SchoolYearController@create')->name('api.admin.school-year.create');
        Route::post('update', 'SchoolYearController@update')->name('api.admin.school-year.update');
        Route::get('detail/{id}', 'SchoolYearController@detail')->name('api.admin.school-year.detail');
        Route::post('delete', 'SchoolYearController@delete')->name('api.admin.school-year.delete');
    });

    Route::post('get_list_game', 'CourseModuleController@getListGame')->name('api.admin.get_list_game');

    Route::group(['prefix' => 'grade-level'], function () {
        Route::post('/', 'GradeLevelController@index')->name('api.admin.grade-level.index');
    });

    Route::group(['prefix' => 'grades'], function () {
        Route::post('/', 'GradeController@index')->name('api.admin.grade.index');
        Route::post('create', 'GradeController@create')->name('api.admin.grade.create');
        Route::post('update', 'GradeController@update')->name('api.admin.grade.update');
        Route::get('detail/{id}', 'GradeController@detail')->name('api.admin.grade.detail');
        Route::post('delete', 'GradeController@delete')->name('api.admin.grade.delete');
    });

    Route::group(['prefix' => 'subjects'], function () {
        Route::post('/', 'SubjectController@index')->name('api.admin.subject.index');
        Route::post('create', 'SubjectController@create')->name('api.admin.subject.create');
        Route::post('update', 'SubjectController@update')->name('api.admin.subject.update');
        Route::post('add-grade/{subject_id}', 'SubjectController@addGrade')->name('api.admin.subject.update');
        Route::get('detail/{id}', 'SubjectController@detail')->name('api.admin.subject.detail');
        Route::get('grade/{subject_id}', 'SubjectController@grade')->name('api.admin.subject.grade');
        Route::post('delete', 'SubjectController@delete')->name('api.admin.subject.delete');
    });

    Route::group(['prefix' => 'roles'], function () {
        Route::post('/', 'RoleController@index')->name('api.admin.role.index');
        Route::post('create', 'RoleController@create')->name('api.admin.role.create');
        Route::post('update', 'RoleController@update')->name('api.admin.role.update');
        Route::post('delete', 'RoleController@delete')->name('api.admin.role.delete');
        Route::post('add-moetunit-user', 'RoleController@addMoetUnitUser')->name('api.admin.role.add-moetunit');

        Route::group(['prefix' => 'moet-unit/{id}'], function () {
            Route::get('/', 'RoleController@roleByMoetUnit')->name('api.admin.role.moet-unit.index');
            Route::post('add-user', 'RoleController@addUserToRole')->name('api.admin.role.moet-unit.add-user.index');
            Route::post('/{role_id}', 'RoleController@getUserByRole')->name('api.admin.role.moet-unit-user.index');
            Route::post('/{role_id}/get-user-not-assign', 'RoleController@getUserNotAssignRole')->name('api.admin.role.moet-unit.get-user-not-assign.index');
        });
    });
});
