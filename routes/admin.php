<?php
/**
 * 后台路由
 * Author: flycorn
 * Email: ym1992it@163.com
 * Date: 2017/3/5
 * Time: 16:30
 */

//登录
Route::get('captcha', 'CaptchaController@index'); //登录验证码
Route::get('login', 'LoginController@index'); //登录页
Route::get('logout', 'LoginController@logout'); //退出

Route::group([
	'middleware' => ['fcAdmin.login:admin', 'fcAdmin.permission', 'fcAdmin.auth'],
], function () {
	//基础路由
	Route::get('/', 'IndexController@index');
});

Route::group([
	'namespace' => 'System',
	'middleware' => ['fcAdmin.login:admin', 'fcAdmin.permission', 'fcAdmin.auth']
], function () {
	Route::get('ucenter', 'UcenterController@index')->name('admin.ucenter.index'); //个人中心

	//系统管理
	//	Route::get('system', 'SystemController@index')->name('admin.system.index');

	//管理员管理
	Route::get('adminUser', 'AdminUserController@index')->name('admin.adminUser.index');
	Route::get('adminUser/create', 'AdminUserController@create')->name('admin.adminUser.create');
	Route::get('adminUser/{id}/edit', 'AdminUserController@edit')->name('admin.adminUser.edit');
	Route::get('adminUser/{id}', 'AdminUserController@show')->name('admin.adminUser.show');

	//权限管理
	Route::get('adminPermission', 'AdminPermissionController@index')->name('admin.adminPermission.index');
	Route::get('adminPermission/create', 'AdminPermissionController@create')->name('admin.adminPermission.create');
	Route::get('adminPermission/{id}', 'AdminPermissionController@index')->name('admin.adminPermission.index');
	Route::get('adminPermission/{id}/create', 'AdminPermissionController@create')->name('admin.adminPermission.create');
	Route::get('adminPermission/{id}/show', 'AdminPermissionController@show')->name('admin.adminPermission.show');
	Route::get('adminPermission/{id}/edit', 'AdminPermissionController@edit')->name('admin.adminPermission.edit');

	//角色管理
	Route::get('adminRole/{id}/auth', 'AdminRoleController@auth')->name('admin.adminRole.auth'); //角色授权
	Route::get('adminRole', 'AdminRoleController@index')->name('admin.adminRole.index');
	Route::get('adminRole/create', 'AdminRoleController@create')->name('admin.adminRole.create');
	Route::get('adminRole/{id}', 'AdminRoleController@show')->name('admin.adminRole.show');
	Route::get('adminRole/{id}/edit', 'AdminRoleController@edit')->name('admin.adminRole.edit');

	/**
	 * other modules
	 */
});

Route::group([
	'namespace' => 'Game',
	'middleware' => ['fcAdmin.login:admin', 'fcAdmin.permission', 'fcAdmin.auth']
], function () {
	Route::get('game', 'GameController@index')->name('admin.game.index');
	Route::get('game/create', 'IndexController@create')->name('admin.game.create');
	Route::get('game/{id}/edit', 'IndexController@edit')->name('admin.game.edit');
	Route::get('game/{id}', 'IndexController@show')->name('admin.game.show');

	Route::get('game', 'GameController@index')->name('admin.game.index');
});

///文章
Route::group([
	'namespace' => "Article",
	'middleware' => ['fcAdmin.login:admin', 'fcAdmin.permission', 'fcAdmin.auth']
], function () {
	//列表
	Route::get('index', 'IndexController@list')->name('admin.article.index.list');

	//分类
	Route::get('category', 'CategoryController@list')->name('admin.article.Category.list');
});