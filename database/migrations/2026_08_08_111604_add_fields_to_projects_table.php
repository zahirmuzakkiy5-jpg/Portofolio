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
        Schema::table('projects', function (Blueprint $table) {
            $table->string('github_link')->nullable()->after('link');
            $table->string('demo_link')->nullable()->after('github_link');
            $table->string('tech_stack')->nullable()->after('demo_link');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn(['github_link', 'demo_link', 'tech_stack']);
        });
    }
};