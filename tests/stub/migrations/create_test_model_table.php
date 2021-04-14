<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestModelTable extends Migration
{
    public function up()
    {
        Schema::create('test_model', function (Blueprint $table) {
            $table->id();
            $table->string('read_only_field');
            $table->string('non_protected_field');
            $table->timestamps();
        });
    }
}
