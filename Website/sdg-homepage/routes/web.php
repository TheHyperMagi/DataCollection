<?php

use App\Http\Controllers\BackendController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\OrganizationController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::get('/', [FrontendController::class, 'Index']);
//Route::post('/sign-up', [FrontendController::class, 'SignUp']);
Route::get('/related-organizations/{slug}', [FrontendController::class, 'RelatedOrganizations']);
Route::get('/org-details/{org_name}', [FrontendController::class, 'OrgDetails']);

Route::get('/admin-dashboard', [BackendController::class, 'AdminDashboard']);
Route::get('/employee-dashboard/{name}', [BackendController::class, 'EmployeeDashboard']);
Route::get('/candidate-dashboard/{name}', [BackendController::class, 'CandidateDashboard']);

// Category / Goal
Route::get('/add-category', [CategoryController::class, 'AddCategory']);
Route::post('/post-category', [CategoryController::class, 'PostCategory']);
Route::get('/view-category', [CategoryController::class, 'ViewCategory'])->name('ViewCategory');
Route::get('/edit-category/{slug}', [CategoryController::class, 'EditCategory']);
Route::post('/update-category', [CategoryController::class, 'UpdateCategory']);
Route::get('/delete-category/{slug}', [CategoryController::class, 'DeleteCategory']);

// organizations
Route::get('/add-organization', [OrganizationController::class, 'AddOrganizations']);
Route::post('/post-organization', [OrganizationController::class, 'PostOrganizations']);
Route::get('/view-organization', [OrganizationController::class, 'ViewOrganizations']);
Route::get('/edit-organization/{id}', [OrganizationController::class, 'EditOrganizations']);
Route::post('/update-organization', [OrganizationController::class, 'UpdateOrganizations']);
Route::get('/delete-organization/{id}', [OrganizationController::class, 'DeleteOrganizations']);
