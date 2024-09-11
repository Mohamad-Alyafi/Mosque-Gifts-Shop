<!DOCTYPE html>
<html>

<head>
    <title>مسجد الإمام الشافعي</title>
    <style>
        body {
            position: relative;
            margin: 0;
            overflow: hidden;
            /* Prevent scrollbars */
        }

        .top-right {
            margin-top: 15px;
            position: absolute;
            top: 45px;
            right: 60px;
        }

        .top-left {
            margin-top: 15px;
            position: absolute;
            top: 45px;
            left: 60px;
        }

        .center {
            position: absolute;
            top: 60%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }

        .barcode-img {
            display: block;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <div style="height: 4cm ;width: 10cm ">
        <div class='top-left'>
            <p>{{ $barcodeData['name'] }}</p>
        </div>
        <div class='top-right'>
            <p>{{ $barcodeData['semester'] }}</p>
        </div>
        <div class='center'>
            <img class="barcode-img" src="data:image/png;base64,{{ $barcodeData['barcode'] }}" alt="barcode" />
            <p style="margin-top: 25px">{{ $barcodeData['student_number'] }}</p>
        </div>
    </div>
</body>

</html>
