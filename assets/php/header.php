<header id='header'>
    <nav class="navbar navbar-expand-lg navbar-purple bg-purple">
        <a href="ft-cart.php" class="navbar-brand">
            <h3 class="px-5">
                <div class="fas fa-shopping-basket"></div>Shopping Cart
            </h3>
        </a>
        <button class='navbar-toggler' type="button"
        data-toggle="collapse"
        data-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup"
        aria-expanded="false"
        aria-label="Toggle navigation"
        >
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="mr-auto"></div>
            <div class="navbar-nav">
                <a href="cart.php" >

                    <h5 class="px-5 cart"><i class="fas fa-shopping-cart"></i>Cart
                   
                <?php
                $total=0;
                if (isset($_SESSION['cart'])) {
                    # code...
                    $count=count($_SESSION['cart']);?>
                   
                  <span id="cart_count" class="text-warning bg-light"><?php echo $count;
                  ?></span>
                  <?php
                }else{
                    echo'   <span id="cart_count" class="text-warning bg-light">0</span>
                    ';
                      
                }
                ?> 
                
                </h5>
                </a>
        
        </div>
    </div>
    </nav>
</header>