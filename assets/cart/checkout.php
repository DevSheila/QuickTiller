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
            <?php
            
            $prod_id=array_column($_SESSION['cart'],'qrvalue');
            // print_r($prod_id);
             foreach($prod_id as $item => $id){
            $que="SELECT * FROM product where brand='$id'";
            $query = mysqli_query($conn,$que);
            $num=mysqli_num_rows($query);
           if($num==0)
      {
             $data[]='';
      }
        else{
       $row=mysqli_fetch_array($query);
             $id=$row['id'];
             $shop_id=$row['shop_id'];
             $shop_qr=$row['shop_qr_code'];
             $name=$row['product_name'];
             $cat=$row['category'];
             $brand=$row['brand'];
             $qty=$row['quantity'];
             $price=$row['price'];
             $oqty=$row['otherQualities'];
             $pic=$row['product_image'];
             $date=$row['date'];
             

            ?>
                      

                                    <?php }}
                                    mysqli_close($conn);
                                    ?>
                                    

             <div class="col-12 col-md-6">
             <div class="card card-purple card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                  <li class="pt-2 px-3"><h3 class="card-title">Payment method</h3></li>
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill" href="#custom-tabs-two-home" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">M-pesa</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-two-profile-tab" data-toggle="pill" href="#custom-tabs-two-profile" role="tab" aria-controls="custom-tabs-two-profile" aria-selected="false">Paypal <i class="	fab fa-cc-paypal bg-primary"  style='font-size:24px;'></i></a>
                  </li>
                 
                </ul>
              </div>
             
              <div class="card-body ">
                <div class="tab-content" id="custom-tabs-two-tabContent">
                   
                  <div class="tab-pane fade show active" id="custom-tabs-two-home" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
                    <form action="">
                   <div class="input-group mb-3">
                     <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                     </div>
                        <input type="number" class="form-control" placeholder="M-pesa number" required>
                    </div>
                   </form>
                 </div>

                  <div class="tab-pane fade" id="custom-tabs-two-profile" role="tabpanel" aria-labelledby="custom-tabs-two-profile-tab">
                 
                  <form action=""> 
                     <div class="input-group mb-3">
                       <div class="input-group-prepend">
                           <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                       </div>
                           <input type="email" class="form-control" placeholder="Paypal Email" required>
                        
                        <div>
                       
                        </div>
                      </div>
                      <div class="input-group mb-3">
                       <div class="input-group-prepend">
                           <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                       </div>
                           <input type="button" class="btn btn-primary" value="proceed with payment" required>
                        
                        <div>
                       
                        </div>
                      </div>
                  </form>
                  </div>

                </div>
              </div>
              <!-- /.card -->
              
            </div>
            
          </div>
          <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">



        
<div class="pt-4">
    <H6>Price Details</H6>
    <hr>
    <div class="row price-details">
    <div class="col-md-6">
       <?php
       
       if(isset($_SESSION['cart'])){
         $count=count($_SESSION['cart']);
         for ($i=0; $i <$count ; $i++) { 
           # code...
           
         // $item=$_SESSION['cart'][$i];
         // print_r($item);
         }
          
           echo"<h6>Price($count items)<h6>";
       }else{
          echo"<h6>Price(1items)<h6>";
       
       }
    ?>
    <h6>Delivery Charges</h6>
    <h6>Amount Payable</h6>
    </div>

                <div class="col-md-6">
                        <h6>Ksh<?php echo $total;?></h6>
                       <h6 class="text-success">FREE</h6>
                       <hr>
                       <h6>
                      Ksh<?php echo $total;?>
                 </h6>

               </div>
              </div>
   
             <div class="pb-2"></div>
           </div>
          </div>
         </div>
        </div>
  
      </div>
</div>
          
            <div class="modal-footer justify-content-between bg-indigo">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Confirm payment</button>
            </div>

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
