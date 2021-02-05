<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player_contracts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('players');
            $table->string('contracted_club');
            $table->enum('contract_type',['professional','semi-professional','non-contract','amateur-contract']);
            $table->date('contact_expiry_date')->nullable();
            $table->enum('job_role',['staff','player'])->default('player');
            $table->date('transfer_date')->nullable();
            $table->string('wage');
            $table->string('goal_bonus')->nullable();
            $table->string('clean_sheet_bonus')->nullable();
            $table->string('top_goal_scorer_bonus')->nullable();
            $table->string('promotion_bonus')->nullable();
            $table->string('min_release_clause')->nullable();
            $table->string('relegation_bonus')->nullable();
            $table->string('yearly_wage_rise')->nullable();
            $table->string('promotion_wage_rise')->nullable();
            $table->string('sell_on_fee_percentage')->nullable();
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
        Schema::dropIfExists('contracts');
    }
}
