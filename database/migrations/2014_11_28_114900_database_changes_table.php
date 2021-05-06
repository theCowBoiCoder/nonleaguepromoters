<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DatabaseChangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('gender')->nullable()->after('remember_token');
            $table->text('bio')->nullable()->after('gender');
            $table->date('dob')->nullable()->after('bio');
            $table->string('county')->nullable()->after('dob');
            $table->string('region')->nullable()->after('county');
            $table->string('profile_image')->nullable()->after('region');
            $table->string('twitter_url')->nullable()->after('profile_image');
            $table->string('instagram_url')->nullable()->after('twitter_url');
            $table->string('youtube_url')->nullable()->after('instagram_url');
            $table->boolean('is_public')->default(1)->after('youtube_url');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
