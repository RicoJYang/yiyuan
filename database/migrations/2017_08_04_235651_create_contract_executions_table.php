<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractExecutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract_executions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('contract_id')->comment('合同id');
            $table->integer('order_weight')->comment('开单吨数');
            $table->integer('take_weight')->comment('实提吨数');
            $table->decimal('take_price')->comment('单价');
            $table->string('car_no')->comment('提货车号');
            $table->date('take_date')->comment('提货日期');
            $table->string('remark',500)->nullable();
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
