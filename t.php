<?php
// สมมติว่าคุณมีการดึงข้อมูลจากฐานข้อมูลและเก็บในตัวแปร
$currentValue = "UPLOAD FILE"; // ค่านี้ควรจะมาจากฐานข้อมูลหรือค่าที่ส่งมาจากฟอร์ม

// สมมติว่าคุณมีข้อมูลใน array หรือการดึงข้อมูลจากฐานข้อมูล
$rows = [
    ['sum' => 'WEBVIEW'],
    ['sum' => 'UPLOAD FILE'],
    ['sum' => 'TOWEB'],
];

$currentValue = [
    ['id' => 1, 'sum' => 'WEBVIEW'],
    ['id' => 2, 'sum' => 'TOWEB'],
    ['id' => 3, 'sum' => 'UPLOAD FILE'],
];


?>

<select name="fruits" id="fruits">
    <?php foreach ($rows as $row): ?>
        <option value="<?php echo $row['sum']; ?>"
            <?php echo ($row['sum'] == $currentValue) ? 'selected' : ''; ?>>
            <?php echo $row['sum']; ?>
        </option>
    <?php endforeach; ?>
</select>

<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Sum</th>
            <th>Actions</th> <!-- เพิ่มคอลัมน์สำหรับปุ่ม Edit -->
        </tr>
    </thead>
    <tbody>
        <?php foreach ($rows as $row): ?>
            <tr>
                <td><?php echo $currentValue['id']; ?></td>
                <td><?php echo $currentValue['sum']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-edit">Edit</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>