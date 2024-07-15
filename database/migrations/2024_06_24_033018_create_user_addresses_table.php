<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAddressesTable extends Migration
{
    public function up()
    {
        Schema::create('user_addresses', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->string('address');
            $table->integer('id_province');
            $table->integer('id_city');
            $table->string('postal_code');
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_addresses');
    }
}
