<?php
/**
 * 后台控制器基类
 * Class BaseController
 *
 * @package App\Http\Controllers\Admin
 */

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\View;
use App\Libs\FcAdmin\Tool;

class BaseController extends Controller
{
	protected $tool;

	protected $perPage = 15;

	public function __construct(Tool $tool)
	{
		//后台工具类
		$this->tool = $tool;

		//控制器初始化
		$this->_init();
	}

	//模块控制器初始化
	protected function _init()
	{
	}
}
