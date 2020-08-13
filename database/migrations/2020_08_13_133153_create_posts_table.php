<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreatePostsTable.
 */
class CreatePostsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title', 100)->default('')->comment('标题');
            $table->string('keywords', 100)->default('')->comment('关键字');
            $table->string('picture', 100)->default('')->comment('配图');
            $table->string('description', 150)->default('')->comment('描述');
            $table->text('content')->comment('内容');
            $table->unsignedTinyInteger('status')->default(0)->comment('状态（0：待审核，1：已审核）');
            $table->unsignedSmallInteger('category_id')->default(0)->comment('所属菜单id');
            $table->unsignedTinyInteger('is_hot')->default(0)->comment('是否热门（0：否，1：是）');
            $table->unsignedTinyInteger('is_top')->default(0)->comment('是否置顶（0：否，1：是）');
            $table->unsignedInteger('like')->default(0)->comment('点赞数');
            $table->unsignedInteger('comment')->default(0)->comment('评论数');
            $table->unsignedInteger('click')->default(0)->comment('点击数');
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
		Schema::drop('posts');
	}
}
