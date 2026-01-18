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
        Schema::table('users', function (Blueprint $table) {
            $table->enum('user_type', ['recruiter', 'job_seeker'])->default('job_seeker')->after('username');
            $table->string('cv_path')->nullable()->after('user_type');
            $table->text('skills')->nullable()->after('cv_path');
            $table->string('phone')->nullable()->after('skills');
            $table->text('bio')->nullable()->after('phone');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['user_type', 'cv_path', 'skills', 'phone', 'bio']);
        });
    }
};
