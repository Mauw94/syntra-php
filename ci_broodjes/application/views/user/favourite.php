<div class="container menu-container">
    <div class="row">
        <div class="col-sm-12">
            <h1 class="menu-title">Mijn favoriet</h1>
            <div class="fav-underline">
            </div>
        </div>
    </div>

<div class="fav-background container">
        <div class="checkout-message">
            <p><?php 
                $message = $this->session->flashdata('message');
                echo $message; 
            ?></p>
        </div>

        <div class="col-sm-12">
            <div class="row justify-content-center fav-title">
                <div class="col-sm-4">
                    <i class="fas fa-heart"></i>
                    <h1>
                        <?php echo $favourite_bread.' met '.$favourite_topping; ?>
                    </h1>
                </div>
            </div>
            <div class="fav-bread">

            
        
        
            </div>       
        </div>







</div>
</div>