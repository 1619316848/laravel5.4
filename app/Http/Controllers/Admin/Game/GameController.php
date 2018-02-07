<?php

namespace App\Http\Controllers\Admin\Game;

use App\Http\Controllers\Controller;

/**
 * 游戏
 * Class IndexController
 *
 * @package App\Http\Controllers\Admin\Game
 */
class GameController extends Controller
{
	//首页
	public function index()
	{
		return view('admin.game.index');
	}

	//详情
	public function show()
	{
		return view('admin.game.detail');
	}

	//添加
	public function create()
	{
		return view('admin.game.create');
	}

	//编辑
	public function edit()
	{
		return view('admin.game.edit');
	}
}
