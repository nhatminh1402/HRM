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
            $table->id();
            $table->string("code_employee")->unique();
            $table->string("full_name");
            $table->boolean("gender");
            $table->boolean("status");
            $table->string("email")->unique();
            $table->string("password");
            $table->string("image");
            $table->string("phone_number");
            $table->unsignedBigInteger("identify_number")->nullable(); // CMND
            $table->date("dob");
            $table->unsignedBigInteger("province_id")->nullable(); // tỉnh - thành phố
            $table->unsignedBigInteger("district_id")->nullable(); // Quận Huyện
            $table->unsignedBigInteger("ward_id")->nullable(); // phuong
            $table->string("nationality"); // quốc tịch
            $table->unsignedBigInteger("position_id");
            $table->enum("degree", ["THPT", "CAO ĐẲNG", "ĐẠI HỌC", "CAO HỌC"]);
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('province_id')->references('id')->on('provinces');
            $table->foreign('district_id')->references('id')->on('districts');
            $table->foreign('ward_id')->references('id')->on('wards');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
