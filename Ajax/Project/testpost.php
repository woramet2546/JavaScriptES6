<?php
$emp = $_REQUEST['employees'];
$key = [];
foreach($emp as $data){
   $key[] = $data;
}
print_r($key);