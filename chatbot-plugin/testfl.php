<?php
$prompt = "test";
foreach ($_POST as $key => $value) {
    $prompt = $value;
}

$prompt = "Répond à cette question comme si tu était un neuroscientifique : " . $prompt;

$ch = curl_init();

$OPENAI_API_KEY = "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";

//url
curl_setopt($ch, CURLOPT_URL, "https://api.openai.com/v1/chat/completions");
//header
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Cache-Control: no-cache",
    "content-type:application/json;charset=utf-8",
    "Authorization: Bearer " . $OPENAI_API_KEY,
    /*"OpenAI-Organization: org-Qn8QMygcPCH9XFx5I15vYgVG",*/


));
/*
//POST
curl_setopt($ch, CURLOPT_POST, true);
//request content

*/
$datas = array( "model" => "gpt-3.5-turbo",
                "messages"=> [array(  
                                    "content" => $prompt,
                                    "role" => "user")]);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($datas));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


$response = curl_exec($ch);

$dico_rep = json_decode($response, true);

echo $dico_rep["choices"][0]["message"]["content"];


?>