<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegisterdUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registerd_users', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique()->index();
            $table->string('name')->index();
            $table->string('company_name')->index();
            $table->string('email')->unique()->index();
            $table->string('country')->nullable()->index();
            $table->string('phone')->nullable()->index();
            $table->text('comments')->nullable();
            $table->string('batch')->nullable()->index();
            $table->softDeletes();
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
        Schema::dropIfExists('registerd_users');
    }
}
