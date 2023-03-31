<?php

namespace App\Traits;

trait USPSModule
{
    protected $username, $url, $zip_origin;

    public function validateAddress($request)
    {
        $xml_data = "<AddressValidateRequest USERID='$this->username'>
            <Revision>1</Revision>
            <Address ID='0'>
                <Address1>" . $request['address'] . "</Address1>
                <Address2>" . $request['address'] . "</Address2>
                <City>" . $request['city'] . "</City>
                <State>" . $request['state'] . "</State>
                <Zip5>" . $request['zip'] . "</Zip5>
                <Zip4></Zip4>
            </Address>
        </AddressValidateRequest>";
        return $this->createURL($xml_data, 'Verify');
    }

    public function getShippingRates($request, $array)
    {
        $xml_data = "<RateV4Request USERID='$this->username'>
            <Revision>2</Revision>
            <Package ID='0'>
                <Service>ALL</Service>
                <ZipOrigination>" . $this->zip_origin . "</ZipOrigination>
                <ZipDestination>" . $array['Address']['Zip5'] . "</ZipDestination>
                <Pounds>" . $request['weight'] . "</Pounds>
                <Ounces>" . $request['weight'] * 16 . "</Ounces>
                <Container></Container>
                <Width></Width>
                <Length></Length>
                <Height></Height>
                <Girth></Girth>
                <Machinable>TRUE</Machinable>
            </Package>
        </RateV4Request>";

        return $this->createURL($xml_data, 'RateV4');
    }

    public function packagePickup(){
        $xml_data = "<CarrierPickupAvailabilityRequest USERID='$this->username'>
            <FirmName>Daniel Dey Ventures LLC</FirmName>
            <SuiteOrApt></SuiteOrApt>
            <Address2>23475 Glacier View Dr</Address2>
            <Urbanization></Urbanization>
            <City>Eagle River</City>
            <State>AL</State>
            <ZIP5>99577</ZIP5>
            <ZIP4></ZIP4>
        </CarrierPickupAvailabilityRequest>";

        return $this->createURL($xml_data, 'CarrierPickupAvailability');
    }

    public function createURL($xml_data, $api_parameter)
    {
        $ch = curl_init();

        // set the target url
        curl_setopt($ch, CURLOPT_URL, $this->url);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // parameters to post
        curl_setopt($ch, CURLOPT_POST, 1);

        // Pass XML parameter
        $xml_post_string = "API=$api_parameter&XML=$xml_data";

        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml_post_string);
        curl_setopt($ch, CURLOPT_HEADER, false);

        $response = curl_exec($ch);

        $xml = simplexml_load_string($response, "SimpleXMLElement", LIBXML_NOCDATA);
        $json = json_encode($xml);
        // dd(json_decode($json, TRUE));

        return json_decode($json, TRUE);
    }

}
