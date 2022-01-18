<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOwnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('owners', function (Blueprint $table) {
            $table->id();
            $table->String ('company_name');
            $table->String ('owner_name');
            $table->String ('owner_email')->unique();
            $table->String ('password');
            $table->String ('logo');
            $table->String ('address');
            $table->text ('desc');
            $table->String ('num_of_employees');
            $table->String ('company_email')->unique();
            $table->foreignId('category_id')->unsigned()->references('id')->on('categories')->onDelete('cascade');
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
        Schema::dropIfExists('owners');
    }
}
