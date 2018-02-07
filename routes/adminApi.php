<?php
/**
 * 后台Api路由
 * Author: flycorn
 * Email: ym1992it@163.com
 * Date: 2017/3/5
 * Time: 16:30
 */

Route::post('login', 'LoginController@login'); //登录处理

///服务端工具类
Route::group([
	'middleware' => ['fcAdmin.login:admin', 'fcAdmin.auth']
], function () {
	Route::post('upload/image', 'UploadController@image'); //上传图片
});

Route::group([
	'namespace' => 'System',
	'middleware' => ['fcAdmin.login:admin', 'fcAdmin.auth']
], function () {

    //个人中心
    Route::post('ucenter/edit', 'UcenterController@edit'); //修改个人资料
    Route::post('ucenter/password', 'UcenterController@password'); //修改密码

    //管理员
    Route::get('adminUser', 'AdminUserController@index')->name('admin.adminUser.index');
    Route::post('adminUser', 'AdminUserController@store')->name('admin.adminUser.create');
    Route::put('adminUser/{id}', 'AdminUserController@update')->name('admin.adminUser.edit');
    Route::delete('adminUser/{id}', 'AdminUserController@destroy')->name('admin.adminUser.delete');

    //权限
    Route::get('adminPermission', 'AdminPermissionController@index')->name('admin.adminPermission.index');
    Route::get('adminPermission/{id}', 'AdminPermissionController@index')->name('admin.adminPermission.index');
    Route::post('adminPermission', 'AdminPermissionController@store')->name('admin.adminPermission.create');
    Route::put('adminPermission/{id}', 'AdminPermissionController@update')->name('admin.adminPermission.edit');
    Route::delete('adminPermission/{id}', 'AdminPermissionController@destroy')->name('admin.adminPermission.delete');

    //角色
    Route::put('adminRole/{id}/auth', 'AdminRoleController@auth')->name('admin.adminRole.auth'); //角色授权
    Route::get('adminRole', 'AdminRoleController@index')->name('admin.adminRole.index');
    Route::post('adminRole', 'AdminRoleController@store')->name('admin.adminRole.create');
    Route::put('adminRole/{id}', 'AdminRoleController@update')->name('admin.adminRole.edit');
    Route::delete('adminRole/{role}', 'AdminRoleController@destroy')->name('admin.adminRole.delete');

    /**
     * other modules
     */
    
});
