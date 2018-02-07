<?php
namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

/**
 * 允许跨域中间件
 * Class AccessControlAllowOrigin
 */
class AccessControlAllowOrigin
{
	/**
	 * @param $request
	 * @param \Closure $next
	 *
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Credentials: true');
		header('Access-Control-Allow-Methods: *');
		header('Access-Control-Allow-Headers: Content-type,Access-Token');
		header('Access-Control-Expose-Headers: *');

		return $next($request);
	}
}