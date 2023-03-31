<?php

namespace App\Traits;

use GuzzleHttp\Client;
use Illuminate\Support\Str;

trait Printify
{
    private $client, $url, $shopId, $accessToken;

    public function __construct()
    {
        parent::__construct();
        $this->client = new Client();
        $this->url = 'https://api.printify.com';
        $this->shopId = '5495926';
        $this->accessToken = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIzN2Q0YmQzMDM1ZmUxMWU5YTgwM2FiN2VlYjNjY2M5NyIsImp0aSI6IjEwY2YxMTM4YmI3NDExOTE2MjMyZjcxODRkYmFkNDlmNGViMTE0NGY1N2M1N2NlNTMyYThhYjhhMWFiZDI0NDk3MjQ2ZDJkYmFkYzdlY2FjIiwiaWF0IjoxNjY4NjA3MzA1LjI5MDUxOSwibmJmIjoxNjY4NjA3MzA1LjI5MDUyMiwiZXhwIjoxNzAwMTQzMzA1LjI1OTI4OSwic3ViIjoiMTA1MDU0NTYiLCJzY29wZXMiOlsic2hvcHMubWFuYWdlIiwic2hvcHMucmVhZCIsImNhdGFsb2cucmVhZCIsIm9yZGVycy5yZWFkIiwib3JkZXJzLndyaXRlIiwicHJvZHVjdHMucmVhZCIsInByb2R1Y3RzLndyaXRlIiwid2ViaG9va3MucmVhZCIsIndlYmhvb2tzLndyaXRlIiwidXBsb2Fkcy5yZWFkIiwidXBsb2Fkcy53cml0ZSIsInByaW50X3Byb3ZpZGVycy5yZWFkIl19.AHXbebsFZdU3fiQx7VOxqIQ-W-ga8BxxQ-Up_VnAmbyY6KYdyY7eb3uQPX0V28rLRfyJTmZxkKRTC26WpbY';
    }

    /**
     * Fetch Printify Products
     *
     */
    public function fetchPrintifyProducts()
    {
        try {
            $response = $this->client->get($this->url . '/v1/shops/' . $this->shopId . '/products.json', [
                'headers' => [
                    'accept' => 'application/json',
                    'authorization' => 'Bearer ' . $this->accessToken,
                ]
            ])->getBody()->getContents();

        } catch (\Exception $exception) {
            $response = $exception->getMessage();
        }

        return $response;
    }

    /**
     * Get single product details from printify
     * @param $id
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getPrintifyProductDetail($id)
    {
        try {
            $response = $this->client->get($this->url . '/v1/shops/' . $this->shopId . '/products/' . $id . '.json', [
                'headers' => [
                    'accept' => 'application/json',
                    'authorization' => 'Bearer ' . $this->accessToken,
                ],
            ])->getBody()->getContents();

            // dd($response->getStatusCode());

        } catch (\Exception $exception) {
            $response = $exception->getMessage();
        }

        return $response;
    }

    public function submitOrderToPrintify($cart, $order)
    {
        $printifyLineItems = [];
        try {
            foreach ($cart->items as $key => $item) {
                if ($item['item']['is_printify']) {
                    // Get product variant id
                    if (!empty($item['size']) && !empty($item['color'])) {
                        $size = $item['size'];
                        $color = '#' . $item['color'];

                        if (count($item['item']->size) == count($item['item']->color)) {
                            $variant_array = explode(',', $item['item']->printify_variant_id);
                            for ($i = 0; $i < count($item['item']->size); $i++) {
                                if ($item['item']->size[$i] == $size && $item['item']->color[$i] == $color) {
                                    $variant_id = $variant_array[$i];
                                }
                            }

                        }
                    }

                    if (empty($item['item']->size)) {
                        if (!empty($item['item']->color)) {
                            $color = $item['color'];
                            if (count($item['item']->color)) {
                                $variant_array = explode(',', $item['item']->printify_variant_id);
                                for ($i = 0; $i < count($item['item']->color); $i++) {
                                    if ($item['item']->color[$i] == $color) {
                                        $variant_id = $variant_array[$i];
                                    }
                                }

                            }
                        }
                    }

                    if (empty($item['item']->color)) {
                        if (!empty($item['item']->size)) {
                            $size = $item['size'];
                            if (count($item['item']->size)) {
                                $variant_array = explode(',', $item['item']->printify_variant_id);
                                for ($i = 0; $i < count($item['item']->size); $i++) {
                                    if ($item['item']->size[$i] == $size) {
                                        $variant_id = $variant_array[$i];
                                    }
                                }

                            }
                        }
                    }

                    $printifyLineItems[] = [
                        'product_id' => $item['item']['printify_product_id'],
                        'variant_id' => $variant_id,
                        'quantity' => $item['qty'],
                    ];
                }
            }

//            dd($order);
            $bodyForm = [
                "external_id" => Str::uuid()->toString(),
                "label" => (string)$order->id,
                'line_items' => ($printifyLineItems),
                'shipping_method' => 1,
                'send_shipping_notification' => false,
                'address_to' => [
                    'first_name' => $order->customer_name ?? 'John',
                    'last_name' => '',
                    'email' => $order->customer_email ?? 'no-reply@imausashop.com',
                    "phone" => $order->customer_phone ?? '12345678',
                    "country" => 'US',
                    "region" => "",
                    "address1" => $order->shipping_address ?? $order->customer_address,
                    "address2" => "",
                    "city" => $order->shipping_city ?? $order->customer_city,
                    "zip" => $order->shipping_zip ?? $order->customer_zip,
                ],
            ];

            $response = $this->client->post($this->url . '/v1/shops/' . $this->shopId . '/orders.json', [
                'headers' => [
                    'accept' => 'application/json',
                    'authorization' => 'Bearer ' . $this->accessToken,
                ],
                'body' => json_encode($bodyForm),
            ]);

        } catch (\Exception $exception) {
            $response = $exception->getMessage();
        }

        return $response;
    }
}
