<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string("full_name");
            $table->boolean("gender");
            $table->string("image");
            $table->string("nick_name")->nullable();
            $table->date("dob");
            $table->string("birth_place")->nullable(); // Nơi sinh
            $table->string("nationality")->nullable(); // Quốc tịch
            $table->boolean("marriage_status");
            $table->string("religion")->nullable(); // tôn giáo
            $table->string("nation")->nullable(); // dân tộc
            $table->boolean("status")->nullable(); // trạng thái
            $table->unsignedBigInteger("identify_number")->nullable(); // CMND
            $table->date("card_issuance_date")->nullable(); // ngày cấp cmnd
            $table->string("place_of_card_issuance")->nullable(); // nơi cấp
            $table->integer("id_postition")->nullable(); // mã chức vụ
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_employee');
    }
};
