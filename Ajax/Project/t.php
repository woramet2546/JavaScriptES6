<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/CDN/bootstrap5/css/bootstrap.min.css">
    <style>
        * {
            font-size: 14.5px;
        }

        body {
            font-family: Arial, sans-serif;
        }

        form {
            margin-bottom: 20px;
        }

        ul {
            list-style-type: none;
        }

        li {
            padding: 5px 0;
        }
    </style>
</head>

<body>
    <div class="d-flex">
        <!-- Box Menu -->
        <div class="flex-shrink-0 p-3 bg-success d-inline-block" style="width: 280px; height:100vh;">
            <a href="/" class="d-flex align-items-center pb-3 mb-3 link-body-emphasis text-decoration-none border-bottom">
                <svg class="bi pe-none me-2" width="30" height="24">
                    <use xlink:href="#bootstrap"></use>
                </svg>
                <span class="fs-5 fw-semibold">Collapsible</span>
            </a>
            <ul class="list-unstyled ps-0">
                <li class="mb-1">
                    <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="false">
                        Home
                    </button>
                    <div class="collapse" id="home-collapse" style="">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Overview</a></li>
                            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Updates</a></li>
                            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Reports</a></li>
                        </ul>
                    </div>
                </li>
                <li class="mb-1">
                    <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
                        Dashboard
                    </button>
                    <div class="collapse" id="dashboard-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Overview</a></li>
                            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Weekly</a></li>
                            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Monthly</a></li>
                            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Annually</a></li>
                        </ul>
                    </div>
                </li>
                <li class="mb-1">
                    <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
                        Orders
                    </button>
                    <div class="collapse" id="orders-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">New</a></li>
                            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Processed</a></li>
                            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Shipped</a></li>
                            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Returned</a></li>
                        </ul>
                    </div>
                </li>
                <li class="border-top my-3"></li>
                <li class="mb-1">
                    <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
                        Account
                    </button>
                    <div class="collapse" id="account-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">New...</a></li>
                            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Profile</a></li>
                            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Settings</a></li>
                            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Sign out</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>

        <!-- Box Table -->
        <div class="container-sm">
            <table class="table table-bordered">
                <thead class="table-dark text-light">
                    <tr>

                        <th style="width:155px;">รูปภาพ</th>
                        <th>ประเภท</th>
                        <th>หมายเลข</th>
                        <th style="width:120px;">ชื่ออุปกรณ์และเครื่องจักร</th>
                        <th>ผู้รายงาน</th>
                        <th>แผนก</th>
                        <th>ตรวจสอบ</th>
                        <th>สถานะ</th>
                        <th>ตัวเลือก</th>
                        <th>วันที่รายงาน</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>

                        <td><img src="https://image.made-in-china.com/202f0j00DvCWcHpZknzw/Offshore-Nuclear-Power-Platform-Generating-Steam-Turbine.webp" style="width:150px;height:auto"></td>
                        <td>เครื่องจักร</td>
                        <td>A0001</td>
                        <td>เครื่องพ่นสี</td>
                        <td>วรเมธ ศรีสว่าง</td>
                        <td>Blockset</td>
                        <td><button type="submit" class="btn btn-outline-primary btn-sm">รายละเอียด</button></td>
                        <td class="">รออนุมัติ</td>
                        <td><button type="submit" class="btn btn-success btn-sm">อนุมัติ</button></td>
                        <td>22/00/2567</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    

</body>

</html>