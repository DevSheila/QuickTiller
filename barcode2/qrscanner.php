<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<div id="qr-reader" style="width: 600px"></div>

<script src="https://unpkg.com/html5-qrcode"></script>
<!-- include the library -->
<script src="https://unpkg.com/html5-qrcode@2.0.9/dist/html5-qrcode.min.js"></script>

<script>
    function onScanSuccess(decodedText, decodedResult) {
        alert(`Code scanned = ${decodedText}`, decodedResult);
    }

    var html5QrcodeScanner = new Html5QrcodeScanner(
        "qr-reader", { fps: 10, qrbox: 400 },);
    html5QrcodeScanner.render(onScanSuccess);

 
    function onScanFailure(error) {
    // handle scan failure, usually better to ignore and keep scanning.
    // for example:
    alert(`Code scan error = ${error}`);
    }



    
</script>

</body>
</html>