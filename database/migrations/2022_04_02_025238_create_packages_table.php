<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('type');
            $table->integer('total_credit');
            $table->integer('validity_month');
            $table->double('price');
            $table->double('gst_percent')->default(7.00);
            $table->boolean("newbie_first_attend");
            $table->integer("newbie_addition_credit");
            $table->text("newbie_note");
            $table->string('alias');
            $table->double('estimate_price');
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
        Schema::dropIfExists('packages');
    }
}
