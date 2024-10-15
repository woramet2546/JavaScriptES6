<?php include "./database/select2.php"; ?>
    <div class="container-head mt-4">
        <div class="container-customer col-sm-12 px-4">
            <h4 class="text-secondary">Banner</h4>
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Upload
            </button>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Create Banner</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <!-- body -->
                        <div class="modal-body">
                            <form action="./database/insert.php" method="post" id="myForm" enctype="multipart/form-data" class="row g-3">
                                <div class="form-group col-sm-6">
                                    <label for="" class="form-label">ชื่อ(Branner)</label>
                                    <input type="text" name="name" class="form-control">
                                </div>

                                <div class="form-group col-sm-3">
                                    <label for="" class="form-label">เวลาที่อัพโหลด</label>
                                    <input type="text" name="date" class="form-control" value="<?php echo $date; ?>">
                                </div>

                                <div class="form-group col-sm-3">
                                    <label for="" class="form-label">สิ้นสุดวันที่</label>
                                    <input type="datetime-local" id="datetime" name="datetime" class="form-control">
                                </div>


                                <div class="form-group col-sm-6">
                                    <label for="image" class="form-label">เลือกภาพ:จากไฟล์</label>
                                    <input class="form-control" type="file" id="file" name="file" accept="image/gif, image/jpeg, image/png" required>
                                    <img src="" id="preview" style="display:none; width:auto; height:200px" class="mt-3">
                                </div>

                                <div class="col-sm-6">
                                    <label for="imageURLG" class="form-label">เลือกภาพ: URL</label>
                                    <input type="text" id="imageURLG" name="image_url" class="form-control" required>
                                    <img id="imageG" src="" style="display:none; width:auto; height:200px" class="mt-3">
                                </div>


                                <div class="col-sm-6">
                                    <label for="" class="form-label">ลักษณะ</label>
                                    <select name="work" id="work" class="form-control">
                                        <?php
                                        include "./database/select.php";
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) { ?>
                                                <option value="<?php echo $row['work']; ?>">
                                                    <?php echo $row['work'] ?></option>

                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-sm-6">
                                    <label for="" class="form-label">กำหนดสิทธิ์มองเห็น</label>
                                    <select class="form-control" name="status_employee" style="width: 200px;">
                                        <?php
                                        if ($result2->num_rows > 0) {
                                            while ($row2 = $result2->fetch_assoc()) {
                                        ?>
                                                <option value="<?php echo $row2['status_employee']; ?>"><?php echo $row2['status_employee']; ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>

                                </div>

                                <div class="form-check form-switch form-switch-sm col-sm-6 ms-2">
                                    <label class="form-check-label fst-normal text-body" for="toggleSwitch">เปิด/เปิดการทำงาน ปิดข้อมูล/หยุดการทำงาน</label>
                                    <input class="form-check-input" type="checkbox" id="status" name="toggleSwitch">
                                </div>

                        </div>
                        <div class="modal-footer">
                            <input type="submit" value="Accept" name="submit" class="btn btn-success">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </form>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Upload -->