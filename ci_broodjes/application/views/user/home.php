<div class="container menu">
    <h1 class="menu-title">Mijn bestelling</h1>
    <div class="menu-price">
        <!-- <p>&euro;</p> -->
    </div>

    <?php echo validation_errors(); ?>

    <?php echo form_open('bestel/index'); ?>
        <div class="form-group">
            <select name="bread" class="menu-input">
                <option selected disabled>Welk broodje wil je?</option>
                <?php foreach($breads as $bread) : ?>
                <option value="<?php echo $bread['id']; ?>"><?php echo $bread['brdName'] . " - &euro;" . $bread['brdPrice']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <select name="topping" class="menu-input">
                <option selected disabled>En welke topping?</option>
                <?php foreach($toppings as $topping) : ?>
                <option value="<?php echo $topping['id']; ?>"><?php echo $topping['topName'] . " (" . $topping['topDescription'] . ") - &euro;" . $topping['topPrice']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <!-- <div class="form-group">
            <select name="extra" multiple class="menu-input">
                <option selected disabled>Wil je extra's?</option>
                <?php foreach($extras as $extra) : ?>
                <option value="<?php echo $extra['id']; ?>"><?php echo $extra['xtrName'] . " - &euro;" . $extra['xtrPrice']; ?></option>
                <?php endforeach; ?>
            </select>
        </div> -->
        <div class="form-group">
            <select name="extra" class="menu-input">
                <option selected disabled>Wil je extra's?</option>
                <?php foreach($extras as $extra) : ?>
                <option value="<?php echo $extra['id']; ?>"><?php echo $extra['xtrName'] . " - &euro;" . $extra['xtrPrice']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label>Opmerking:</label>
            <textarea name="note" class="menu-input-text" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label class="float-left">Aantal:</label>
            <select name="amount" class="menu-amount">
                <?php   for ($i = 1; $i <= 8; $i++) { ?>
                    <option value='<?php echo $i; ?>'><?php echo $i; ?></option>
                <?php   }   ?>
            </select>
        </div>

        <button name="submit" type="submit" class="menu-submit">Plaats in Broodmandje</button>
    </form>
</div>


<!-- <div class="form-group">
            <label>Aantal:</label>
            <div>
                <input name="amount" class="menu-amount" type="number" placeholder="0">
            </div>
        </div> -->