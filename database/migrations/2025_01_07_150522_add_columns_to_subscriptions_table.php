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
        Schema::table('subscriptions', function (Blueprint $table) {
            if (!Schema::hasColumn('subscriptions', 'frequency')) {
                $table->enum('frequency', ['Month', 'Year']);
            }
            if (!Schema::hasColumn('subscriptions', 'trial_days')) {
                $table->integer('trial_days');
            }
            if (!Schema::hasColumn('subscriptions', 'active_plans')) {
                $table->integer('active_plans')->default(0);
            }
            if (!Schema::hasColumn('subscriptions', 'is_default')) {
                $table->boolean('is_default')->default(false);
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('subscriptions', function (Blueprint $table) {
            $table->dropColumn(['frequency', 'trial_days', 'active_plans', 'is_default']);
        });
    }
};
