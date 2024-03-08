<?php

use App\Http\Controllers\PaymentGateways\FlutterwaveController;
use App\Http\Controllers\PaymentGateways\MollieController;
use App\Http\Controllers\PaymentGateways\RazorpayController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\VerifyCsrfToken;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PaginationController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PaymentGateways\PaypalController;
use App\Http\Controllers\PaymentGateways\SSLCommerzController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;

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

// Route::get('/', function () {
//     return view('landing');
// })->name('landing');

Route::get('/', [CategoryController::class, 'manage'])->name('category-page');
Route::get('/add', [CategoryController::class, 'add'])->name('category-add');
Route::post('/store', [CategoryController::class, 'store'])->name('category-store');
Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category-edit');
Route::post('/update/{id}', [CategoryController::class, 'update'])->name('category-update');
Route::post('/delete/{id}', [CategoryController::class, 'delete'])->name('category-delete');


Route::get('/sub-category', [SubCategoryController::class, 'manage'])->name('sub-category-page');
Route::get('/sub-category/add', [SubCategoryController::class, 'add'])->name('sub-category-add');
Route::post('/sub-category/store', [SubCategoryController::class, 'store'])->name('sub-category-store');
Route::get('/sub-category/edit/{id}', [SubCategoryController::class, 'edit'])->name('sub-category-edit');
Route::post('/sub-category/update/{id}', [SubCategoryController::class, 'update'])->name('sub-category-update');
Route::post('/sub-category/delete/{id}', [SubCategoryController::class, 'delete'])->name('sub-category-delete');



// Route::get('/add-category', function () {
//     $view = view('admin.components.category-form-modal')->render();
//     return response()->json([
//         'view' => $view
//     ]);
// })->name('course_category.create');

// Route::get('/sub-category', function () {
//     return view('admin.pages.course.course_sub_category');
// })->name('subcategory-page');

// Route::get('/add-sub-category', function () {
//     $view = view('admin.components.sub-category-form-modal')->render();
//     return response()->json([
//         'view' => $view
//     ]);
// })->name('course_sub_category.create');
