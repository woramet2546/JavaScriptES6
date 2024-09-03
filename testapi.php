<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>examples</title>
  <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet" />
  <link href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap5.min.css" rel="stylesheet" />
  <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
  <link href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.bootstrap5.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body class="container">
  <h1>examples</h1>
  <table id="dataTable" class="table table-striped" style="width: 100%">
    <thead>
      <tr>
        <th>ลำดับ</th>
        <th>ชื่อ</th>
        <th>หัวหน้าโครงการ</th>
        <th>ผู้ร่วมโครงการ</th>
        <th>งบประมาณทั้งสิ้น</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>โคงการทดสอบ</td>
        <td>ทดสอบ</td>
        <td>ทดสอบ</td>
        <td>ทดสอบ</td>
      </tr>
    </tbody>
    <tfoot>
      <tr>
        <th>ลำดับ</th>
        <th>ชื่อ</th>
        <th>หัวหน้าโครงการ</th>
        <th>ผู้ร่วมโครงการ</th>
        <th>งบประมาณทั้งสิ้น</th>
      </tr>
    </tfoot>
  </table>

  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.bootstrap5.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.colVis.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.4.1/js/responsive.bootstrap5.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="vfs_fonts.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</body>

</html>

<script language="JavaScript" type="text/javascript">
    var table = new DataTable('#myTable', {
    language: {
        url: '//cdn.datatables.net/plug-ins/2.1.5/i18n/th.json',
    },
});
  $(document).ready(function () {
    pdfMake.fonts = {
      THSarabun: {
        normal: "THSarabun.ttf",
        bold: "THSarabun-Bold.ttf",
        italics: "THSarabun-Italic.ttf",
        bolditalics: "THSarabun-BoldItalic.ttf",
      },
    };
    var dataTable = $("#dataTable").DataTable({
      lengthChange: false,
      responsive: true,
      dom: "Bfrtip",
      buttons: [
        "csv",
        "excel",
        {
          extend: "pdf",
          text: "PDF",
          pageSize: "LEGAL",
          orientation: "portrait", //'landscape',
          title: "ข้อมูลโครงการ",
          exportOptions: {
            columns: [0, 1, 2, 3, 4],
          },
          customize: function (doc) {
            // กำหนด style หลัก
            doc.defaultStyle = {
              font: "THSarabun",
              fontSize: 12,
            };
            doc.content[1].table.widths = ["10%", "20%", "20%", "20%", "20%"];
            doc.styles.tableHeader.fontSize = 14;
            var rowCount = doc.content[1].table.body.length;
            for (i = 1; i < rowCount; i++) {
              doc.content[1].table.body[i][0].alignment = "center";
              doc.content[1].table.body[i][1].alignment = "center";
              doc.content[1].table.body[i][2].alignment = "center";
              doc.content[1].table.body[i][3].alignment = "center";
              doc.content[1].table.body[i][4].alignment = "center";
            }
          },
        },
      ],
    });
    dataTable.buttons().container().appendTo("#dataTable .col-md-6:eq(0)");
  });
</script>