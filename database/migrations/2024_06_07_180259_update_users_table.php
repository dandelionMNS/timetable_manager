<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('user_type')->default('student')->change();
            $table->string('matric_no')->unique()->nullable();
            $table->string('phone_no')->nullable();
            $table->foreignId('batch_id')->nullable()->constrained('batches')->onDelete('set null');
            $table->foreignId('course_id')->nullable()->constrained('courses')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('user_type')->default('user')->change();
            $table->dropColumn('matric_no');
            $table->dropColumn('phone_no');
            $table->dropForeign(['batch_id']);
            $table->dropColumn('batch_id');
            $table->dropForeign(['course_id']);
            $table->dropColumn('course_id');
        });
    }
};
