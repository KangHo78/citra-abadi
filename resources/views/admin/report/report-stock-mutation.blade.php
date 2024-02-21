<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>
<style>
    *,
    *::after,
    *::before {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    :root {
        --blue-color: #0c2f54;
        --dark-color: #535b61;
        --white-color: #fff;
    }

    ul {
        list-style-type: none;
    }

    ul li {
        margin: 2px 0;
    }

    /* text colors */
    .text-dark {
        color: var(--dark-color);
    }

    .text-blue {
        color: var(--blue-color);
    }

    .text-end {
        text-align: right;
    }

    .text-center {
        text-align: center;
    }

    .text-start {
        text-align: left;
    }

    .text-bold {
        font-weight: 700;
    }

    /* hr line */
    .hr {
        height: 1px;
        background-color: rgba(0, 0, 0, 0.1);
    }

    /* border-bottom */
    .border-bottom {
        border-bottom: 1px solid rgba(0, 0, 0, 0.1);
    }

    body {
        font-family: 'Poppins', sans-serif;
        color: var(--dark-color);
        font-size: 14px;
    }

    .invoice-wrapper {
        min-height: 100vh;
        background-color: rgba(0, 0, 0, 0.1);
        padding-top: 20px;
        padding-bottom: 20px;
    }

    .invoice {
        max-width: 850px;
        margin-right: auto;
        margin-left: auto;
        background-color: var(--white-color);
        padding: 70px;
        border: 1px solid rgba(0, 0, 0, 0.2);
        border-radius: 5px;
        min-height: 920px;
    }

    .invoice-head-top-left img {
        width: 130px;
    }

    .invoice-head-top-right h3 {
        font-weight: 500;
        font-size: 27px;
        color: var(--blue-color);
    }

    .invoice-head-middle,
    .invoice-head-bottom {
        padding: 16px 0;
    }

    .invoice-body {
        border: 1px solid rgba(0, 0, 0, 0.1);
        border-radius: 4px;
        overflow: hidden;
    }

    .invoice-body table {
        border-collapse: collapse;
        border-radius: 4px;
        width: 100%;
    }

    .invoice-body table td,
    .invoice-body table th {
        padding: 12px;
    }

    .invoice-body table tr {
        border-bottom: 1px solid rgba(0, 0, 0, 0.1);
    }

    .invoice-body table thead {
        background-color: rgba(0, 0, 0, 0.02);
    }

    .invoice-body-info-item {
        display: grid;
        grid-template-columns: 80% 20%;
    }

    .invoice-body-info-item .info-item-td {
        padding: 12px;
        background-color: rgba(0, 0, 0, 0.02);
    }

    .invoice-foot {
        padding: 30px 0;
    }

    .invoice-foot p {
        font-size: 12px;
    }

    .invoice-btns {
        margin-top: 20px;
        display: flex;
        justify-content: center;
    }

    .invoice-btn {
        padding: 3px 9px;
        color: var(--dark-color);
        font-family: inherit;
        border: 1px solid rgba(0, 0, 0, 0.1);
        cursor: pointer;
    }

    .invoice-head-top,
    .invoice-head-middle,
    .invoice-head-bottom {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        padding-bottom: 10px;
    }

    @media screen and (max-width: 992px) {
        .invoice {
            padding: 40px;
        }
    }

    @media screen and (max-width: 576px) {

        .invoice-head-top,
        .invoice-head-middle,
        .invoice-head-bottom {
            grid-template-columns: repeat(1, 1fr);
        }

        .invoice-head-bottom-right {
            margin-top: 12px;
            margin-bottom: 12px;
        }

        .invoice * {
            text-align: left;
        }

        .invoice {
            padding: 28px;
        }
    }

    .overflow-view {
        overflow-x: scroll;
    }

    .invoice-body {
        min-width: 600px;
    }

    @media print {
        .print-area {
            visibility: visible;
            width: 100%;
            position: absolute;
            left: 0;
            top: 0;
            overflow: hidden;
        }

        .overflow-view {
            overflow-x: hidden;
        }

        .invoice-btns {
            display: none;
        }
    }
</style>
<body>
    <div class = "invoice-btns"
    style="position: fixed;width:100%;margin:0px !important;padding:10px;background-color:black;">
    <button type = "button" class = " btn btn-warning"  onclick="printInvoice()">
        <span>
            <i class="fa-solid fa-print"></i>
        </span>
        <span>Print</span>
    </button>
    <button type = "button" class = " btn btn-danger"  onclick="CreatePDFfromHTML()" style="margin-left:20px">
        <span>
            <i class="fa-solid fa-download"></i>
        </span>
        <span>Download</span>
    </button>
    <button type = "button" class = " btn btn-success"  onclick="exportToExcel()" style="margin-left:20px">
        <span>
            <i class="fa-solid fa-book"></i>
        </span>
        <span>Excel</span>
    </button>
    <button class = " btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" style="margin-left:20px">
        <span>
            <i class="fa-solid fa-search"></i>
        </span>
        <span>Filter</span>
    </button>

    <x-maz-modal></x-maz-modal>
</div>
    <div class = "invoice-wrapper" id = "print-area">
        <div class = "invoice" style="margin-top: 50px">
            <div class = "invoice-container">
                <div class = "invoice-head">
                    <div class = "invoice-head-top">
                        <div class = "invoice-head-top-left text-start">
                            <img src="{{ asset('images/logo/logo.png') }}">
                        </div>
                        <div class = "invoice-head-top-right text-end">
                            <h3>Laporan Mutasi Stock</h3>
                            <h5>Jl tenggilis Raya no 77</h5>
                            <h5>+62 8231 9323 34</h5>
                            <h5>www.mebel-modern.com</h5>
                        </div>
                    </div>
                    <div class = "hr"></div>
                    <br>
                </div>
                <div class = "overflow-view">
                    <div class = "invoice-body" id="invoice-body">
                        <table>
                            <thead>
                                <tr>
                                    <td class = "text-bold">#</td>
                                    <td class = "text-bold">Kode</td>
                                    <td class = "text-bold">Tanggal</td>
                                    <td class = "text-bold">Item</td>
                                    <td class = "text-bold">Warehouse</td>
                                    <td class = "text-bold">status</td>
                                    <td class = "text-bold">Qty</td>
                                </tr>
                            </thead>
                            <tbody>
                                @for ($i = 1; $i < 50; $i++)
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>SMT019200{{$i}}</td>
                                        <td>{{date('d F Y')}}</td>
                                        <td>Pakureng</td>
                                        <td>Pusat</td>
                                        <td>{{10*$i}}</td>
                                        <td>{{$i%3 ? "Masuk" : "Keluar"}}</td>
                                        {{-- <td class = "text-end">Rp. {{number_format(10000*$i,0,'.',',')}}</td> --}}
                                        {{-- <td class = "text-end">Rp. {{number_format(12000*$i,0,'.',',')}}</td> --}}
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class = "invoice-foot text-center">
                    <p><span class = "text-bold text-center">NOTE:&nbsp;</span>This is computer generated receipt and
                        does not require physical signature.</p>
                </div>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>
<script>
    function printInvoice() {
        window.print();
    }
</script>
<script>
    //Create PDf from HTML...
function CreatePDFfromHTML() {
    var HTML_Width = $(".invoice-wrapper").width();
    var HTML_Height = $(".invoice-wrapper").height();
    var top_left_margin = 15;
    var PDF_Width = HTML_Width + (top_left_margin * 2);
    var PDF_Height = (PDF_Width * 1.5) + (top_left_margin * 2);
    var canvas_image_width = HTML_Width;
    var canvas_image_height = HTML_Height;

    var totalPDFPages = Math.ceil(HTML_Height / PDF_Height) - 1;

    html2canvas($(".invoice-wrapper")[0]).then(function (canvas) {
        var imgData = canvas.toDataURL("image/jpeg", 1.0);
        var pdf = new jsPDF('p', 'pt', [PDF_Width, PDF_Height]);
        pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin, canvas_image_width, canvas_image_height);
        for (var i = 1; i <= totalPDFPages; i++) { 
            pdf.addPage(PDF_Width, PDF_Height);
            pdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height*i)+(top_left_margin*4),canvas_image_width,canvas_image_height);
        }

        const d = new Date();
        const date = d.getFullYear()+d.getMonth()+d.getDate()+d.getHours()+d.getMinutes();
        pdf.save("Invoice_Penjualan_"+date+".pdf");
        $(".invoice-wrapper").hide();
    });
}
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.3/xlsx.full.min.js"></script>
<script>
function exportToExcel() {
    var htmlTable = document.getElementById("invoice-body");
    var workbook = XLSX.utils.table_to_book(htmlTable);
    XLSX.writeFile(workbook, 'table.xlsx');
}
</script>
</script>
