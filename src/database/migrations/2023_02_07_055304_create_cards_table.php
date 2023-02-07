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
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            // $table->integer('user_id');
            // $table->text('company_logo')->comment('会社のロゴ');
            // $table->string('company_name')->comment('会社の名前');
            // $table->string('company_zip_code')->comment('会社の郵便番号');
            // $table->string('company_address')->comment('会社の住所');
            // $table->string('company_tel')->comment('会社の電話番号');
            // $table->string('company_fax')->nullable()->comment('会社のFAX番号');
            // $table->string('company_url')->comment('会社のHP URL');
            // $table->string('company_other')->nullable()->comment('会社のその他の情報');

            // $table->string('personal_name')->comment('個人の名前');
            // $table->string('personal_roll')->comment('個人の肩書');
            // $table->string('personal_email')->comment('個人のEmail');
            // $table->string('personal_tel')->nullable()->comment('個人の携帯電話番号');
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
        Schema::dropIfExists('cards');
    }
};
