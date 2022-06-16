<?php
// if(isset($_POST['generateBarcode'])) {
// $barcodeText = trim($_POST['barcodeText']);
// $barcodeType=$_POST['barcodeType'];
// $barcodeDisplay=$_POST['barcodeDisplay'];
// $barcodeSize=$_POST['barcodeSize'];
// $printText=$_POST['printText'];
// if($barcodeText != '') {
// echo '<h4>Barcode:</h4>';
// echo '<img class="barcode" alt="'.$barcodeText.'" src="./bar128.php?text='.$barcodeText.'&codetype='.$barcodeType.'&orientation='.$barcodeDisplay.
// '&size='.$barcodeSize.'&print='.$printText.'"/>';
// } else {
// echo '<div class="alert alert-danger">Enter product name or number to generate barcode!</div>';
// }
// }


if(isset($_POST['generateBarcode'])) {
    // $barcodeText = trim($_POST['barcodeText']);
    // $barcodeType=$_POST['barcodeType'];
    // $barcodeDisplay=$_POST['barcodeDisplay'];
    // $barcodeSize=$_POST['barcodeSize'];
    // $printText=$_POST['printText'];

    $barcodeText=14532356;
    $barcodeType='codabar';
    $barcodeDisplay='horizontal';
    $barcodeSize='20';
    $printText='true';
    if($barcodeText != '') {
    echo '<h4>Barcode:</h4>';
    echo '<img alt="'.$barcodeText.'" src="./bar128.php?text='.$barcodeText.'&codetype='.$barcodeType.'&orientation='.$barcodeDisplay.
    '&size='.$barcodeSize.'&print='.$printText.'"/>';
    } else {
    echo '<div class="alert alert-danger">Enter product name or number to generate barcode!</div>';
    }
    }
?>

<img src="<?php echo `../QuickTiller/barcode2/bar128.php?text='.$product_isbn.'&codetype='.$barcodeType.'&orientation='.$barcodeDisplay.
                                        '&size='.$barcodeSize.'&print='.$printText.'`?> " alt="">
                      

<?php
                                        echo '<img class="barcode" alt="'.$product_isbn.'" src="../QuickTiller/barcode2/bar128.php?text='.$product_isbn.'&codetype='.$barcodeType.'&orientation='.$barcodeDisplay.
                                        '&size='.$barcodeSize.'&print='.$printText.'"/>';
?>