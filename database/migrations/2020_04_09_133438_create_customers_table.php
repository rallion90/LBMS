<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers_account', function (Blueprint $table) {
            $table->increments('customer_id');
            $table->string('email');
            $table->string('password');
            $table->rememberToken();
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->timestamp('created_at');
            $table->string('created_by')->nullable();
            $table->integer('tag_deleted')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
