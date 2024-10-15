<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- jQuery UI for Autocomplete -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</head>
<form>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="subdistrict" class="form-label">ตำบล</label>
                    <input type="text" class="form-control" id="subdistrict" name="subdistrict" placeholder="กรอกชื่อตำบล" autocomplete="off">
                </div>
                <div class="mb-3">
                    <label for="province" class="form-label">จังหวัด</label>
                    <input type="text" class="form-control" id="province" name="province" placeholder="กรอกชื่อจังหวัด" autocomplete="off">
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="district" class="form-label">อำเภอ</label>
                    <input type="text" class="form-control" id="district" name="district" placeholder="กรอกชื่ออำเภอ" autocomplete="off">
                </div>
                <div class="mb-3">
                    <label for="zipcode" class="form-label">รหัสไปรษณีย์</label>
                    <input type="text" class="form-control" id="zipcode" name="zipcode" placeholder="กรอกรหัสไปรษณีย์" autocomplete="off">
                </div>
            </div>
        </div>
    </form>

<script>
    $(document).ready(function() {
        function setupAutocomplete(inputId, field) {
            $(inputId).autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: "fetch.php",
                        type: "POST",
                        dataType: "json",
                        data: {
                            query: request.term
                        },
                        success: function(data) {
                            response($.map(data, function(item) {
                                var label = item.subdistrict + ' > ' + item.district + ' > ' + item.province + ' > ' + item.zipcode;

                                // ตรวจสอบว่ากำลังค้นหาในฟิลด์ใด และไฮไลต์ตามนั้น
                                var highlightLabel = label.replace(
                                    new RegExp(request.term, "gi"),
                                    function(match) {
                                        return "<span class='highlight'>" + match + "</span>";
                                    }
                                );

                                return {
                                    label: highlightLabel, // เพิ่ม HTML สำหรับการไฮไลต์
                                    value: item[field], // กำหนดค่าที่ต้องการแสดงใน input
                                    item: item // ส่ง object ทั้งหมดเพื่อใช้กับช่องอื่น
                                };
                            }));
                        }
                    });
                },
                minLength: 1,
                select: function(event, ui) {
                    $('#subdistrict').val(ui.item.item.subdistrict);
                    $('#district').val(ui.item.item.district);
                    $('#province').val(ui.item.item.province);
                    $('#zipcode').val(ui.item.item.zipcode);
                }
            }).autocomplete("instance")._renderItem = function(ul, item) {
                return $("<li>").append("<div>" + item.label + "</div>").appendTo(ul);
            };
        }

        // ตั้งค่า Auto-Complete สำหรับแต่ละช่อง
        setupAutocomplete("#subdistrict", "subdistrict"); // สำหรับตำบล
        setupAutocomplete("#district", "district"); // สำหรับอำเภอ
        setupAutocomplete("#province", "province"); // สำหรับจังหวัด
        setupAutocomplete("#zipcode", "zipcode"); // สำหรับรหัสไปรษณีย์
    });
</script>