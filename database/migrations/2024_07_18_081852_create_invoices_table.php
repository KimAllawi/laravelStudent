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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id('invoice_id');
            $table->string('patient_id');
            $table->integer('total_amount');
            $table->enum('status',['paid','unpaid']);
            $table->date('invoice_date');
            $table->timestamps();
        });
    }

    protected $primaryKay = 'invoice_id';

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
