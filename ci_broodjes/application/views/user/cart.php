<div class="container">
<div class="cart-background container">
        <?php echo form_open('#', 'id="cartForm"'); ?>

        <div class="checkout-message">
            <p><?php 
                $message = $this->session->flashdata('message');
                echo $message; 
            ?></p>
        </div>


        <?php $i = 1;?>
        <?php foreach ($this->cart->contents() as $items): ?>
                <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>

                <div class="container">
                        <div class="cart-item col-sm-12">
                                <div class="row">
                                        <div class="cart-topright">
                                                <div class="cart-delete">
                                                        <a href="<?php echo base_url('bestel/removeItem/'.$items["rowid"]); ?>" class="cart-delete" onclick="return confirm('Je wil dit broodje verwijderen. Weet je het zeker?')">
                                                                <i class="fas fa-times"></i>
                                                        </a>
                                                </div>
                                        </div>


                                        <div class="col-sm-9">
                                                <h1><?php echo $items['name']; ?></h1>
                                                <h1 class="mb-4">&euro;<?php echo $this->cart->format_number($items['price']); ?></h1>

                                                <?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>
                                                        <p>
                                                                <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>
                                                                        <strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />
                                                                <?php endforeach; ?>
                                                                <p>subtotaal: &euro;
                                                                <?php echo $this->cart->format_number($items['subtotal']);?></p>
                                                        </p>
                                                <?php endif; ?>
                                        </div>

                                        <div class="col-sm-3">
                                                <div class="cart-bottomright">
                                                        <input type="number" class="cart-qty" name="amount" id="amount<?php echo $items['rowid'];?>" value="<?php echo $items['qty']; ?>" onchange="updateQuantity('<?php echo $items['rowid'];?>', '<?php echo $this->cart->format_number($items['subtotal']); ?>')">

                                                        <div class="cart-fav">
                                                                <i class="fas fa-heart"></i>
                                                                <!-- of <i class="far fa-heart"></i> -->
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>

        <?php $i++; ?>
        <?php endforeach; ?>

                <div class="cart-total total-left">
                        <p>Totaal: &euro;<?php echo $this->cart->format_number($this->cart->total()); ?></p>
                </div>

                <a href="<?php echo base_url(); ?>checkout/index">
                        <input type="button" class="cart-btn" value="Afrekenen">
                </a>

</div>
</div>

<script>
/* Update item quantity */
function updateQuantity(rowid, subtotal){
        var selectedQuantity = document.getElementById('amount'+rowid).value;

        $.get("<?php echo base_url('bestel/updateItemQty/'); ?>", {rowid:rowid, qty:selectedQuantity}, function(resp){
		if(resp == 'ok'){
			location.reload();
		}else{
			alert('Cart update failed, please try again.');
		}
	});
        return total;
}
</script>