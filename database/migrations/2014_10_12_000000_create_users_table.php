<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('firstName');
            $table->string('lastName');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('birthDate');
            $table->string('phoneNumber')->comment('Only Indian  Mobile Number');
            $table->string('gender')->comment('1:male 2:female 3:other');
            $table->string('roll_id')->comment('1:superadmin 2:admin 3:user 4:member 5:robot');
            $table->integer('status')->comment('1:active 0:inactive');
            $table->integer('permission')->comment('1:yes 2:No');
            $table->integer('user_type')->comment('1:superadmin 2:admin 3:user 4:member 5:robot');
            $table->integer('make_me')->comment('for other work'); 
            $table->string('google_id')->nullable()->comment('google_id'); 
            $table->string('google_username')->nullable()->comment('google_username');
            $table->string('google_email')->nullable()->comment('google_email');
            $table->string('google_password')->nullable()->comment('google_password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
