<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('usertype')->default('user')->change(); // تحديث العمود وإضافة قيمة افتراضية
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // يمكنك حذف قيمة الافتراضية هنا أو تعيين قيمة افتراضية أخرى إذا لزم الأمر
            $table->string('usertype')->default('default_value')->change();
        });
    }
};