<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('contact_reg_date');
            $table->string('contact_code')->unique();
            $table->string('contact_name');
            $table->string('contact_slogan')->nullable();
            $table->string('contact_address1');
            $table->string('contact_address2')->nullable();
            $table->string('contact_address3')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->unsignedBigInteger('state_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->string('area_name')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('contact_phone')->nullable();
            $table->string('contact_phone2')->nullable();
            $table->string('contact_mobile');
            $table->string('contact_mobile2')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('contact_image')->nullable();
            $table->boolean('contact_status')->default('1');
            $table->timestamps();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->string('deleted_by')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
