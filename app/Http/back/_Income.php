<?php


namespace App\Http\back;


use App\Models\Income;

class _Income
{
    public static function insert($order) {
        $income = new Income();
        $income->from = $order->name;
        $income->transaction = $order->transaction;
        $income->amount = $order->previlege()->first()->price;

        $income->save();
    }
}
