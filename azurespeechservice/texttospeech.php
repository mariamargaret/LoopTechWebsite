<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve input from text field
    $input = $_POST['input'];

    // Read curl command from file
    $curl_command = file_get_contents('curl_command.txt');

    // Replace input placeholder with actual input
    $curl_command = str_replace('{input}', $input, $curl_command);

    // Execute curl command
    exec($curl_command);

    // Play audio file
    echo "<audio autoplay><source src='audio.mp3' type='audio/mpeg'></audio>";
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
