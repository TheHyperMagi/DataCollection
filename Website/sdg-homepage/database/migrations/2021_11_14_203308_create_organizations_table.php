<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('goal_id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->text('org_name')->nullable();
            $table->string('org_type')->nullable();
            $table->string('industry')->nullable();
            $table->string('solution_product')->nullable();
            $table->string('size_of_team')->nullable();
            $table->string('website')->nullable();
            $table->text('goal_relevance')->nullable();
            $table->text('target_relevance')->nullable();
            $table->string('target_population')->nullable();
            $table->string('urban_rural')->nullable();
            $table->string('regions')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('year_of_establishment')->nullable();
            $table->text('additional_info')->nullable();
            $table->string('visuals')->nullable();
            $table->text('key_pain_point')->nullable();
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
        Schema::dropIfExists('organizations');
    }
}
