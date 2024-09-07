<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\PermitController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ChecklistController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LOTOStatusController;
use App\Http\Controllers\Admin\SubCategoryController;






// Route::get('/', [AuthController::class, 'login_admin']);
// Route::post('/', [AuthController::class, 'auth_login_admin']);
// Route::get('admin/logout', [AuthController::class, 'logout_admin']);

// Route::group(['middleware' => 'admin'], function () {

//     Route::get('admin/dashboard', [DashboardController::class, 'admin_dashboard']);
//     // Route::get('permit-user/dashboard', [DashboardController::class, 'user_dashboard']);

//     Route::get('admin/admin/list', [AdminController::class, 'list']);
//     Route::get('admin/admin/add', [AdminController::class, 'add']);
//     Route::post('admin/admin/add', [AdminController::class, 'insert']);
//     Route::get('admin/admin/edit/{id}', [AdminController::class, 'edit']);
//     Route::post('admin/admin/edit/{id}', [AdminController::class, 'update']);
//     Route::get('admin/admin/delete/{id}', [AdminController::class, 'delete']);

//     Route::get('admin/loto-permit/list', [PermitController::class, 'list']);
//     Route::get('admin/loto-permit/add', [PermitController::class, 'add']);
//     Route::post('admin/loto-permit/add', [PermitController::class, 'insert']);
//     Route::get('admin/loto-permit/form/{tag_number}', [PermitController::class, 'form']);
//     Route::post('admin/loto-permit/edit/{id}', [PermitController::class, 'update']);
//     Route::get('admin/loto-permit/delete/{id}', [PermitController::class, 'delete']);

// });


// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('storage-link', function () {
    Artisan::call('storage-link');
    return "Storage linked successfully";
});

Auth::routes();

Route::get('/login', [AuthController::class, 'login_admin'])->name('login');
Route::post('/login', [AuthController::class, 'auth_login_admin']);
Route::get('/', [AuthController::class, 'login_admin']);
Route::post('/', [AuthController::class, 'auth_login_admin']);
Route::get('admin/logout', [AuthController::class, 'logout_admin']);

//Users Routes
// Route::middleware(['auth', 'access-level: admin, user1, user2, user3'])->group(function () {


// });
Route::middleware(['auth', 'access-level:user1, user2, user3'])->group(function () {

    Route::get('user/dashboard', [DashboardController::class, 'user_dashboard']);

    Route::post('get_sub_category', [SubCategoryController::class, 'get_sub_category']);
    Route::post('admin/get_sub_category', [SubCategoryController::class, 'get_edit_sub_category']);

    Route::get('user/loto-permit/list', [PermitController::class, 'list_permit']);
    Route::get('user/loto-permit/add', [PermitController::class, 'add_permit'])->name('form-pengajuan');
    Route::post('user/loto-permit/add', [PermitController::class, 'new_permit']);
    Route::get('user/loto-permit/add/{id}', [PermitController::class, 'insert_permit']);
    Route::post('user/loto-permit/add/{id}', [PermitController::class, 'submit_permit']);
    Route::get('user/loto-permit/view/{id}', [PermitController::class, 'view_form']);

    Route::get('user/loto-permit/release-tagging/{id}', [PermitController::class, 'request_release']);
    Route::post('user/loto-permit/release-tagging/{id}', [PermitController::class, 'submit_release']);

    Route::get('user/loto-permit/tag_sheet/{id}', [PermitController::class, 'tag_sheet']);
    Route::get('user/loto-permit/op_sign/{id}', [PermitController::class, 'op_sign']);
    Route::post('user/loto-permit/view/{id}', [PermitController::class, 'op_sign']);
    Route::get('user/loto-permit/op_unsign/{id}', [PermitController::class, 'op_unsign']);
    Route::post('user/loto-permit/view/{id}', [PermitController::class, 'op_unsign']);

    Route::get('user/loto-permit/safety_sign/{id}', [PermitController::class, 'safety_sign']);
    Route::post('user/loto-permit/view/{id}', [PermitController::class, 'safety_sign']);
    Route::get('user/loto-permit/safety_unsign/{id}', [PermitController::class, 'safety_unsign']);
    Route::post('user/loto-permit/view/{id}', [PermitController::class, 'safety_unsign']);

    Route::get('user/loto-permit/op_sign_release/{id}', [PermitController::class, 'op_sign_release']);
    Route::post('user/loto-permit/view/{id}', [PermitController::class, 'op_sign_release']);
    Route::get('user/loto-permit/op_unsign_release/{id}', [PermitController::class, 'op_unsign_release']);
    Route::post('user/loto-permit/view/{id}', [PermitController::class, 'op_unsign_release']);

    Route::get('user/loto-permit/safety_sign_release/{id}', [PermitController::class, 'safety_sign_release']);
    Route::post('user/loto-permit/view/{id}', [PermitController::class, 'safety_sign_release']);
    Route::get('user/loto-permit/safety_unsign_release/{id}', [PermitController::class, 'safety_unsign_release']);
    Route::post('user/loto-permit/view/{id}', [PermitController::class, 'safety_unsign_release']);

    // Route::get('user/loto-permit/delete/{id}', [PermitController::class, 'delete']);
});

// Route::middleware(['auth', 'access-level:user2'])->group(function () {

//     Route::get('user/dashboard', [DashboardController::class, 'user_dashboard']);

//     Route::post('get_sub_category', [SubCategoryController::class, 'get_sub_category']);

//     Route::get('user/loto-permit/list', [PermitController::class, 'list_permit']);
//     Route::get('user/loto-permit/add', [PermitController::class, 'add_permit']);
//     Route::post('user/loto-permit/add', [PermitController::class, 'new_permit']);
//     Route::get('user/loto-permit/add/{id}', [PermitController::class, 'insert_permit']);
//     Route::post('user/loto-permit/add/{id}', [PermitController::class, 'submit_permit']);
//     Route::get('user/loto-permit/view/{id}', [PermitController::class, 'view_form']);
//     Route::post('user/loto-permit/view/{id}', [PermitController::class, 'op_sign']);
//     Route::get('user/loto-permit/delete/{id}', [PermitController::class, 'delete']);
// });

//Admin Routes
Route::middleware(['auth', 'access-level:admin'])->group(function () {

    Route::get('admin/dashboard', [DashboardController::class, 'admin_dashboard']);

    Route::get('admin/admin/list', [AdminController::class, 'list']);
    Route::get('admin/admin/add', [AdminController::class, 'add']);
    Route::post('admin/admin/add', [AdminController::class, 'insert']);
    Route::get('admin/admin/edit/{id}', [AdminController::class, 'edit']);
    Route::post('admin/admin/edit/{id}', [AdminController::class, 'update']);
    Route::get('admin/admin/delete/{id}', [AdminController::class, 'delete']);

    Route::get('admin/loto-permit/list', [PermitController::class, 'list']);
    Route::get('admin/loto-permit/add', [PermitController::class, 'add']);
    Route::post('admin/loto-permit/add', [PermitController::class, 'insert']);
    Route::get('admin/loto-permit/view/{id}', [PermitController::class, 'view_form']);
    Route::post('admin/loto-permit/view/{id}', [PermitController::class, 'update']);
    Route::get('admin/loto-permit/delete/{id}', [PermitController::class, 'delete']);

    Route::get('admin/category/list', [CategoryController::class, 'list']);
    Route::get('admin/category/add', [CategoryController::class, 'add']);
    Route::post('admin/category/add', [CategoryController::class, 'insert']);
    Route::get('admin/category/edit/{id}', [CategoryController::class, 'edit']);
    Route::post('admin/category/edit/{id}', [CategoryController::class, 'update']);
    Route::get('admin/category/delete/{id}', [CategoryController::class, 'delete']);

    Route::get('admin/sub_category/list', [SubCategoryController::class, 'list']);
    Route::get('admin/sub_category/add', [SubCategoryController::class, 'add']);
    Route::post('admin/sub_category/add', [SubCategoryController::class, 'insert']);
    Route::get('admin/sub_category/edit/{id}', [SubCategoryController::class, 'edit']);
    Route::post('admin/sub_category/edit/{id}', [SubCategoryController::class, 'update']);
    Route::get('admin/sub_category/delete/{id}', [SubCategoryController::class, 'delete']);


    Route::get('admin/color/list', [ColorController::class, 'list']);

    Route::get('admin/color/tag_color/add', [ColorController::class, 'add_tagcolor']);
    Route::post('admin/color/tag_color/add', [ColorController::class, 'insert_tagcolor']);
    Route::get('admin/color/tag_color/edit/{id}', [ColorController::class, 'edit_tagcolor']);
    Route::post('admin/color/tag_color/edit/{id}', [ColorController::class, 'update_tagcolor']);
    Route::get('admin/color/tag_color/delete/{id}', [ColorController::class, 'delete_tagcolor']);

    Route::get('admin/color/status_color/add', [ColorController::class, 'add_statuscolor']);
    Route::post('admin/color/status_color/add', [ColorController::class, 'insert_statuscolor']);
    Route::get('admin/color/status_color/edit/{id}', [ColorController::class, 'edit_statuscolor']);
    Route::post('admin/color/status_color/edit/{id}', [ColorController::class, 'update_statuscolor']);
    Route::get('admin/color/status_color/delete/{id}', [ColorController::class, 'delete_statuscolor']);


    Route::get('admin/checklist/list', [ChecklistController::class, 'list']);
    Route::get('admin/checklist/add', [ChecklistController::class, 'add']);
    Route::post('admin/checklist/add', [ChecklistController::class, 'insert']);
    Route::get('admin/checklist/edit/{id}', [ChecklistController::class, 'edit']);
    Route::post('admin/checklist/edit/{id}', [ChecklistController::class, 'update']);
    Route::get('admin/checklist/delete/{id}', [ChecklistController::class, 'delete']);

    Route::get('admin/loto_status/list', [LOTOStatusController::class, 'list']);
    Route::get('admin/loto_status/add', [LOTOStatusController::class, 'add']);
    Route::post('admin/loto_status/add', [LOTOStatusController::class, 'insert']);
    Route::get('admin/loto_status/edit/{id}', [LOTOStatusController::class, 'edit']);
    Route::post('admin/loto_status/edit/{id}', [LOTOStatusController::class, 'update']);
    Route::get('admin/loto_status/delete/{id}', [LOTOStatusController::class, 'delete']);

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
