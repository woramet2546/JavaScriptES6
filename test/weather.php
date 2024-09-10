<?php
include 'weatherpost.php';
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather API</title>
    <link rel="stylesheet" href="/CDN/bootstrap5/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body class="bg-dark bg-gradient" style="height: 100vh;">

    <div class="container text-center flex-column col-sm-5 shadow p-3 mb-5 mt-5 bg-body rounded bg-light bg-gradient">
        <h1 class="alert alert-success">API สภาพอากาศ</h1>
        <form action="" method="POST" class="form-group text-center">
            <div class="container d-flex justify-content-center">
                <input type="text" name="city" placeholder="กรอกชื่อเมือง" required class="form-control" style="width: 80%;">
                <input type="submit" value="ค้นหา" class="btn btn-primary">
            </div>

            <?php if ($main) {
                include 'function.php'; ?>
                <h3><?php echo "(" . $namecity . ") " . $country; ?></h3>
                <div class="div d-flex justify-content-center align-items-center">
                    <h1 class="font"><?php echo number_format(cal($temp)) ?>°C</h1>
                    <p><?php echo $img ?></p>
                </div>
                <table class="table table-dark rounded-pill">
                    <thead>
                        <tr>
                            <th>สภาพอากาศ</th>
                            <th>บรรยากาศ</th>
                            <th>อุณหภูมิสูงสุด</th>
                            <th>อุณหภูมิต่ำสุด</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $main ?></td>
                            <td><?php echo $description ?></td>
                            <td><?php echo $temp_max ?></td>
                            <td><?php echo $temp_min ?></td>
                        </tr>
                    </tbody>
                </table>

            <?php } ?>
    </div>
    </form>
</body>

</html>