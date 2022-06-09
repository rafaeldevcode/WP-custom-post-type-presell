<?php

sendApi($_POST);

function sendApi(array $data): void
{
    $day = date("m.d.y");

    if($data['idioma'] === 'Português'):
        if($data['source'] === 'facebook'):
            $responsePubzap = sendMessagePubzap($data, '89a7d9a0-a9fc-4818-8242-a7aebc1c4b51');
            logMsg("[URL: '{$_POST['urlAtual']}'][RESPONSE-PUBZAP: {$responsePubzap}]", 'INFO', "Logs/register-{$day}.log");
        elseif($data['source'] === 'google'):
            $responsePubzap = sendMessagePubzap($data, '48dfdfe5-959a-4953-a07c-5544cff5a28e');
            logMsg("[URL: '{$_POST['urlAtual']}'][RESPONSE-PUBZAP: {$responsePubzap}]", 'INFO', "Logs/register-{$day}.log");
        endif;

        $responseAkna = str_replace(["\n"], '', sendContactAkna($data));
        logMsg("[URL: '{$_POST['urlAtual']}'][RESPONSE-AKNA: {$responseAkna}]", 'INFO', "Logs/register-{$day}.log");
    endif;

    $responseMautic = sendContactMautic($data);
    logMsg("[URL: '{$_POST['urlAtual']}'][RESPONSE-MAUTIC: {$responseMautic}]", 'INFO', "Logs/register-{$day}.log");
    
    // $responseActive = sendContactActive($data);
    // logMsg("[URL: '{$_POST['urlAtual']}'][RESPONSE-ACTIVE: {$responseActive}]", 'INFO', "Logs/register-{$day}.log");

}

// Integração com AKNA
function sendContactAkna(array $data): string
{
    $dataAkna = [
        'User' => 'api@femglobalbrands.com.br',
        'Pass' => '1ba5d79d64d6c2c3aa10a6d5261488c0',
        'XML'  => "<main>
            <emkt trans=\"11.05\">
            <nome>Lista Fluxo Principal</nome>
            <destinatario>
                <email>{$data['email']}</email>
                <nome>{$data['nome']}</nome>
                <celular>{$data['telefone']}</celular>
            </destinatario>
            </emkt>
        </main>"
    ];

    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL            => 'http://app.akna.com.br/emkt/int/integracao.php',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING       => '',
        CURLOPT_MAXREDIRS      => 10,
        CURLOPT_TIMEOUT        => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST  => 'POST',
        CURLOPT_POSTFIELDS     => $dataAkna,
        ]);

        $response = curl_exec($curl);
        curl_close($curl);

        return $response;
}

// Integração com MAUTIC
function sendContactMautic(array $data): string
{
    $dataMautic = [
        'mauticform'  => [
            'formId'  => $data['formId'],
            'return'  => '',
            'nome'    => $data['nome'],
            'email'   => $data['email'],
            'celular' => $data['telefone'],
        ]
    ];

    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL            => "https://mautic.formoney.com.br/form/submit?formId={$data['formId']}",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING       => '',
        CURLOPT_MAXREDIRS      => 10,
        CURLOPT_TIMEOUT        => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST  => 'POST',
        CURLOPT_POSTFIELDS     => http_build_query($dataMautic),
        ]);

        $response = curl_exec($curl);
        curl_close($curl);

        return $response;
}

// Integração com PUBZAP
function sendMessagePubzap(array $data, string $token): string
{
    $dataPubzap = [
        "contact" => [
            "first_name" => $data['nome'], 
            "last_name"  => '',
            "phone"      => $data['telefone'],
            "email"      => $data['email'],
        ]
    ];

    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://pubzap.co/api/v1.0/Leads/{$token}",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($dataPubzap),
        CURLOPT_HTTPHEADER => ['Content-Type: application/json']
    ]);

    $response = curl_exec($curl);
    curl_close($curl);

    return $response;
}

// Integração com Active Campaign
function sendContactActive(array $data): string
{
    $dataActive = [
        'email'      => $data['email'],
        'first_name' => $data['nome'],
        'phone'      => $data['telefone'],
        'p[]'        => '5'
    ];

    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => 'https://usmoney.api-us1.com/admin/api.php?api_key=35cbe00337d26601704b06449027485e1e45040a885348d39352e8de08f4e5ce7e8b09df&api_action=contact_add&api_output=serialize',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => $dataActive,
    ]);
    
    $response = curl_exec($curl);
    curl_close($curl);

    return $response;
}

function logMsg( $msg, $level, $file ): void
{
    $levelStr = $level;

    $date = date( 'Y-m-d H:i:s' );

    $msg = sprintf( "[%s] [%s]: %s%s", $date, $levelStr, $msg, PHP_EOL );

    file_put_contents( $file, $msg, FILE_APPEND );

    removerLog();
}

function removerLog(): void
{
    $diretorio = 'Logs/';

    if(is_dir($diretorio)){
        $itens = scandir($diretorio);

        if(count($itens) > 15){
            unlink($diretorio.$itens[3]);
        }
    }
}