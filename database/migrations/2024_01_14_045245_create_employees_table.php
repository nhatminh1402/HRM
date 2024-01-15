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
            $table->boolean("status")->nullable();
            $table->string("email")->unique();
            $table->string("password");
            $table->string("image");
            $table->string("phone_number");
            $table->unsignedBigInteger("identify_number")->nullable(); // CMND
            $table->date("dob");
            $table->unsignedBigInteger("province_id")->nullable(); // tỉnh - thành phố
            $table->unsignedBigInteger("district_id")->nullable(); // Quận Huyện
            $table->unsignedBigInteger("ward_id")->nullable(); // phường
            $table->unsignedBigInteger("reward_id")->nullable(); // phường
            $table->unsignedBigInteger("position_id");
            $table->unsignedBigInteger("department_id");
            $table->enum("degree", ["THPT", "CAO ĐẲNG", "ĐẠI HỌC", "CAO HỌC"]);
            $table->string("major");
            $table->rememberToken();
            $table->timestamps();
            // Tạo liên kết khóa ngoại
            $table->foreign('province_id')->references('id')->on('provinces');
            $table->foreign('district_id')->references('id')->on('districts');
            $table->foreign('ward_id')->references('id')->on('wards');
            $table->foreign('position_id')->references('id')->on('positions');
            $table->foreign('department_id')->references('id')->on('departments');
            $table->foreign('reward_id')->references('id')->on('rewards');
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
