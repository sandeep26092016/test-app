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
        Schema::create('loan_repayments', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('loan_application_id');

            $table->date('payment_date');
            $table->integer('week');
            $table->double('payment_amount', 8, 2)->default(0);
            $table->string('payment_status', 10)->default('failed');

            $table->foreign('loan_application_id')
                  ->references('id')
                  ->on('loan_applications')
                  ->cascadeOnDelete();

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
        Schema::dropIfExists('loan_repayments');
    }
};
