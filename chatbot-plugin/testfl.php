<?php
$prompt = "test";
foreach ($_POST as $key => $value) {
    $prompt = $value;
}
echo "your prompt is \"" . $prompt . "\". You are rick rolled !";

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
                                    "content" => "What day of the wek is it?",
                                    "role" => "user")]);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($datas));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


$response = curl_exec($ch);

echo "<br>";
echo $response;
echo "<br>";

$dico_rep = array($response);

echo $dico_rep["choices"][0]["message"]["content"];

?>