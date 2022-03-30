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

// Frontend
Route::get('/', [FrontendController::class, 'Index']);
Route::get('/related-organizations/{slug}', [FrontendController::class, 'RelatedOrganizations']);
Route::get('/org-details/{org_name}', [FrontendController::class, 'OrgDetails']);
Route::get('/user-posted/{org_name}', [FrontendController::class, 'userposted']);
Route::post('/user-register', [FrontendController::class, 'userRegister']);

Route::get('/add-orgs', [FrontendController::class, 'addorgs']);
Route::post('/post-orgs', [FrontendController::class, 'postorgs']);
Route::get('/view-orgs', [FrontendController::class, 'vieworgs'])->name('vieworgs');
Route::get('/org-overview/{org_name}', [FrontendController::class, 'OrgOverview']);
Route::get('/edit-org-info/{org_name}', [FrontendController::class, 'EditInfo']);
Route::post('/update-org-info', [FrontendController::class, 'UpdateOrgInfo']);
Route::get('/delete-org-info/{id}', [FrontendController::class, 'DeleteOrgInfo']);

//Backend
Route::get('/admin-dashboard', [BackendController::class, 'AdminDashboard']);
Route::get('/dashboard/{name}', [BackendController::class, 'EmployeeDashboard']);
Route::get('/profile/{email}', [BackendController::class, 'UserProfile']);
Route::post('/update-photo', [BackendController::class, 'UpdatePhoto']);
Route::get('/edit-info/{email}', [BackendController::class, 'EditInfo']);
Route::post('/update-info', [BackendController::class, 'updateinfo']);

Route::get('/user-posted-orgs', [BackendController::class, 'userpostedorgs'])->name('userpostedorgs');
Route::get('/user-posted-org/{id}', [BackendController::class, 'userpostedorg']);
Route::post('/change-status', [BackendController::class, 'changeStatus']);
Route::get('/delete-posted-org/{id}', [BackendController::class, 'DeletePostedOrg']);

// - Category / Goal
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

// USER LIST
Route::get('/admin-list', [BackendController::class, 'AdminList']);
Route::get('/employer-list', [BackendController::class, 'EmployeeList']);
Route::get('/candidate-list', [BackendController::class, 'CandidateList']);
Route::post('/update-user-type', [BackendController::class, 'UpdateUserType']);
Route::get('/delete-user/{id}', [BackendController::class, 'DeleteUser']);
