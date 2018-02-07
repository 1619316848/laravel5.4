<?php
namespace App\Http\Controllers\Web;

use App\Models\Web\Game;

/**
 * Class IndexController
 *
 * @package App\Http\Controllers\Web
 */
class IndexController extends BaseController
{
	/**
	 * 首页
	 * @param Game $game
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 *
	 */
	public function index(Game $game)
	{
		$list = $game->getIndex();

		$tab = "game";
		return view('web.index', compact('tab', 'list'));
	}

	/**
	 * 新游
	 * @param Game $game
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function newGame(Game $game)
	{
		$page = empty ($_GET['p']) ?0 : $_GET['p'];
		if ($page > 0) {
			$list = $game->getNew($page, $this->perPage);

			echo $list;
			exit;
		} else {
			return view('web.game.newGame');
		}
	}

	/**
	 * 热门游戏
	 * @param Game $game
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function hotGame(Game $game)
	{
		$page = empty ($_GET['p']) ?0 : $_GET['p'];
		if ($page > 0) {
			$list = $game->getHot($page, $this->perPage);

			echo $list;
			exit;
		} else {
			return view('web.game.hotGame');
		}
	}
}