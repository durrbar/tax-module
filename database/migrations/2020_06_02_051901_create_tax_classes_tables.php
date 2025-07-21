<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tax_classes', function (Blueprint $table): void {
            $table->uuid('id')->primary();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
            $table->string('city')->nullable();
            $table->double('rate');
            $table->string('name')->nullable();
            $table->integer('is_global')->nullable();
            $table->integer('priority')->nullable();
            $table->boolean('on_shipping')->default(1);
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
        Schema::dropIfExists('tax_classes');
    }
};
