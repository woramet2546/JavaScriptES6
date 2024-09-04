<link rel="stylesheet" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">  
<link rel="stylesheet" href="//cdn.datatables.net/buttons/1.4.1/css/buttons.dataTables.min.css">
<script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.4.1/js/dataTables.buttons.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="<?=base_url('js/vfs_fonts.js')?>"></script>
<script src="//cdn.datatables.net/buttons/1.4.1/js/buttons.html5.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.4.1/js/buttons.print.min.js"></script>
  
<table id="table_server_id" class="display">
    <thead>
        <tr>
            <th>#</th>
            <th>Province ID</th>
            <th>Province Name TH</th>
            <th>Province Name ENG</th>
        </tr>
    </thead>
</table>
    
<script type="text/javascript">
pdfMake.fonts = {
   THSarabun: {
     normal: 'THSarabun.ttf',
     bold: 'THSarabun-Bold.ttf',
     italics: 'THSarabun-Italic.ttf',
     bolditalics: 'THSarabun-BoldItalic.ttf'
   }
}
$(function(){
     $('#table_server_id').DataTable( {
        "processing": true, // แสดงข้อความกำลังดำเนินการ กรณีข้อมูลมีมากๆ จะสังเกตเห็นง่าย
        "serverSide": true,  // ใช้งานในโหมด Server-side processing
        "order": [], // กำหนดให้ไม่ต้องการส่งการเรียงข้อมูลค่าเริ่มต้น จะใช้ค่าเริ่มต้นตามค่าที่กำหนดในไฟล์ php
        "ajax": {
            "url": "<?=base_url("ajaxdata")?>", // ไฟล์ Server script php
            "data":{   // เพิ่มตัวแปรที่ต้องกาส่งเข้าไปแบบกำหนดเอง
                "page":function(){ // ใข้ข้อมูลตัวแปรชื่อ page
                    var dataTable1 = $('#table_server_id').DataTable(); // จะใช้ข้อมูลอ้างอิงจาก dataTable
                    return dataTable1.page.info().page; // ส่งค่าเลขหน้าปัจจุบันไปไว้ในตัวแปร page ค่าเรี่มต้นนับจาก 0
                }
            },
            "type": "POST"  // ส่งข้อมูลแบบ post
        },
        "columnDefs": [  // กำหนดลักษณะพิเสษเฉพาะสำหรับคอลัมน์ตารางที่ต้องการ
            { 
                "targets": [ 0 ], // เราต้องการกำหนดคอลัมน์แรก ค่าเริ่มต้นที่ 0
                "orderable": false, // ให้ไม่ต้องสามารถเรียงข้อมูลได้ เพราะเป็นลำดับรายการเฉยๆ 
            }
        ],
        "dom": 'Bfrtip',
        "buttons": [
            'copy', 'excel',
            { // กำหนดพิเศษเฉพาะปุ่ม pdf
                "extend": 'pdf', // ปุ่มสร้าง pdf ไฟล์
                "text": 'PDF', // ข้อความที่แสดง
                "pageSize": 'A4',   // ขนาดหน้ากระดาษเป็น A4            
                "customize":function(doc){ // ส่วนกำหนดเพิ่มเติม ส่วนนี้จะใช้จัดการกับ pdfmake
                    // กำหนด style หลัก
                    doc.defaultStyle = {
                        font:'THSarabun',
                        fontSize:16                                 
                    };
                    // กำหนดความกว้างของ header แต่ละคอลัมน์หัวข้อ
                    doc.content[1].table.widths = [ 50, 'auto', '*', '*' ];
                    doc.styles.tableHeader.fontSize = 16; // กำหนดขนาด font ของ header
                    var rowCount = doc.content[1].table.body.length; // หาจำนวนแะวทั้งหมดในตาราง
                    // วนลูปเพื่อกำหนดค่าแต่ละคอลัมน์ เช่นการจัดตำแหน่ง
                    for (i = 1; i < rowCount; i++) { // i เริ่มที่ 1 เพราะ i แรกเป็นแถวของหัวข้อ
                        doc.content[1].table.body[i][0].alignment = 'center'; // คอลัมน์แรกเริ่มที่ 0
                        doc.content[1].table.body[i][1].alignment = 'center';
                        doc.content[1].table.body[i][2].alignment = 'left';
                        doc.content[1].table.body[i][3].alignment = 'right';
                    };                                  
                    console.log(doc); // เอาไว้ debug ดู doc object proptery เพื่ออ้างอิงเพิ่มเติม
                }
            }, // สิ้นสุดกำหนดพิเศษปุ่ม pdf
            'print' , 'pageLength'
        ]       
    } );
});
</script>