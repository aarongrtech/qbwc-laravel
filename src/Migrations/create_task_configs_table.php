<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::connection('qbwc_queue')->create('task_configs', function (Blueprint $table) {
            $table->id();
            $table->string('queue_name');
            $table->string('task_class');
            $table->json('task_params');
            $table->boolean('iterate');
            $table->integer('order');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::connection('qbwc_queue')->dropIfExists('task_configs');
    }
};