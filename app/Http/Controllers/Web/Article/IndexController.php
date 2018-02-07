<?php
namespace App\Http\Controllers\Web\Article;

use App\Http\Controllers\Web\BaseController;

/**
 * Class IndexController
 *
 * @package App\Http\Controllers\Web
 */
class IndexController extends BaseController
{
	/**
	 * 首页
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 *
	 */
	public function index()
	{
		$tab = "game";
		return view('web.article.index', compact('tab'));
	}
}