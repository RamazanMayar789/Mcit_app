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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId(
                'student_id'
            )->constrained('students')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreignId('course_id')
                ->constrained('courses')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->enum('installment_type', ['first', 'second']);
            $table->integer('amount');
            $table->enum('method', ['cash', 'bank_transfer']);
            $table->string('bank_receipt')->nullable();
            $table->boolean('is_verified')->default(false);
            $table->string('receipt_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
