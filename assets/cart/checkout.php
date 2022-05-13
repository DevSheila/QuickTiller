<div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-indigo">
              <h4 class="modal-title">CHECKOUT</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <div class="border rounded ">
            <div class="pb-2"></div>
                            <div class="row ">
                                <div class="col-md-1 offset-md-1 ">
                                 <img src="assets/img/cart/3.jpg" alt="image1" class="img-fluid">
                                 </div>
                                    <div class="row">
                                     <h5 class="pl-3">
                                      Product1
                                     </h5>
                                     <h5 class="pl-3">Seller: AQT</h5>
                                     <h5 class="pl-3">Quantity: 2chairs</h5>
                                     <h5 class="pl-3">Total amount: Ksh3000</h5>
                                     
                                    </div>

                                    
</div>
<div class="pb-2"></div>
 <div class="row ">
                       
<div class="col-md-1 offset-md-1 ">
                                 <img src="assets/img/cart/3.jpg" alt="image1" class="img-fluid">
                                 </div>
                                    <div class="row ">
                                     <h5 class="pl-3">
                                      Product1
                                     </h5>
                                     <h5 class="pl-3">Seller: AQT</h5>
                                     <h5 class="pl-3">Quantity: 2chairs</h5>
                                     <h5 class="pl-3">Total amount: Ksh3000</h5>
                                     
                                    </div>
</div>
<div class="pb-4"></div>
<div class="row">
<div class="col-md-6">

<div class="container">
<div class="wrapper wrapper-content animated fadeInRight">
  
        
        
    </div>
    <div class="row">

        <div class="col-lg-12">

            <div class="ibox">
                <div class="ibox-title">
                    Payment method
                </div>
                <div class="ibox-content">

                    <div class="panel-group payments-method" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="pull-right">
                                    <i class="fa fa-cc-paypal text-success"></i>
                                </div>
                                <h5 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">M-pesa</a>
                                </h5>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse">
                                <div class="panel-body">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <h2>Summary</h2>
                                       
                                            <strong>Total Price:</strong> <span class="text-navy">Ksh452.90</span>


                                            <p class="m-t">
                                               Please enter your M-pesa Number you will be prompted to enter your pin to complete payment.
                                            </p>
                                            
                                            
                                        </div>
                                        <div class="col-md-8">
                                            <div class="col-md-6">
                                                        <div class="form-group">
                                                          <label >Enter your Mpesa number</label>
                                                            <input type="number" class="form-control" name="M-pesa Number" placeholder="07************" required="">
                                                      
                                                            <button type="submit" class="btn btn-info" name="mpesa">PAY </button>
                                                        </div>
                                                    </div>
                                            </div>
                                    </div>
                                     </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="pull-right">
                                    <i class="fa fa-cc-amex text-success"></i>
                                    <i class="fa fa-cc-mastercard text-warning"></i>
                                    <i class="fa fa-cc-discover text-danger"></i>
                                </div>
                                <h5 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Credit Card</a>
                                </h5>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse in">
                                <div class="panel-body">

                                    <div class="row">
                                        <div class="col-md-4 pt-2">
                                            <h2>Summary</h2>
                                            
                                            <strong>Total Price:</strong> <span class="text-navy">Ksh452.90</span>
                                            <div class="col-md-3">
                                            <strong>VAT:</strong> <span class="text-navy">Ksh0.00</span>

                                            </div>
                                        </div>
                                        <div class="col-md-8 pl-5">

                                            <form role="form" id="payment-form">
                                                <div class="row">
                                                    <div class="col-xs-12 ">
                                                        <div class="form-group">
                                                            <label>CARD NUMBER</label>
                                                            
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" name="Number" placeholder="Valid Card Number" required="">
                                                                <span class="input-group-addon pl-1"><i class="fa fa-credit-card"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-7 col-md-8">
                                                        <div class="form-group">
                                                            <label>EXPIRATION DATE</label>
                                                            <input type="text" class="form-control" name="Expiry" placeholder="MM / YY" required="">
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-5 col-md-5 pull-right">
                                                        <div class="form-group">
                                                            <label>CV CODE</label>
                                                            <input type="text" class="form-control" name="CVC" placeholder="CVC" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-12">
                                                        <div class="form-group">
                                                            <label>NAME OF CARD</label>
                                                            <input type="text" class="form-control" name="nameCard" placeholder="NAME AND SURNAME">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-12">
                                                        <button class="btn btn-info" type="submit">Make a payment!</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

</div>

            </div>
            <div class="modal-footer justify-content-between bg-indigo">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Proceed with payment</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
