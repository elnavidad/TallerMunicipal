<?php
use App\Http\Controllers\DependencyController;

Route::get('/', function(){
    return redirect('/login');
});
Auth::routes();
Route::prefix('admin')->group(function () {
    Route::get('/checksession', 'AdminController@checkSession')->name('admin.check_session');
    Route::middleware(['auth'])->group(function () {
        Route::get('/', 'AdminController@index')->name('admin.index');
        Route::get('notfound', 'AdminController@notfound')->name('admin.not_found');
        Route::post('breadcrumbs', 'AdminController@breadcrumbs')->name('admin.breadcrumbs');
        Route::post('cacheBuster', 'AdminController@cacheBuster')->name('admin.cache_buster');
        Route::get('defaultState', 'AdminController@defaultState')->name('admin.default_state');

        Route::get('user/changePassword','UserController@changePassword')->name('admin.changePassword');
        Route::put('user/changePassword','UserController@updatePassword')->name('admin.updatePassword');
        
        Route::middleware(['permission'])->group(function () {

            Route::prefix('user')->group(function () {
                Route::put('{user}/active','UserController@toggleActive')->name('user.active');
                Route::get('userexists','UserController@userexists')->name('user.exists');
                Route::get('dependencies','DependencyController@datatable')->name('user.dependencies');
                Route::get('roles','RoleController@datatable')->name('user.roles');
                Route::get('departments','DepartmentController@datatable')->name('user.departments');
            });
            Route::resource('user','UserController');
            
            Route::prefix('role')->group(function () {
                Route::put('{id}/active','RoleController@toggleActive')->name('role.active');
            });
            Route::resource('role','RoleController');
        
            Route::prefix('permission')->group(function () {
                Route::get('icons','PermissionController@icons')->name('permission.icons');
                Route::put('priority','PermissionController@updatePriority')->name('permission.priotity');
                Route::get('menu_builder', 'PermissionController@getMenuBuilder')->name('permission.menu_builder');
                Route::get('role_permission', 'PermissionController@getRolePermission')->name('permission.role_permission');
            });
            Route::resource('permission','PermissionController');

            Route::resource('dependency','DependencyController');

            Route::prefix('permission')->group(function () {
                Route::get('dependencies','DependencyController@datatable')->name('department.dependencies');
            });

            Route::prefix('department')->group(function () {
                Route::get('dependencies','DependencyController@datatable')->name('department.dependencies');
            });
            Route::resource('department','DepartmentController');
            Route::get('vehicle/brands', 'BrandController@datatable')->name('vehicle.brands');
            Route::get('vehicle/dependencies', 'DependencyController@datatable')->name('vehicle.dependencies');
            Route::resource('vehicle','VehicleController');
            Route::resource('brand','BrandController');
            Route::get('refection/brands', 'BrandController@datatable')->name('refection.brands');
            Route::resource('refection','RefectionController');
            Route::get('oil/brands', 'BrandController@datatable')->name('oil.brands');
            Route::resource('oil','OilController');
            Route::get('brands/filter/{type}','BrandController@datatableFilterBy')->name('brand.filter');

            Route::get('vehicleIn/vehicles', 'VehicleController@datatable')->name('vehicleIn.vehicles');
            Route::get('vehicleIn/departments', 'DepartmentController@datatable')->name('vehicleIn.departments');
            Route::resource('vehicleIn', 'VehicleInController');
            
            Route::get('vehicleOut/vehicles', 'VehicleController@datatable')->name('vehicleOut.vehicles');
            Route::resource('vehicleOut', 'VehicleOutController');

            Route::get('refectionIn/refections', 'RefectionController@datatable')->name('refectionIn.refections');
            Route::resource('refectionIn','RefectionInController');

            Route::get('refectionOut/refections', 'RefectionController@datatable')->name('refectionOut.refections');
            Route::get('refectionOut/vehicles', 'VehicleController@datatable')->name('refectionOut.vehicles');
            Route::resource('refectionOut','RefectionOutController');

            Route::get('oilIn/oils', 'OilController@datatable')->name('oilIn.oils');
            Route::resource('oilIn','OilInController');

            Route::get('oilOut/oils', 'OilController@datatable')->name('oilOut.oils');
            Route::get('oilOut/vehicles', 'VehicleController@datatable')->name('oilOut.vehicles');
            Route::resource('oilOut','OilOutController');
            //Route::get('vehicle/datatable','VehicleController@datatable')->name;
        });
    });
});
