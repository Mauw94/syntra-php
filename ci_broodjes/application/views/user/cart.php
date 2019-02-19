<div class="container">
<div class="cart-background">
        <!-- <?php echo form_open('bestel/update'); ?> -->
        <?php $i = 1; ?>
        <?php foreach ($this->cart->contents() as $items): ?>
                <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>

                <div class="cart-item">
                        <div class="cart-delete">
                                <a href="<?php echo base_url('bestel/removeItem/'.$items["rowid"]); ?>" class="cart-delete" onclick="return confirm('Je wil dit broodje verwijderen. Weet je het zeker?')">
                                        <i class="fas fa-times"></i>
                                </a>
                        </div>
                        <h1><?php echo $items['name']; ?></h1>
                        <h1 class="mb-4">&euro;<?php echo $this->cart->format_number($items['price']); ?></h1>

                        <?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>
                                <p>
                                        <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>
                                                <strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />
                                        <?php endforeach; ?>
                                        subtotaal: &euro;<?php echo $this->cart->format_number($items['subtotal']); ?>
                                </p>
                        <?php endif; ?>

                        <!-- <?php echo form_input(array('name' => $i.'[qty]', 'value' => $items['qty'], 'class'=>'cart-qty','maxlength' => '3', 'size' => '5')); ?> -->
                        <input type="number" class="cart-qty" name="<?php echo $i.'[qty]'; ?>" value="<?php echo $items['qty']; ?>" onchange="updateCartItem(this, '<?php echo $items['rowid']; ?>')">
                        
                        <!-- <select name="<?php echo $i.'[qty]'; ?>" value="<?php echo $items['qty']; ?>" class="cart-qty">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                        </select> -->

                        <div class="cart-fav">
                                <i class="fas fa-heart"></i>
                                <!-- of <i class="far fa-heart"></i> -->
                        </div>
                </div>
        <?php $i++; ?>
        <?php endforeach; ?>

        <div class="cart-total total-left">
                <p>Totaal: &euro;<?php echo $this->cart->format_number($this->cart->total()); ?></p>
        </div>
    
        <!-- <p><?php echo form_submit('', 'Update your Cart', "class = 'cart-btn'"); ?></p> -->
        <a href="<?php echo base_url(); ?>bestel/checkout">
                <button class="cart-btn">Afrekenen</button>
        </a>

</div>
</div>

<script>
/* Update item quantity */
function updateCartItem(obj, rowid){
        console.log('hello'); 
	$.get("<?php echo base_url('bestel/updateItemQty/'); ?>", {rowid:rowid, qty:obj.value}, function(resp){
		if(resp == 'ok'){
			location.reload();
		}else{
			alert('Cart update failed, please try again.');
		}
	});
}

function updateCartItem(){

}
</script>