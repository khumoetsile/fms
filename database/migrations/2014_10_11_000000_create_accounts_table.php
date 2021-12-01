<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('accounts_type');
            $table->string('station_code')->nullable();
            $table->string('station_name')->nullable();
            $table->boolean('payment_term')->nullable();
            $table->string('accounts_number')->nullable()->unique();
            $table->string('accounts_email')->unique();
            $table->string('accounts_username')->unique();
            $table->string('accounts_cnic')->unique();
            $table->string('accounts_fname');
            $table->string('accounts_lname');
            $table->string('accounts_company')->nullable();
            $table->string('accounts_address1')->nullable();
            $table->string('accounts_address2')->nullable();
            $table->string('accounts_address3')->nullable();
            $table->string('city_name')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('state_name')->nullable();
            $table->string('country_name')->nullable();
            $table->string('accounts_phone');
            $table->string('accounts_mobile');
            $table->string('ntn_number')->nullable();
            $table->string('profile_pic')->default('mem_avatar.jpg')->nullable();
            $table->string('cnic_pic_a')->default('photo-id_a.jpg')->nullable();
            $table->string('cnic_pic_b')->default('photo-id_b.jpg')->nullable();
            $table->string('company_logo')->default('no_image.jpg')->nullable();
            $table->boolean('accounts_status')->default('0');
            $table->boolean('verify_status')->default('0');
            $table->boolean('profile_status')->default('0');
            $table->boolean('accounts_agreement')->default('0');
            $table->string('verified_by')->nullable();
            $table->string('activated_by')->nullable();
            $table->timestamps();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestamp('deleted_at')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
}
