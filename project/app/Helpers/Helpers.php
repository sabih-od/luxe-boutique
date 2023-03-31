<?php

use App\Models\ShippingService;

if (!function_exists('upsSettings')) {
    function upsSettings()
    {
        // Set USPS Settings
        $upsSettings = ShippingService::where('service_name', 'UPS')->get();
        foreach ($upsSettings as $setting) {
            if ($setting->name == 'env' && $setting->value == 'testing') {
                config(['ups.sandbox' => true]);
            } else if ($setting->name == 'env' && $setting->value == 'live') {
                config(['ups.sandbox' => false]);
            } else {
                config(['ups.' . $setting->name => $setting->value]);
            }
        }
    }
}
