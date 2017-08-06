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
            $table->integer('contract_id')->comment('合同id');
            $table->integer('variety_id')->comment('品种id');
            $table->float('order_weight',16,3)->comment('开单吨数');
            $table->float('delivery_weight',16,3)->comment('实提吨数');
            $table->decimal('delivery_price',16,2)->comment('单价');
            $table->string('car_no')->comment('提货车号');
            $table->date('delivery_date')->comment('提货日期');
            $table->string('remarks',500)->nullable();
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
