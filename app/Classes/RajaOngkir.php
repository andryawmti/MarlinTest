<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 1/26/19
 * Time: 1:29 PM
 */

namespace App\Classes;


class RajaOngkir
{
    private $api_key;
    private $base_url;

    public function __construct()
    {
        $this->api_key = env('RAJAONGKIR_API_KEY', '');
        $this->base_url = env('RAJAONGKIR_BASE_URL', '');
    }

    private function makeRequest($url, $method = 'GET', $params = null)
    {
        $url = $this->base_url . $url;
        $ch = curl_init();
        curl_setopt ($ch, CURLOPT_URL, $url);
        curl_setopt ($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.6) Gecko/20070725 Firefox/2.0.0.6");
        curl_setopt ($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);

        $header = array(
            "content-type: application/x-www-form-urlencoded",
            'key: ' . $this->api_key,
            'Accept: application/json',
        );

        curl_setopt ($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt ($ch, CURLOPT_REFERER, $url);

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);

        if ($method == 'POST'){
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
            curl_setopt ($ch, CURLOPT_POST, 1);
        }

        $result = curl_exec ($ch);
        $json = json_decode($result);
        if (is_array($json)){
            if (!empty($json['result'])){
                return $json;
            }
        }

        return $json;
    }

    public function calculateCost($origin, $destination, $weight, $courier)
    {
        $params = [
            'origin' => $origin,
            'destination' => $destination,
            'weight' => $weight,
            'courier' => $courier,
        ];

        try {
            $result = $this->makeRequest('/cost', 'POST', $params);
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return $result;
    }

}