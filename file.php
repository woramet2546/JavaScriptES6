<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File</title>
</head>

<body>
    <form action="database.php" enctype="multipart/form-data" method="post">
        <input type="file" name="image" accept="image/*">
        <input type="submit" name="submit" value="upload">
    </form>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>รูปภาพ</th>
            </tr>
        </thead>
        <tbody>
            <?php include "select.php"; ?>
            <?php
            if ($result->num_rows > 0) {
                // วนลูปเพื่อแสดงผลข้อมูล
                while ($row = $result->fetch_assoc()) {
                    // แสดงข้อมูลในแต่ละแถว  
            ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td>
                            <img src="<?php echo $row['image']; ?>" alt="">
                        </td>

                    </tr>
            <?php
                }
            } else {
                echo "<td colspan='2'>0 results</td>"; // หากไม่มีข้อมูล แสดงผลในแถวเดียว
            }
            ?>

        </tbody>
    </table>
</body>

</html>