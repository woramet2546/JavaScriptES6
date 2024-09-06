<?php
$api = "https://api.chnwt.dev/thai-gold-api/latest";
$json = file_get_contents($api);
$data = json_decode($json, true);

$dataPrice = $data['response']['price'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="/boostrap5/cdn_boostrap5.css">
	<link rel="stylesheet" href="Gold.css">
	<!-- <link rel="stylesheet" href="//cdn.datatables.net/2.1.4/css/dataTables.dataTables.min.css"> -->
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample08" aria-controls="navbarsExample08" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
  
		<div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample08">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="index.html">เปลี่ยนสกุลเงิน</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Weather.html">ตรวจสภาพอากาศ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Gold.php">ราคาทอง</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Oil.php">เช็คราคาน้ำมัน</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="bitcoin.php">ราคาเหรียญBTC</a>
        </li>
      </ul>
    </div>
      </nav>


	<div class="container-sm">
		<table class="table table-striped table-hover border mt-1" id="myTable">
			<thead class="text-center border">
				<h3 class="text-center">
					<img src="https://rakatong.com/wp-content/uploads/2021/09/gold-traders-as-logo.png" width="50px" height="50px">
					สมาคมการค้าทาง
				</h3>
				<h3 class="text-center alert alert-success">
					<?php
					if (isset($data['response']['date'])) {
						echo "(อัพเดทราคาล่าสุดเมื่อวันที่ " . $data['response']['date'];

						if (isset($data['response']['update_time'])) {
							echo $data['response']['update_time'] . ")";
						} else {
							echo "-";
						}
					}
					// $date2->setTimezone(new DateTimeZone('Asia/Bangkok'));
					?>
				</h2>
				<div class="container-sm">
				<h4 class="text-center">
				<?php
					date_default_timezone_set('Asia/Bangkok'); // ตั้งโซนเวลาเป็น Bangkok
					echo date("วันเวลาปัจจุบัน ".'d/m/Y H:i:s '); // แสดงวันที่และเวลาในรูปแบบวันที่/เดือน/ปี ชั่วโมง:นาที:วินาที
					?>
				</h4>
				</div>
				<div class="container-sm d-flex">

					<p class="">
						วันนี้
					<div class="">
						<?php

						if (isset($dataPrice['change']['compare_previous'])) {
							echo $dataPrice['change']['compare_previous'];

							if ($dataPrice['change']['compare_previous'] > 0) {
								// แสดงรูปภาพเมื่อค่า compare_previous มากกว่า 0
								echo '<img src="img/up-arrow.png" width="30px" height="30px">';
							} elseif ($dataPrice['change']['compare_previous'] < 0) {
								// แสดงรูปภาพเมื่อค่า compare_previous น้อยกว่า 0
								echo '<img src="img/decrease.png" width="30px" height="30px">';
							} else {
								// แสดงรูปภาพเมื่อค่า compare_previous เท่ากับ 0
								echo 'ยังไม่ได้คิด';
							}
						} else {
							echo '.';
						}
						?>
					</div>

					</p>
				</div>
	</div>

	<tr>
		<td class="border-left">
			ประเภททอง
		</td>
		<th>
			ราคาขาย
		</th>
		<th>
			ราคารับซื้อ
		</th>
		<th>
			ราคาต่อกรัม
		</th>
	</tr>
	</thead>
	<tbody>
		<tr class="text-center">
	
			<!-- <td>
						
					</td> -->
		</tr>
		<!-- สิ้นสุดขอบเขตทองแท่ง -->

		<!-- ขอบเขตทองรูปพรรณ -->
		<tr class="text-center">
			<td class="col-sm-2">
				<?php
				if (isset($dataPrice)) {
					foreach ($dataPrice as $nameData => $nameGold) {
						if ($nameData == 'gold') {
							echo "ทองคำรูปพรรณ 96.5%";
						}
					}
				}
				?>
			<td>
				<?php
				if (isset($dataPrice['gold']['buy'])) {
					echo ($dataPrice['gold']['buy']);
				}
				?>
			</td>
			<td>
				<?php
				if (isset($dataPrice['gold']['sell'])) {
					echo ($dataPrice['gold']['sell']);
				}
				?>
			</td>
			<td>
				<?php
				$goldSellPrice = (float) $dataPrice['gold']['buy'] / 15.65;
				$formattedGoldSellPrice = number_format($goldSellPrice * 1000, 2);

				echo $formattedGoldSellPrice;

				?>
			</td>
			<!-- <td colspan= "2">  -->
			<?php

			?>
			<!-- </td> -->

		</tr>


	</tbody>
	</table>

	<table class="table table-striped table-hover border mt-1" id="myTable">
			<thead class="text-center border">
				
					


	<tr>
		<td class="border-left">
			ประเภททอง
		</td>
		<th>
			ราคาขาย
		</th>
		<th>
			ราคารับซื้อ
		</th>
	</tr>
	</thead>
	<tbody>
		<tr class="text-center">
			<td>
				<?php
				if (isset($dataPrice)) {
					foreach ($dataPrice as $nameData => $nameGold) {
						if ($nameData == 'gold_bar') {
							echo "ทองคำแท่ง 96.5%";
						}
					}
				}
				?>
			</td>
			<td>
				<?php
				if (isset($dataPrice['gold_bar']['buy'])) {
					echo ($dataPrice['gold_bar']['buy']);
				}
				?>
			</td>
			<td>
				<?php
				if (isset($dataPrice['gold_bar']['sell'])) {
					echo ($dataPrice['gold_bar']['sell']);
				}
				?>
			</td>

		</tr>


	</tbody>
	</table>


	</div>
<!-- <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="//cdn.datatables.net/2.1.4/js/dataTables.min.js"></script> -->
<script>
	let table = new DataTable('#myTable');
</script>
</body>

</html>