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
        Schema::table('pesanans',function (Blueprint $table) {
           $table->char('payment_metod',1)->after('total_harga')->comment('1=QRIS | 2= Transfer'); 
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pesanans',function (Blueprint $table) {
           $table->dropColumn('payment_metod'); 
        });
        //
    }
};
