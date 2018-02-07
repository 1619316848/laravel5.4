<?php

namespace App\Models\Web;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
	protected $table='game';

	/**
	 * 获取首页相关数据
	 * @return string
	 */
	public function getIndex()
	{
		//热门
		$list['hot'] = $this
			->join('game_hot', 'game.id', '=' , 'game_hot.game_id')
			->orderByDesc("game_hot.sort")->get()->toJson();

		//新游推荐
		$list['new'] = $this
			->join('game_new', 'game.id', '=' , 'game_new.game_id')
			->orderByDesc("game_new.sort")->get()->toJson();

		//轮播图
		$list['banners'] = \DB::table("banner")
			->where(['type' => 1])
			->get()->toJson();

		//广告图
		$list['ad1'] = "{}";
		$ad1 = \DB::table("ad")
			->where(['type'=>1])
			->first(['title', 'icon', 'href']);
		if (! empty ($ad1) ) {
			$list['ad1'] = json_encode($ad1);
		}

		///
		return $list;
	}

	/**
	 * 新游推荐
	 * @param $page
	 * @param $perPage
	 *
	 * @return mixed
	 */
	public function getNew($page, $perPage)
	{
		$paginate = $this
			->join('game_new', 'game.id', '=' , 'game_new.game_id')
			->orderByDesc("game_new.sort")
			->simplePaginate($perPage, ['*'], 'page', $page)->toJson();

		return $paginate;
	}

	/**
	 * 热门游戏
	 * @param $page
	 * @param $perPage
	 *
	 * @return mixed
	 */
	public function getHot($page, $perPage)
	{
		$paginate = $this
			->join('game_hot', 'game.id', '=' , 'game_hot.game_id')
			->orderByDesc("game_hot.sort")
			->simplePaginate($perPage, ['*'], 'page', $page)->toJson();

		return $paginate;
	}

	/**
	 * 查看详情
	 * @param $params
	 *
	 * @return array
	 */
	public function detail($params)
	{
		$list = $this->where(['id' => $params['id']])->first()->toArray();
		$like = $this->where(['cate_id' => $list['cate_id']])->offset(0)->limit(3)->orderByDesc("amount")->get()->toJson();

		return [$list, $like];
	}
}