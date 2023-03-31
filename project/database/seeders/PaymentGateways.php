<?php

namespace Database\Seeders;

use App\Models\PaymentGateway;
use Illuminate\Database\Seeder;

class PaymentGateways extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $information = [
            'merchant_name' => 'IMA USA SHOP',
            'merchant_id' => 'BCR2DN4T2T2LDED4',
            'sandbox_check' => 1,
            'text' => 'Pay via Google Pay.',
        ];

        PaymentGateway::create([
            'name' => 'Google Pay',
            'type' => 'automatic',
            'information' => json_encode($information),
            'keyword' => 'google-pay',
            'currency_id' => '["1"]',
            'checkout' => 1,
            'deposit' => 0,
            'subscription' => 0,
        ]);
    }
}
