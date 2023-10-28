<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    exec("rm output.mp3");
    $text = $_POST['input'];
    $url = "https://eastus.tts.speech.microsoft.com/cognitiveservices/v1";
    $subscription_key = "e8413e6a1ad84a46b6eeb4bb3d01a843";
    $output_format = "audio-16khz-128kbitrate-mono-mp3";
    $data = "<speak version='1.0' xml:lang='en-US'><voice xml:lang='en-US' xml:gender='Female' name='en-US-JennyNeural'>$text</voice></speak>";
    $command = "curl --location --request POST \"$url\" --header \"Ocp-Apim-Subscription-Key: $subscription_key\" --header \"Content-Type: application/ssml+xml\" --header \"X-Microsoft-OutputFormat: $output_format\" --header \"User-Agent: curl\" --data-raw \"$data\" --output output.mp3";
    $response = exec($command);
    echo "<audio controls autoplay><source src='output.mp3' type='audio/mpeg'></audio>";
    
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Text to Speech</title>
</head>
<body>
    <form method="post">
        <label for="input">Enter text:</label>
        <input type="text" name="input" id="input">
        <button type="submit">Submit</button>
    </form>
</body>
</html>
