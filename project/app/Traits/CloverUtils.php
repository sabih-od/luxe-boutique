<?php

namespace App\Traits;

use GuzzleHttp\Client;

trait CloverUtils
{

    public function getItems()
    {
        $client = new Client();

        // get bearer token
//        try {
//            $response = $client->get($this->url . '/oauth/token?client_id=' . $this->appId . '&client_secret=' . $this->appSecret . '&code=' . $request->code, [
//                'headers' => [
//                    'accept' => 'application/json',
//                ]
//            ]);
//        } catch (\Exception $exception){
//            $response = $exception->getMessage();
//        }
//
//        dd($response->getBody()->getContents());


        // get inventory
        try {
            $response = $client->get(config('clover.CLOVER_URL') . '/v3/merchants/' . config('clover.MERCHANT_ID') . '/items', [
                'headers' => [
                    'accept' => 'application/json',
                    'authorization' => 'Bearer ' . config('clover.ACCESS_TOKEN'),
                ],
            ]);

            $jsonDecodedResponse = json_decode($response->getBody());

            return $jsonDecodedResponse->elements;

        } catch (\Exception $exception) {
//        return die(print_r($exception->getMessage(), 1));
            return [];
        }
    }

   public function getItemsByCatId($cat_id)
    {
        $client = new Client();

        // get inventory
        try {
            $response = $client->get(config('clover.CLOVER_URL') . '/v3/merchants/' . config('clover.MERCHANT_ID') . '/categories/' . $cat_id . '/items', [
                'headers' => [
                    'accept' => 'application/json',
                    'authorization' => 'Bearer ' . config('clover.ACCESS_TOKEN'),
                ],
            ]);

            $jsonDecodedResponse = json_decode($response->getBody());

            return $jsonDecodedResponse->elements;

        } catch (\Exception $exception) {
//         die(print_r($exception->getMessage(), 1))
            return [];
        }
    }

    public  function getCategories()
    {
        $client = new Client();

        // get inventory
        try {
            $response = $client->get(config('clover.CLOVER_URL') . '/v3/merchants/' . config('clover.MERCHANT_ID') . '/categories', [
                'headers' => [
                    'accept' => 'application/json',
                    'authorization' => 'Bearer ' . config('clover.ACCESS_TOKEN'),
                ],
            ]);

            $jsonDecodedResponse = json_decode($response->getBody());

            return $jsonDecodedResponse->elements;

        } catch (\Exception $exception) {
//        return die(print_r($exception->getMessage(), 1));
            return [];
        }
    }
}

