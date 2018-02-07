<?php
namespace App\Http\Controllers\Web\Game;

use App\Http\Controllers\Web\BaseController;
use App\Models\Web\Game;

/**
 * 游戏详情
 * Class DetailController
 *
 * @package App\Http\Controllers\Web\Game
 */
class DetailController extends BaseController
{
	/**
	 * 详情页
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index(Game $game, $id = 0)
	{
		$params['id'] = (int)$id;
		list($list, $rc) = $game->detail($params);

		return view('web.game.detail', compact("list", "rc"));
	}
}