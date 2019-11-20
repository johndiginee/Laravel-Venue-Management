<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToVenuesTable extends Migration
{
    public function up()
    {
        Schema::table('venues', function (Blueprint $table) {
            $table->unsignedInteger('location_id');

            $table->foreign('location_id', 'location_fk_594259')->references('id')->on('locations');
        });
    }
}
