<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('nickname', 25)->default('')->comment('昵称');
            $table->string('account', 25)->default('')->comment('账号');
            $table->string('password', 80)->default('')->comment('密码');
            $table->string('email', 35)->default('')->comment('邮箱');
            $table->unsignedInteger('parent_id')->default(0)->comment('父级id');
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
        Schema::dropIfExists('admins');
    }
}
