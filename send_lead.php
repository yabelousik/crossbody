<?php

require_once('config.php');

$data_post = $_POST;
$error = '';
$data = array(
    'key' => $apiKey,
    'id' => microtime(true), // тут лучше вставить значение, по которому вы сможете индетифицировать свой лид; можно оставить microtime если у вас нет своей crm
    'offer_id' => $offer_id,
    'stream_hid' => $stream_hid,
    'name' => @$data_post['name'],
    'phone' => @$data_post['phone'],
    'comments' => @$data_post['comments'],
    'country' => IT,    // код страны покупателя (RU, UA и т.п.)
    'address' => @$data_post['address'],
    'tz' => 3, // очень желательно получать его с ленда, но если никак лучше оставить пустым или 3 (таймзона мск)
    'web_id' => '', // id вебмастера в вашей системе
    'ip_address' => isset($_SERVER["HTTP_CF_CONNECTING_IP"]) ? $_SERVER["HTTP_CF_CONNECTING_IP"] : $_SERVER['REMOTE_ADDR'],
    'user_agent' => $_SERVER['HTTP_USER_AGENT'],

    "utm_source" => '',
    "utm_medium" => '',
    "utm_campaign" => '',
    "utm_content" => '',
    "utm_term" => '',

    "sub1" => '',
    "sub2" => '',
    "sub3" => '',
    "sub4" => '',
    "sub5" => '',

);

$options = array(
    'http' => array(
        'header' => "Content-type: application/x-www-form-urlencoded\r\n",
        'method' => 'POST',
        'content' => http_build_query($data),
        'ignore_errors' => true,
    )
);

$context = stream_context_create($options);
$result = file_get_contents($apiSendLeadUrl, false, $context);

$obj = json_decode($result);

if (null === $obj) {
    // Ошибка в полученном ответе
    $error = 'Ошибка в полученном ответе';
} elseif (!empty($obj->errmsg)) {
    // Ошибка в отправленом запросе
    $error = $obj->errmsg;
}
