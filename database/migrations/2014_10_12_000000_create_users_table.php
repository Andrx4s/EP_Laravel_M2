<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Выполняет миграцию для создания таблицы users
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('email')->unique();
            $table->string('avatar');
            $table->date('birthday');
            $table->string('password');
            $table->foreignIdFor(\App\Models\Role::class)->default(1)->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Отмена миграции
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
