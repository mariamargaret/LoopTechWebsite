<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve input from text field
    $input = $_POST['input'];
    

    // Read curl command from file
    $curl_command = file_get_contents('curl_command.txt');

    // Replace input placeholder with actual input
    $data1 = {$predata1}{$input}{$postdata1};
    echo $data1;
    $curl_command = str_replace('{input}', $data1, $curl_command);

    echo $curl_command;
    echo "<br>";

    // Execute curl command
    $response = exec($curl_command);

    // Play audio file
    echo "<audio controls autoplay><source src='output.mp3' type='audio/mpeg'></audio>";
    echo $response;
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
        <input type="hidden" name="predata1" id="predata1" value="<speak version='1.0' xml:lang='en-US'><voice xml:lang='en-US' xml:gender='Female' name='en-US-JennyNeural'>">
        <input type="hidden" name="postdata1" id="postdata1" value="</voice></speak>">
        <input type="text" name="input" id="input">
        <button type="submit">Submit</button>
    </form>
</body>
</html>
