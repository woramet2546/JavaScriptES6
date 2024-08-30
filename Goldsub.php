<?php
$apitxt = "http://www.thaigold.info/RealTimeDataV2/gtdata_.txt";
// $api = "https://api.chnwt.dev/thai-gold-api/latest";

$js = file_get_contents($apitxt);
// $json = file_get_contents($api);

$data = json_decode($js, true);
// $data = json_decode($json, true);
// print_r($data_sub);

foreach ($data as $object) {
	//เก็บรายชื่อ
	$containerName = $object['name'];
	//ราคาซื้อ
	$containerBuy = $object['bid'];
	//เก็บราคาขาย	
	$containerSell = $object['ask'];
	// อัตราการเปลี่ยนแปลง
	$containerdif = $object['diff'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->
</head>

<body>
	<table class="table table-dark table-striped">
		<thead>
			<?php
			echo "<tr>";
			echo "<th scope='col'>";
			echo $containerName;

			echo "</th>";
			?>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th scope="row">1</th>
				<td>#</td>
				<td>#</td>
			</tr>
		</tbody>

	</table>
</body>

</html>