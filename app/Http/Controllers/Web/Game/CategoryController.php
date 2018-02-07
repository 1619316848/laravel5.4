<?php
namespace App\Http\Controllers\Web\Game;

use App\Http\Controllers\Web\BaseController;

/**
 * 游戏分类
 * Class CategoryController
 *
 * @package App\Http\Controllers\Web\Game
 */
class CategoryController extends BaseController
{
	/**
	 * 首页
	 */
	public function index()
	{
		$tab = "category";
		return view('web.game.category', compact('tab'));
	}
}