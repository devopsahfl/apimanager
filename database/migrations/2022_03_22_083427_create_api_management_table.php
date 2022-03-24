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
        Schema::create('api_management', function (Blueprint $table) {
            $table->srNo();
            $table->string('proccessName');
            $table->string('apiTitle');
            $table->string('apiType');
            $table->string('apiUrl');
            $table->string('tokenType');
            $table->string('token');
            $table->string('intApi');
            $table->string('status');
            $table->string('applicationManager');
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
        Schema::dropIfExists('api_management');
    }
};
