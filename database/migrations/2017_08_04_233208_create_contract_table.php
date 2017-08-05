<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('type',['销售','采购'])->comment('类型：1：销售,：2采购');
            $table->string('cn')->comment('合同号');
            $table->integer('variety_id')->comment('品种');
            $table->integer('customer_id')->comment('客户id');
            $table->date('created_date')->comment('合同日期');
            $table->date('end_date_from')->comment('合同提货期限');
            $table->date('end_date_end')->comment('合同提货期限');
            $table->enum('category',['定价合同','点价合同'])->comment('合同类型');
            $table->decimal('total_fee')->comment('合同总金额');
            $table->float('total_weight',8,3)->comment('合同总吨数');
            $table->enum('pay_way',['先款后货','现款现货'])->nullable()->comment('付款方式');
            $table->string('take_address')->nullable()->comment('提货地点');
            $table->string('annex')->comment('附件地址');
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
