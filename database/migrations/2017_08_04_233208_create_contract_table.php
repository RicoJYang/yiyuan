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
            $table->enum('status',['进行中','已完结'])->comment('状态：1：进行中,2：已完结');
            $table->enum('type',['销售','采购'])->comment('类型：1：销售,：2采购');
            $table->string('cn')->unique()->comment('合同号');
            $table->integer('variety_id')->comment('品种');
            $table->integer('customer_id')->comment('客户id');
            $table->date('created_date')->comment('合同日期');
            $table->date('delivery_from')->comment('交货期限');
            $table->date('delivery_end')->comment('交货期限');
            $table->enum('category',['定价合同','点价合同'])->comment('合同类型');
            $table->decimal('total_fee',16,2)->comment('合同总金额');
            $table->float('total_weight',16,3)->comment('合同总吨数');
            $table->enum('pay_way',['先款后货','现款现货'])->comment('付款方式');
            $table->string('delivery_address')->nullable()->comment('交货地点');
            $table->integer('salesman_id')->comment('业务员');
            $table->text('annex')->nullable()->comment('附件地址');
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
