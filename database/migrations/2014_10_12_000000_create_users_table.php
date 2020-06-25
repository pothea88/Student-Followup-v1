<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

   

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $random = Str::random(40);
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('position');
            $table->string('address');
            $table->integer('status');
            $table->rememberToken();
            $table->timestamps();
        });

        //Insert the default admin user
        DB::table('users')->insert(
            array(
                'id' => 1,
                'name' => 'Administrator',
                'email' => 'manager@example.com',
                'password' => bcrypt('12345'),
                'position'=>'Training Manager',
                'address' =>'Phnom Penh',
                'status'=>1,
                'remember_token' => $random
            )
        );
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
