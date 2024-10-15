<?php
$url = 'https://jsonplaceholder.typicode.com/users';
$json = file_get_contents($url);
$api = json_decode($json);

echo "<pre>";
echo count($api);
?>