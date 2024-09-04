<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">  
<link rel="stylesheet" href="//cdn.datatables.net/buttons/1.4.1/css/buttons.dataTables.min.css">
<script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.4.1/js/dataTables.buttons.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="js/vfs_fonts.js"></script>
<script src="//cdn.datatables.net/buttons/1.4.1/js/buttons.html5.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.4.1/js/buttons.print.min.js"></script>

</head>
<body>
 
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
     bold: 'THSarabun Bold.ttf',
     italics: 'THSarabun Italic.ttf',
     bolditalics: 'THSarabun BoldItalic.ttf'
   }
}

$(function(){
    $('#table_server_id').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            "url": "ajaxdata')",
            "data": function() {
                return {
                    "page": function() {
                        var dataTable1 = $('#table_server_id').DataTable();
                        return dataTable1.page.info().page;
                    }
                }
            },
            "type": "POST"
        },
        "columnDefs": [
            {
                "targets": [ 0 ],
                "orderable": false
            }
        ],
        "dom": 'Bfrtip',
        "buttons": [
            'copy', 'excel',
            {
                "extend": 'pdf',
                "text": 'PDF',
                "pageSize": 'A4',
                "customize": function(doc) {
                    doc.defaultStyle = {
                        font: 'THSarabun',
                        fontSize: 16
                    };
                    doc.content[1].table.widths = [50, 'auto', '', ''];
                    doc.styles.tableHeader.fontSize = 16;
                    
                    var rowCount = doc.content[1].table.body.length;
                    for (var i = 1; i < rowCount; i++) {
                        doc.content[1].table.body[i][0].alignment = 'center';
                        doc.content[1].table.body[i][1].alignment = 'center';
                        doc.content[1].table.body[i][2].alignment = 'left';
                        doc.content[1].table.body[i][3].alignment = 'right';
                    }
                }
            },
            'print', 'pageLength'
        ]
    });
});
</script>

</body>
</html>