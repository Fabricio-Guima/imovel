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
        Schema::create('properties', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('tenant_id')->nullable(false);
            $table->uuid('type_id')->nullable(false);
            $table->uuid('action_id')->nullable(false);
            $table->uuid('subtype_id')->nullable(false);
            $table->uuid('address_id')->nullable(false);
            $table->integer('total_bathrooms')->nullable()->default(0);
            $table->integer('total_area')->nullable();
            $table->integer('total_suites')->nullable();
            $table->integer('total_garages')->nullable();
            $table->integer('sale_value');
            $table->integer('condo')->nullable();
            $table->integer('iptu_value')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('properties');
    }
};
