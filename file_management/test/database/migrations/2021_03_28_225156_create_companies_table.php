<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->date('company_reg_date');
            $table->string('company_code')->unique();
            $table->string('company_name');
            $table->string('company_slogan')->nullable();
            $table->string('company_address');
            $table->unsignedBigInteger('country_id')->nullable();
            $table->unsignedBigInteger('state_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->string('area_name')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('company_phone');
            $table->string('company_phone2')->nullable();
            $table->string('company_mobile')->nullable();
            $table->string('company_fax')->nullable();
            $table->string('company_email')->nullable();
            $table->string('company_web')->nullable();
            $table->string('company_image')->nullable()->default('no-image.jpg');
            $table->boolean('company_status')->default('1');
            $table->timestamps();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->string('deleted_by')->nullable();

            $table->foreign('country_id')->references('id')->on('countries')
            ->onDelete('set null')
            ->onUpdate('cascade');

            $table->foreign('state_id')->references('id')->on('states')
            ->onDelete('set null')
            ->onUpdate('cascade');

            $table->foreign('city_id')->references('id')->on('cities')
            ->onDelete('set null')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
