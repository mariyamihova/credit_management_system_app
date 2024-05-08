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
    public function up(): void
    {
        Schema::create('credits', function (Blueprint $table) {
            $table->id();
            $table->string('credit_number')->unique();
            $table->double('requested_amount');
            $table->double('total_amount');
            $table->integer('credit_period');
            $table->double('paid_amount')->default(0.00);
            $table->unsignedBigInteger('borrower_id');
            $table->timestamps();

            // Indexes
            $table->foreign('borrower_id')->references('id')->on('borrowers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('credits');
    }
};
