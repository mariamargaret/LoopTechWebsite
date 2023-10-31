<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    exec("rm output.mp3");
    $text = $_POST['input'];
    $timestamp = $_POST['gmtstamp'];
    $url = "https://eastus.tts.speech.microsoft.com/cognitiveservices/v1";
    $subscription_key = "e8413e6a1ad84a46b6eeb4bb3d01a843";
    $output_format = "audio-16khz-128kbitrate-mono-mp3";
    $data = "<speak version='1.0' xml:lang='en-US'><voice xml:lang='en-US' xml:gender='Female' name='en-US-JennyNeural'>$text</voice></speak>";
    $command = "curl --location --request POST \"$url\" --header \"Ocp-Apim-Subscription-Key: $subscription_key\" --header \"Content-Type: application/ssml+xml\" --header \"X-Microsoft-OutputFormat: $output_format\" --header \"User-Agent: curl\" --data-raw \"$data\" --output \"$timestamp\"-output.mp3";
    $response = exec($command);
    
    
}
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Expires" content="0" />
    <title>Text to Speech</title>
</head>
<body>
    <form method="post">
        <input type="hidden" name="gmtstamp" value="<?php gmdate("Y-m-d\TH:i:s\Z"); ?>" />
        <label for="input">Enter text:</label>
        <input type="text" name="input" id="input">
        <button type="submit">Submit</button> 
    </form>
    <?php
         echo "<audio controls ><source src='$timestamp-output.mp3' type='audio/mpeg'></audio>";
    ?>

</body>
</html>
