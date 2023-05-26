<?php
$prompt = "test";
foreach ($_POST as $key => $value) {
    $prompt = $value;
}

echo "your prompt is \"" . $prompt . "\". You are rick rolled !";
?>