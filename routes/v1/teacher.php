<?php
/**
 *File name : teacher.php  / Date: 9/19/2021 - 11:19 AM
 *Code Owner: Tke / Phone: 0367313134 / Email: thedc.it.94@gmail.com
 */

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'teacher', 'namespace' => '\App\Http\Controllers\Api\V1\Teacher'], function () {

    Route::group(['prefix' => 'course'], function () {
        Route::post('load', 'CourseController@load')->name('api.teacher.course.load');
        Route::post('create', 'CourseController@create')->name('api.teacher.course.create');
        Route::post('update', 'CourseController@update')->name('api.teacher.course.update');
        Route::post('delete', 'CourseController@delete')->name('api.teacher.course.delete');
        Route::post('detail', 'CourseController@detail')->name('api.admin.course.detail');
        Route::group(['prefix' => 'enroll'], function () {
            Route::post('', 'CourseEnrollController@index')->name('api.teacher.course.enroll.index');
            Route::post('add_single', 'CourseEnrollController@addSingle')->name('api.teacher.course.enroll.add_single');
            Route::post('add_multiple', 'CourseEnrollController@addMultiple')->name('api.teacher.course.enroll.add_multiple');
            Route::post('delete', 'CourseEnrollController@delete')->name('api.teacher.course.enroll.delete');
            Route::post('search-students', 'CourseEnrollController@searchStudents')->name('api.teacher.course.enroll.search-students');
        });
        Route::group(['prefix' => 'module'], function () {
            Route::post('get_list_module_label', 'CourseModuleController@getListModule')->name('api.teacher.course.module.get_list_module_label');
            Route::post('add_module_label', 'CourseModuleController@addModuleLabel')->name('api.teacher.course.module.add_module_label');
            Route::post('update_module_label', 'CourseModuleController@updateModuleLabel')->name('api.teacher.course.module.update_module_label');
            Route::post('sort_module', 'CourseModuleController@sortModule')->name('api.teacher.course.module.sort_module');

            Route::post('list_game_of_module', 'CourseModuleController@listGameOfModule')->name('api.teacher.course.module.list_game_of_module');
            Route::post('add_game', 'CourseModuleController@addGameToCourse')->name('api.teacher.course.module.add_game');
            Route::post('delete_game', 'CourseModuleController@update')->name('api.teacher.course.module.delete_game');
            Route::post('update', 'CourseModuleController@update')->name('api.teacher.course.module.update');
            Route::post('sort_game_of_module', 'CourseModuleController@sortGameOfModule')->name('api.admin.course.module.sort_game_of_module');
        });
        Route::group(['prefix' => 'grade'], function () {
            Route::post('', 'CourseGradeController@index')->name('api.teacher.course.grade.index');
        });
    });
    Route::post('get_list_game', 'CourseModuleController@getListGame')->name('api.teacher.get_list_game');
    Route::group(['prefix' => 'question_bank'], function () {
        Route::group(['prefix' => 'category'], function () {
            Route::post('get_list', 'QuestionCategoryController@getListData')->name('api.teacher.question_bank.category.get_list');
            Route::post('create', 'QuestionCategoryController@create')->name('api.teacher.question_bank.category.create');
            Route::post('update', 'QuestionCategoryController@update')->name('api.teacher.question_bank.category.update');
            Route::post('delete', 'QuestionCategoryController@delete')->name('api.teacher.question_bank.category.delete');
            Route::post('get_by_id', 'QuestionCategoryController@getById')->name('api.teacher.question_bank.category.get_by_id');
        });
        Route::group(['prefix' => 'question'], function () {
            Route::post('get_list', 'QuestionController@getListData')->name('api.teacher.question_bank.question.get_list');
            Route::post('create', 'QuestionController@createQuestion')->name('api.teacher.question_bank.question.create');
            Route::post('update', 'QuestionController@update')->name('api.teacher.question_bank.question.update');
            Route::post('delete', 'QuestionController@delete')->name('api.teacher.question_bank.question.delete');
            Route::post('get_by_id', 'QuestionController@getById')->name('api.teacher.question_bank.question.get_by_id');
        });
    });
    Route::group(['prefix' => 'quiz'], function () {
        Route::post('get_list', 'QuizController@getListData')->name('api.teacher.question_bank.quiz.get_list');
        Route::post('create', 'QuizController@create')->name('api.teacher.question_bank.quiz.create');
        Route::post('gen_code', 'QuizController@genCode')->name('api.teacher.question_bank.quiz.gen_code');
        Route::post('update', 'QuizController@update')->name('api.teacher.question_bank.quiz.update');
        Route::post('delete', 'QuizController@delete')->name('api.teacher.question_bank.quiz.delete');
        Route::post('detail', 'QuizController@detail')->name('api.teacher.quiz.detail');
        Route::post('student_in_quiz', 'QuizController@viewAllStudentInQuiz')->name('api.teacher.quiz.student_in_quiz');
        Route::post('assignment_detail', 'QuizController@assignmentDetail')->name('api.teacher.quiz.assignment_detail');
    });
    Route::group(['prefix' => 'assignment'], function () {
        Route::post('get_list', 'AssignmentController@getListData')->name('api.teacher.question_bank.assignment.get_list');
        Route::post('create', 'AssignmentController@create')->name('api.teacher.question_bank.assignment.create');
        Route::post('update', 'AssignmentController@update')->name('api.teacher.question_bank.assignment.update');
        Route::post('delete', 'AssignmentController@delete')->name('api.teacher.question_bank.assignment.delete');
        Route::post('publish_assignment', 'AssignmentController@publishAssignment')->name('api.teacher.assignment.publish_assignment');
        Route::post('grade_assignment', 'AssignmentController@gradeAssignment')->name('api.teacher.assignment.grade_assignment');

        Route::post('history_assignment', 'AssignmentController@historyAssignment')->name('api.teacher.assignment.history_assignment');
        Route::post('detail_assignment', 'AssignmentController@detailAssignment')->name('api.teacher.assignment.detail_assignment');
    });
});
