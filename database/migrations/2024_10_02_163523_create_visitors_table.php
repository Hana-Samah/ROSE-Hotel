<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitorsTable extends Migration
{
    public function up()
    {
        Schema::create('visitors', function (Blueprint $table) {
            $table->id();
            $table->date('visit_date')->index(); // إضافة الفهرس لتسريع البحث
            $table->integer('visit_count')->default(1);
            $table->string('ip_address')->nullable();
            $table->string('location')->nullable();
            $table->string('language')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('visitors');
    }
}
