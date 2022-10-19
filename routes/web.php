<?php

use App\Models\Cat;
use App\Models\Student;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/students', function () {
    return view('students', [
        'students' => Student::list()
    ]);
});


Route::get('/students/{id}', function ($id) {
    return view('student', [
        'student' => Student::getById($id)
    ]);
});

Route::get('/cats', function () {
    $cats = [];
    $colors = ['red', 'blue', 'green', 'yellow', 'black', 'white'];
    for ($i = 0; $i < 10; $i++) {
        $cat = new Cat();
        $cat->setColor($colors[rand(0, 5)]);
        $cat->setEyesNumber(rand(0, 3));
        $cat->setTailsNumber(rand(0, 9));
        $cats[] = $cat;
    }
    return view('cats', [
        'cats' => $cats
    ]);
});
