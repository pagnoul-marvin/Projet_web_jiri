<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('jiris', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('contacts', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('projects', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('attendances', function (Blueprint $table) {
            $table->foreign('jiri_id')->references('id')->on('jiris')->onDelete('cascade');
            $table->foreign('contact_id')->references('id')->on('contacts')->onDelete('cascade');
        });

        Schema::table('assignements', function (Blueprint $table) {
            $table->foreign('jiri_id')->references('id')->on('jiris')->onDelete('cascade');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jiris', function (Blueprint $table) {
           $table->dropForeign('user_id');
        });

        Schema::table('contacts', function (Blueprint $table) {
           $table->dropForeign('user_id');
        });

        Schema::table('projects', function (Blueprint $table) {
           $table->dropForeign('user_id');
        });

        Schema::table('attendances', function (Blueprint $table) {
           $table->dropForeign('jiri_id');
           $table->dropForeign('contact_id');
        });

        Schema::table('assignements', function (Blueprint $table) {
           $table->dropForeign('jiri_id');
           $table->dropForeign('project_id');
        });
    }
};
