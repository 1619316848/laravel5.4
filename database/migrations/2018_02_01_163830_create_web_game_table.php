<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebGameTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('game', function (Blueprint $table) {
			$table->increments('id');
			$table->string('title', 255)->comment('游戏名称');
			$table->string('desc')->comment('描述');
			$table->string('icon', 500)->comment('游戏图标');
			$table->string('screen', 500)->comment('游戏截图');
			$table->integer('amount')->comment('多少人玩过');
			$table->timestamps();
		});

		Schema::create('game_new', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('game_id')->comment('游戏id');
			$table->tinyInteger('sort')->comment('排序');
			$table->dateTime('stick_time')->comment('置顶时间');
			$table->timestamps();
		});

		Schema::create('game_hot', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('game_id')->comment('游戏id');
			$table->tinyInteger('sort')->comment('排序');
			$table->dateTime('stick_time')->comment('置顶时间');
			$table->timestamps();
		});

		Schema::create('banner', function (Blueprint $table) {
			$table->increments('id');
			$table->string('title', 255)->comment('标题');
			$table->string('icon', 255)->comment('轮播图');
			$table->string('href', 255)->comment('地址');
			$table->tinyInteger('type')->comment('类型');
			$table->tinyInteger('sort')->comment('顺序');
			$table->timestamps();
		});

		Schema::create('ad', function (Blueprint $table) {
			$table->increments('id');
			$table->string('title', 255)->comment('标题');
			$table->string('icon', 255)->comment('轮播图');
			$table->string('href', 255)->comment('地址');
			$table->tinyInteger('type')->comment('类型');
			$table->tinyInteger('sort')->comment('顺序');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('ad');
		Schema::dropIfExists('banner');
		Schema::dropIfExists('game_hot');
		Schema::dropIfExists('game_new');
		Schema::dropIfExists('game');
	}
}
