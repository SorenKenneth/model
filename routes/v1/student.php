<?php
/**
 *File name : student.php  / Date: 9/24/2021 - 12:10 AM
 *Code Owner: Tke / Phone: 0367313134 / Email: thedc.it.94@gmail.com
 */

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'student', 'namespace' => '\App\Http\Controllers\Api\V1\Student'], function () {

    Route::group(['prefix' => 'course'], function () {
        Route::post('load', 'StudentCourseController@load')->name('api.student.course.load');
        Route::post('enroll-course', 'StudentCourseController@enrollCourse')->name('api.student.course.enroll-course');
        Route::post('list-grade-of-student-in-course', 'StudentCourseGradeController@getGradeOfStudentInCourse')->name('api.student.course.list-grade-of-student-in-course');
    });

    Route::group(['prefix' => 'game'], function () {
        Route::post('load', 'GameController@load')->name('api.student.game.load');
    });

    Route::group(['prefix' => 'assignment'], function () {
        Route::post('get_list_quiz', 'AssignmentController@getListQuiz')->name('api.student.assignment.get_list_quiz');
        Route::post('start_assignment', 'AssignmentController@startAssignment')->name('api.student.assignment.start_assignment');
        Route::post('detail_quiz', 'AssignmentController@detailQuiz')->name('api.student.assignment.detail_quiz');
        Route::post('info_assignment', 'AssignmentController@infoAssignment')->name('api.student.assignment.info_assignment');
        Route::post('save_draf', 'AssignmentController@saveDraf')->name('api.student.assignment.save_draf');
        Route::post('submit_assignment', 'AssignmentController@submitAssignment')->name('api.student.assignment.submit_assignment');
        Route::post('history_assignment', 'AssignmentController@historyAssignment')->name('api.student.assignment.history_assignment');
        Route::post('detail_assignment', 'AssignmentController@detailAssignment')->name('api.student.assignment.detail_assignment');
    });
});
