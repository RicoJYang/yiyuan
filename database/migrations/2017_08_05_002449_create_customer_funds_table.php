<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerFundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_funds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->enum('type',['销售合同来源','采购合同来源']);
            $table->decimal('fee',10,2)->unsigned()->comment('打款金额');
            $table->date('created_date')->comment('打款日期');
            $table->softDeletes();
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
        //
    }
}
