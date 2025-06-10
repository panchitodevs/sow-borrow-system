<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoaningTable extends Migration
{
    public function up()
    {
        Schema::create('loaning', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->decimal('loan_amount', 15, 2);
            $table->string('loan_purpose');
            $table->integer('loan_term'); // months
            $table->string('repayment_schedule'); // monthly, quarterly, etc.
            $table->string('collateral')->nullable();
            $table->string('phone');
            $table->string('email');
            $table->string('status');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('loaning');
    }
}
