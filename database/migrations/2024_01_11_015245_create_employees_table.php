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
            $table->string("email")->unique();
            $table->string("password");
            $table->string("image");
            $table->string("phone_number");
            $table->date("dob");
            $table->string("province"); // tỉnh - thành phố
            $table->string("district"); // quận/huyện
            $table->string("ward"); // phường - xã
            $table->string("nationality"); // quốc tịch
            $table->bigInteger("position_id");
            // $table->foreign('position_id')->references('id')->on('postitions');
            $table->enum("degree", ["TRUNG HỌC", "CAO ĐẲNG", "ĐẠI HỌC", "THẠC SĨ", "TIẾN SĨ", "CAO HỌC"]);

            $table->rememberToken();
            $table->timestamps();
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
