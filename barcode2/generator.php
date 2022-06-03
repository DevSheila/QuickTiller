
<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
    <div class="row">
<div class="col-md-4">
<form method="post" action="./generatorLogc.php">
<div class="row">
<div class="col-md-8">
<div class="form-group">
<label>Product Name or Number</label>
<input type="text" name="barcodeText" class="form-control" value="<?php echo @$_POST['barcodeText'];?>">
</div>
</div>
</div>
<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>Barcode Type</label>
<select name="barcodeType" id="barcodeType" class="form-control">
<option value="codabar" <?php echo (@$_POST['barcodeType'] == 'codabar' ? 'selected="selected"' : ''); ?>>Codabar</option>
<option value="code128" <?php echo (@$_POST['barcodeType'] == 'code128' ? 'selected="selected"' : ''); ?>>Code128</option>
<option value="code39" <?php echo (@$_POST['barcodeType'] == 'code39' ? 'selected="selected"' : ''); ?>>Code39</option>
</select>
</div>
</div>
</div>
<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>Barcode Display</label>
<select name="barcodeDisplay" class="form-control" required>
<option value="horizontal" <?php echo (@$_POST['barcodeDisplay'] == 'horizontal' ? 'selected="selected"' : ''); ?>>Horizontal</option>
<option value="vertical" <?php echo (@$_POST['barcodeDisplay'] == 'vertical' ? 'selected="selected"' : ''); ?>>Vertical</option>
</select>
</div>
</div>
</div>
<div class="row">
<div class="col-md-7">
<input type="hidden" name="barcodeSize" id="barcodeSize" value="20">
<input type="hidden" name="printText" id="printText" value="true">
<input type="submit" name="generateBarcode" class="btn btn-success form-control" value="Generate Barcode">
</div>
</div>
</form>
</div>
</div>
    </div>
</body>
</html>