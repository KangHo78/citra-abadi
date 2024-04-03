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

    #customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #customers td,
    #customers th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #customers tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #customers tr:hover {
        background-color: #ddd;
    }

    #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #04AA6D;
        color: white;
    }
</style>

<body>
    </div>
    <div class = "invoice-wrapper" id = "print-area">
        <div class = "invoice" style="margin-top: 50px">
            <div class = "invoice-container">
                <div class = "invoice-head">
                    <div class = "invoice-head-top">
                        <div class = "invoice-head-top-left text-start">
                            <img width="100px"
                                src="https://images.tokopedia.net/img/cache/215-square/GAnVPX/2023/3/9/4f15d93d-0a84-4017-8e6a-b8514ee05dbc.png">
                        </div>
                        <div class = "invoice-head-top-right text-end">
                            <h3>Enquire</h3>
                            {{-- <h5>Jl tenggilis Raya no 77</h5>
                            <h5>+62 8231 9323 34</h5>
                            <h5>citraabaditeknik.com</h5> --}}
                        </div>
                    </div>
                    <div class = "hr"></div>
                    <br>
                </div>
                <div class = "overflow-view">
                    <div class = "invoice-body" id="invoice-body">
                        <div class="responsive" style="overflow:auto">
                            <table width="100%" id="customers">
                                <thead>
                                    <tr>
                                        {{-- <th style="vertical-align: middle;text-align: center;">NO</th> --}}
                                        <th style="vertical-align: middle;text-align: center;">Item</th>
                                        <th style="vertical-align: middle;text-align: center;">
                                            Code/SKU
                                        </th>
                                        <th style="vertical-align: middle;text-align: center;">
                                            Material
                                        </th>
                                        <th style="vertical-align: middle;text-align: center;">Spec
                                        </th>
                                        <th style="vertical-align: middle;text-align: center;">
                                            Class
                                        </th>
                                        <th style="vertical-align: middle;text-align: center;">Conn
                                        </th>
                                        <th style="vertical-align: middle;text-align: center;">Size
                                        </th>
                                        <th style="vertical-align: middle;text-align: center;" class="text-end">Qty</th>
                                    </tr>
                                </thead>
                                <tbody>


                                    @foreach ($cart as $i => $el)
                                        <tr>
                                            {{-- <td style="vertical-align: middle;text-align: center;">
                                                {{ $i++ }}
                                            </td> --}}

                                            <td style="vertical-align: middle;text-align: center;">{{ $el->item->name }}</td>
                                            <td style="vertical-align: middle;text-align: center;">{{ $el->item_detail->sku }}</td>
                                            <td style="vertical-align: middle;text-align: center;">{{ $el->item_detail->material->name }}</td>
                                            <td style="vertical-align: middle;text-align: center;">{{ $el->item_detail->spec->name }}</td>
                                            <td style="vertical-align: middle;text-align: center;">{{ $el->item_detail->classes->name }}</td>
                                            <td style="vertical-align: middle;text-align: center;">{{ $el->item_detail->conn->name }}</td>
                                            <td style="vertical-align: middle;text-align: center;">{{ $el->item_detail->size->name }}</td>
                                            <td style="vertical-align: middle;text-align: center;">{{ $el->qty }}</td>
                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
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


</script>
