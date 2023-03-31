<?php

namespace App\Traits;

use App\Models\ShippingService;
use Illuminate\Support\Facades\Config;
use Rawilk\Ups\Apis\AddressValidation\AddressValidation;
use Rawilk\Ups\Apis\Api;
use Rawilk\Ups\Apis\Shipping\ShipAccept;
use Rawilk\Ups\Apis\Shipping\ShipConfirm;
use Rawilk\Ups\Entity\Address\Address;
use Rawilk\Ups\Entity\Payment\PaymentInformation;
use Rawilk\Ups\Entity\Shipment\Label\LabelSpecification;
use Rawilk\Ups\Entity\Shipment\Package;
use Rawilk\Ups\Entity\Shipment\PackageWeight;
use Rawilk\Ups\Entity\Shipment\PackagingType;
use Rawilk\Ups\Entity\Shipment\ReferenceNumber;
use Rawilk\Ups\Entity\Shipment\ShipFrom;
use Rawilk\Ups\Entity\Shipment\Shipment;
use Rawilk\Ups\Entity\Shipment\Shipper;
use Rawilk\Ups\Entity\Shipment\ShipTo;

trait UPSModule
{

    public function setValidAddress($address, $city, $state, $postal_code, $country_code)
    {
        try {
            $address = new Address([
                'address_line1' => $address,
                'city' => $city,
                'state' => $state,
                'postal_code' => $postal_code,
                'country_code' => $country_code,
            ]);

            $response = (new AddressValidation)
                ->usingAddress($address)
                ->validate();
            return $response->valid;
        } catch (\Exception $exception) {
            throw new \Exception($exception->getMessage());
        }
    }

    public function createShipment(Address $address, $attention_name, $phone_number, $order_items)
    {
        // You can get this a different way if you have it stored somewhere else.
//        $shipperNumber = Config::get('ups.shipper_number');
        $upsSettings = ShippingService::where('service_name', 'UPS')
            ->where('name', 'shipper_number')
            ->first();
        $shipperNumber = $upsSettings->value;


        $shipment = new Shipment([
            'shipper' => new Shipper([
                'shipper_number' => $shipperNumber,
                'name' => 'Spectrum7',
                'address' => new Address([
                    'address_line1' => '2850 Dogwood Road',
                    'city' => 'Gilbert',
                    'state' => 'AZ',
                    'postal_code' => '85233',
                    'country_code' => 'US',
                ]),
            ]),

            'ship_to' => new ShipTo([
                'company_name' => $attention_name,
                'attention_name' => $attention_name,
                'address' => $address,
            ]),

            'ship_from' => new ShipFrom([
                'company_name' => 'Spectrum7',
                'attention_name' => 'Spectrum7',
                'address' => new Address([
                    'address_line1' => '2850 Dogwood Road',
                    'city' => 'Gilbert',
                    'state' => 'AZ',
                    'postal_code' => '85233',
                    'country_code' => 'US',
                ]),
            ]),

            'description' => 'Shipment description',

            // Payment info - for other options, see the developer docs
            'payment_information' => PaymentInformation::prepaidForAccount($shipperNumber),

            'packages' => $this->createPackages($order_items),
        ]);

        return $shipment;
    }

    private function createPackages($packages)
    {
//        $items = [];
        $desc = [];
        $product_ids = [];
        $weight = [];
        foreach ($packages as $item) {
            array_push($desc, $item['product_name']);

//            $product_id = $item->options->first()['product_id'] ?? 'p_id';
//            $option_id = $item->options->first()['option_id'] ?? 'p_o_id';
//            $option_val_id = $item->options->first()['option_val_id'] ?? 'p_o_val_id';
//            array_push($product_ids, implode(",", [$product_id, $option_id, $option_val_id]));

            array_push($product_ids, $item['id']);

            array_push($weight, (float)($item['weight']) * (int)$item['quantity']);
        }

        $package = new Package([
            'packaging_type' => new PackagingType, // Default: Customer supplied package
            'description' => implode(" | ", $desc), // Required for return shipments
            'reference_number' => new ReferenceNumber([
                'value' => implode("|", $product_ids),
                // 'barcode' => true, // Uncomment to have outputted as barcode on bottom of label
            ]),
            'package_weight' => new PackageWeight([
                'weight' => array_sum($weight), // UOM defaults to LBS
            ]),
            // 'is_large_package' => true,
        ]);

        return [$package];
    }

    public function generateDigest(Shipment $shipment)
    {
        try {
            $response = (new ShipConfirm)
                ->withShipment($shipment)
                ->withLabelSpecification(LabelSpecification::asGIF()) // omit if you don't need the label
                ->getDigest();

            // Get the new shipment's identification number
            $shipmentIdentificationNumber = $response->shipment_identification_number;

            // Get the shipment digest
            $shipmentDigest = $response->shipment_digest;

            return $response;
        } catch (\Rawilk\Ups\Exceptions\RequestFailed $e) {
            // Handle the exception
            throw new \Exception($e->getMessage());
        }
    }

    public function shipmentAccept($shipmentDigest)
    {
        try {
            $response = (new ShipAccept)
                ->usingShipmentDigest($shipmentDigest)
                ->createShipment();
            return $response->packages->first()->tracking_number;
        } catch (\Rawilk\Ups\Exceptions\RequestFailed $e) {
            throw new \Exception($e->getMessage());
        }





//        try {
//            $response = (new ShipAccept)
//                ->usingShipmentDigest($shipmentDigest)
//                ->createShipment();
//
//            // Get the new shipment's identification number
//            $shipmentIdentificationNumber = $response->shipment_identification_number;
//
//            // Returns a collection of packages returned from the api
//            // Wrapped in our \Rawilk\Ups\Entity\Shipment\PackageResult entity.
//            $packages = $response->packages;
//
//            // Each package has a tracking number
//            // The first package's tracking number should match the shipment identification number.
//            $trackingNumber = $response->packages->first()->tracking_number;
//
//            return $trackingNumber;
//        } catch (\Rawilk\Ups\Exceptions\RequestFailed $e) {
//            throw new \Exception($e->getMessage());
//        }
    }

}
