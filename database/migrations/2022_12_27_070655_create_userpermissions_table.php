<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userpermissions', function (Blueprint $table) {
            $table->id();
            $table->string('role_name');
            $table->boolean('view_familymember')->default(0);
            $table->boolean('add_familymember')->default(0);
            $table->boolean('update_familymember')->default(0);
            $table->boolean('delete_familymember')->default(0);
            $table->boolean('view_saving')->default(0);
            $table->boolean('add_saving')->default(0);
            $table->boolean('update_saving')->default(0);
            $table->boolean('delete_saving')->default(0);
            $table->boolean('view_loan')->default(0);
            $table->boolean('add_loan')->default(0);
            $table->boolean('update_loan')->default(0);
            $table->boolean('delete_loan')->default(0);

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
        Schema::dropIfExists('userpermissions');
    }
};
