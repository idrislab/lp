<?php

/**
 * Generate Landing Page image url
 *
 * @param $filename
 * @param null $secure
 * @return string
 */
function img($filename, $secure = null)
{
    return asset('assets/' . session('pathName') . '/img/' . $filename, $secure);
}

/**
 * Generate Landing Page font url
 *
 * @param $filename
 * @param null $secure
 * @return string
 */
function font($filename, $secure = null)
{
    return asset('assets/' . session('pathName') . '/fonts/' . $filename, $secure);
}

/**
 * Generate Landing Page css url
 *
 * @param null $secure
 * @return string
 */
function css($secure = null)
{
    return asset('assets/' . session('pathName') . '/css/style.css', $secure);
}

/**
 * Generate Landing Page css url
 *
 * @param null $secure
 * @return string
 */
function js($secure = null)
{
    return asset('assets/' . session('pathName') . '/js/script.js', $secure);
}

/**
 * Check if form was submitted with success
 *
 * @return string
 */
function success()
{
    return session('success');
}

function verifyRecaptcha($response, $secret)
{
    $parameters = http_build_query([
        'secret'   => $secret,
        'remoteip' => app('request')->getClientIp(),
        'response' => $response,
    ]);
    $url           = 'https://www.google.com/recaptcha/api/siteverify?' . $parameters;
    $checkResponse = null;

    if (function_exists('curl_version')) {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $checkResponse = curl_exec($curl);

        if(false === $checkResponse) {
            app('log')->error('[Recaptcha] CURL error: '.curl_error($curl));
        }
    } else {
        $checkResponse = file_get_contents($url);
    }

    if (is_null($checkResponse) || empty( $checkResponse )) {
        return false;
    }
    $decodedResponse = json_decode($checkResponse, true);

    return $decodedResponse['success'];
}

