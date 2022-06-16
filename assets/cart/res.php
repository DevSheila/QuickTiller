<?php 
// scanitem
if(isset($_GET['1'])){

echo'<div class="alert alert-warning" id="empty-alert">
<button type="button" class="close" data-dismiss="alert">x</button>
<strong>Danger! </strong> Please scan again no value was regestered.
</div>';

}
 if(isset($_GET['2'])){

echo'<div class="alert alert-Danger" id="not_exist-alert">
<button type="button" class="close" data-dismiss="alert">x</button>
<strong>Warning! </strong> Product is not regestered Consult.
</div>';

}
if(isset($_GET['3'])){

echo'<div class="alert alert-warning" id="in_cart-alert">
<button type="button" class="close" data-dismiss="alert">x</button>
<strong>Sorry! </strong> Product already added to your cart.
</div>';

}
if(isset($_GET['4'])){

    echo'<div class="alert alert-success" id="added-alert">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>Success! </strong> Product  added to your cart.
    </div>';
    
    }
    if(isset($_GET['5'])){

        echo'<div class="alert alert-success" id="success-alert">
        <button type="button" class="close" data-dismiss="alert">x</button>
        <strong>Success! </strong> Product removed from your cart.
        </div>';
        
        }
        if(isset($_GET['6'])){

            echo'<div class="alert alert-Danger" id="shop_not-alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <strong>Warning! </strong> Shop does not exist.
            </div>';
            
            }
  ?>