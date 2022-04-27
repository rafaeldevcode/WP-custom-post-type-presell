<?php

$data = $_POST['formData'];

/** * Push data to a Mautic form
 * @param array $data
 *  @param integer $formId
 * 'mauticform[formId]' => 1,
 * 'mauticform[return]' => '',
 * 'mauticform[formName]' => 'cartaodecreditomuvir'
 */

$url = "https://mautic.formoney.com.br/form/submit?formId={$data['formId']}";

$data = [
    'mauticform' => [
        'formId' => $data['formId'],
        'return' => '',
        'nome' => $data['nome'],
        'email' => $data['email'],
        'celular' => $data['telefone'],
    ],
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
// receive server response ...
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

print_r($response);