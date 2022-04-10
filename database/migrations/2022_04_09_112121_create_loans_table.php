<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->enum('loan_type', ['EL', 'CL', 'HL', 'PL']);
            $table->decimal('amount', 15, 2);
            $table->decimal('interest_rate');
            $table->decimal('duration');
            $table->decimal('installment', 15, 2);
            $table->longText('criteria');
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
        Schema::dropIfExists('loans');
    }
}
