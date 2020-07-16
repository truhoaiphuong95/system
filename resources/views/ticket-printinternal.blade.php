<html>

<head>
    <style>
        #invoice-POS {
            /* box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5); */
            padding: 2mm;
            margin: 0 auto;
            width: 44mm;
            background: #FFF;
            font-family: monospace;
        }

        #invoice-POS ::selection {
            background: #f31544;
            color: #FFF;
        }

        #invoice-POS ::moz-selection {
            background: #f31544;
            color: #FFF;
        }

        #invoice-POS h1 {
            font-size: 1.5em;
            color: #222;
        }

        #invoice-POS h2 {
            font-size: 1rem;
        }

        #invoice-POS h3 {
            font-size: 1.2em;
            font-weight: 300;
            line-height: 2em;
        }

        #invoice-POS p {
            /* font-size: .7em; */
            color: #000;
            line-height: 1.2em;
        }

        #invoice-POS #top,
        #invoice-POS #mid,
        #invoice-POS #bot {
            /* Targets all id with 'col-' */
            border-bottom: 1px solid #EEE;
        }

        #invoice-POS #bot {
            min-height: 50px;
        }

        #invoice-POS #top .logo {
            height: 90px;
            width: 90px;
            background-size: 90px 90px;
        }

        #invoice-POS #top .logo2 {
            height: 30px;
            width: 90px;
            background-size: 90px 30px;
        }

        #invoice-POS .clientlogo {
            float: left;
            height: 60px;
            width: 60px;
            background: url(http://michaeltruong.ca/images/client.jpg) no-repeat;
            background-size: 60px 60px;
            border-radius: 50px;
        }

        #invoice-POS .info {
            display: block;
            margin-left: 0;
        }

        #invoice-POS .title {
            float: right;
        }

        #invoice-POS .title p {
            text-align: right;
        }

        #invoice-POS table {
            width: 100%;
            border-collapse: collapse;
        }

        #invoice-POS .tabletitle {
            font-size: .5em;
            background: #EEE;
        }

        #invoice-POS .tabletitle td{
            padding: 5px 0px;
        }

        #invoice-POS .tabletitle h2 {
            margin: 0px;
        }

        #invoice-POS .service {
            border-bottom: 1px solid #EEE;
        }

        #invoice-POS .item {
            width: 24mm;
        }

        #invoice-POS .itemtext {
            font-size: .9rem;
        }

        #invoice-POS #legalcopy {
            margin-top: 5mm;
        }


    </style>
</head>

<body>

    <div id="invoice-POS">

        <center id="top">
            <div class="info">
                <h2 style="font-size: 1.3rem">BIÊN NHẬN #{{ $ticket->id }}</h2>
            </div>
            <!--End Info-->
        </center>
        <!--End InvoiceTop-->

        <div id="mid">
            <div class="info">
                <p>
                    <span style="font-size: 1.1rem; text-transform: uppercase; font-weight: bold">{{ $ticket->client->name }}</span></br>
                    SĐT: {{ PhoneFormat($ticket->client->phone) }}</br>
                    NS: {{ date("d/m/Y", strtotime($ticket->client->birthday)) }}</br>
                </p>
            </div>
        </div>
        <!--End Invoice Mid-->

        <div id="bot">

            <div id="table">
                <table>
                    <tr class="tabletitle">
                        <td class="item">
                            <h2>THÔNG TIN MÁY</h2>
                        </td>
                    </tr>

                    <tr class="service">
                        <td class="tableitem">
                        <table style="width:98%" border="1">
                        <tr>
                            <td colspan="2"><span style="text-transform: uppercase; font-weight: bold">{{$ticket->model}} </span></td>
                        </tr>
                        <tr>
                            <td>CPU </td>
                            <td>{{$ticket->cpu}}  </td>
                        </tr>
                        <tr>
                            <td>RAM </td>
                            <td>{{$ticket->ram}}  </td>
                        </tr>
                        <tr>
                            <td>HDD </td>
                            <td>{{$ticket->storage}}  </td>
                        </tr>
                        <tr>
                            <td>Phụ kiện </td>
                            <td>{{$ticket->other}}  </td>
                        </tr>
                        <tr>
                            <td>Tình trạng</td>
                            <td>{{$ticket->note}}  </td>
                        </tr>
                        </table>
                    </tr>
                    <tr class="tabletitle">
                        <td class="item">
                            <h2>Yêu Cầu Khách Hàng</h2>
                        </td>
                    </tr>

                    <tr class="service">
                        <td class="tableitem">
                            <p class="itemtext">
                                @foreach($ticket->services as $service)
                                {{$service->name}}, 
                                @endforeach
                                {{$ticket->requestment}}
                            </p>
                        </td>
                    </tr>
                </table>
            </div>
            <!--End Table-->
            <div id="legalcopy">
                <p class="legal"><strong>Xác nhận gửi máy</strong> 
                <p style="height: 99px"></p>
                </p>
            </div>
            <div id="legalcopy">
                <p class="legal"><strong>Xác nhận trả máy</strong> 
                <p style="height: 99px"></p>
                </p>
            </div>
            <center><p>___</p></center>

        </div>
        <!--End InvoiceBot-->
    </div>
    <!--End Invoice-->
</body>

</html>