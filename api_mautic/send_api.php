<?php

$dia = date("m.d.y");
$response = str_replace(["\n", "\r", " "], '', sendApi());
logMsg("[URL: '{$_POST['urlAtual']}'][RESPONSE: {$response}]", 'INFO', "Logs/register-{$dia}.log");

function sendApi(): string
{
    $data = $_POST;
    $formId = $data['formId'];

    /** * Push data to a Mautic form
     * @param array $data
     *  @param integer $formId
     * 'mauticform[formId]' => 1,
     * 'mauticform[return]' => '',
     * 'mauticform[formName]' => 'formoney'
     */

    $url = "https://mautic.formoney.com.br/form/submit?formId={$formId}";

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