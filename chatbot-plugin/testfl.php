<?php
$prompt = "test";
foreach ($_POST as $key => $value) {
    $prompt = $value;
}
echo "your prompt is \"" . $prompt . "\". You are rick rolled !";

$ch = curl_init();

$OPENAI_API_KEY = "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";

//url
curl_setopt($ch, CURLOPT_URL, "https://api.openai.com/v1/models");
//header
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Cache-Control: no-cache",
    "content-type:application/json;charset=utf-8",
    "Authorization: Bearer " . $OPENAI_API_KEY,
    "OpenAI-Organization: org-Qn8QMygcPCH9XFx5I15vYgVG",
    "model: gpt-3.5-turbo",
    "messages"=> [array("role"=> "user", "content"=> "Say this is a test!")]

));
/*
//POST
curl_setopt($ch, CURLOPT_POST, true);
//request content
$datas = array("user"=>$prompt);
curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);
*/
$response = curl_exec($ch);

echo $response;

?>