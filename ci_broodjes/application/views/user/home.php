    <h1>Welkom, ...</h1>

    <?php echo validation_errors(); ?>
    <a href="<?php echo base_url().'/login/logout_user';?>" class="btn btn-danger btn-sm">Logout</a>
    <?php echo form_open('bestel/index'); ?>
        <div class="form-group">
            <select name="bread" class="form-control">
                <option selected disabled>Welk broodje wil je?</option>
                <?php foreach($breads as $bread) : ?>
                <option value="<?php echo $bread['id']; ?>"><?php echo $bread['brdName'] . " - &euro;" . $bread['brdPrice']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <select name="topping" class="form-control">
                <option selected disabled>En welke topping?</option>
                <?php foreach($toppings as $topping) : ?>
                <option value="<?php echo $topping['id']; ?>"><?php echo $topping['topName'] . " - &euro;" . $topping['topPrice']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <select name="extra" multiple class="form-control">
                <option selected disabled>Wil je extra's?</option>
                <?php foreach($extras as $extra) : ?>
                <option value="<?php echo $extra['id']; ?>"><?php echo $extra['xtrName'] . " - &euro;" . $extra['xtrPrice']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label>Opmerking</label>
            <textarea name="note" class="form-control" rows="3"></textarea>
        </div>
        <div class="form-group row">
            <label class="col-2 col-form-label">Amount</label>
            <div class="col-10">
                <input name="amount" class="form-control" type="number" placeholder="0">
            </div>
        </div>
        <h3 class="mb-3">Prijs: </h3>
        <button name="submit" type="submit" class="btn btn-dark">Submit</button>
    </form>
</div>
