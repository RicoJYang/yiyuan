<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract_goods', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('contract_id')->comment('合同id');
            $table->integer('variety_id')->comment('品种');
            $table->float('weight',16,3)->comment('重量吨数');
            $table->float('remainder_weight',16,3)->comment('剩余可提重量吨数');
            $table->decimal('price',16,2)->comment('单价');
            $table->decimal('count',16,2)->comment('小计');
            $table->decimal('hedge_price',16,2)->comment('保值价');
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
