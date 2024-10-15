        $(document).ready(function() {
            // แสดงภาพเมื่อเลือกไฟล์
            $('#file').on('change', function() {
                var file = this.files[0];
                if (file) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#preview').attr('src', e.target.result).show(); // แสดงภาพ
                        $('#file-name').text(file.name).show(); // แสดงชื่อไฟล์
                    }
                    reader.readAsDataURL(file); // อ่านไฟล์เป็น URL
                }
            });
        });
