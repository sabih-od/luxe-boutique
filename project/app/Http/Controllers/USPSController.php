<?php

namespace App\Http\Controllers;

use App\Models\Generalsetting;
use App\Models\Settings;
use App\Models\ShippingService;
use App\Traits\USPSModule;
use Illuminate\Http\Request;

class USPSController extends Controller
{
    use USPSModule;

    public function __construct()
    {
        $uspsUsername = ShippingService::where('service_name', 'USPS')->where('name', 'username')->first();
        $uspsURL = ShippingService::where('service_name', 'USPS')->where('name', 'url')->first();
        $admin_zip_code = Generalsetting::find(1);

        $this->username = $uspsUsername->value;
        $this->url = $uspsURL->value;
        $this->zip_origin = $admin_zip_code->zip_code;
    }

    public function index(Request $request)
    {
        $array = $this->validateAddress($request);
        if (isset($array['Address']['Error']) && !empty($array['Address']['Error'])) {
            return $array['Address'];
        } else {
            $package = $this->getShippingRates($request, $array);
            if (isset($package['Package']['Error']) && !empty($package['Package']['Error'])) {
                return $package['Package'];
            } else{
                foreach ($package['Package']['Postage'] as $value) {
                    $values['name'] = strip_tags(html_entity_decode($value['MailService']));
                    $values['value'] = $value['Rate'];
                    $data[] = $values;
                }
                return json_encode($data);
            }
        }
    }
}
