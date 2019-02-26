<!-- NIEUW - helemaal nieuw gemaakt; deze keer weer news, maar nu met de auteurs -->
<!doctype html>
<html>
    <head>
        <title>Overview admin orders specific day</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <div class="container-fluid">
            <div class="admin-reset">
                <?PHP echo validation_errors();
                list($yearDelivery,$monthDelivery,$dayDelivery) = explode ('-',$dateDelivery);
                echo form_open('Orders_sandwiches/Adminorderssandwiches/'); ?>
                <form action="<?PHP echo site_url('Orders_sandwiches/Adminorderssandwiches/')?>" method="POST">
                    <div class="row">
                        <div class="col-md-3">
                            <label>&nbspWijzig besteldatum:&nbsp</label>
                        </div>
                        <div class="col-md-3">
                            <input type="date" name="datedelivery" value="<?PHP echo $dateDelivery ?>">
                        </div>
                        <div class="col-md-2">
                            <label>Selecteer orders:&nbsp</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="zoeknaam" placeholder="(deel) naam" value="<?PHP echo $searchName ?>">
                            <br>
                            <input type="text" name="zoekmail" placeholder="(deel) email" value="<?PHP echo $searchMail ?>">
                        </div>
                    </div>
                    <input type="submit" value="Verzend" name="verzenden"></td>
                </form>
            </div>
        </div>

        <div class="container-fluid">
            <div class="admin-title">
                <h2 style="margin-top:0px">Bestellingen voor <?php echo $dateDelivery ?></h2>
            </div>
        </div>

        <?PHP
        if(empty($adminbestellingen_data)){
            echo "Voor deze dag staan er geen bestellingen";
        }
        //    print_r($adminbestellingen_data);
        //    echo "<br><br>";

        // initialisation for correct processing first order
        $keyOrders = -1;
        $keySandwiches = -1;
        foreach ($adminbestellingen_data as $adminbestelling) {
            // new orders_id: process next order
            if ($keyOrders <> $adminbestelling->order_id){
                $keyOrders = $adminbestelling->order_id;
                $rijOrders[$keyOrders]['totPriceOrder'] = 0;
                $rijOrders[$keyOrders]['totAmountSandwiches'] = 0;
                // initial overall sandwich name for order from first sandwich (mostly just 1)
                $rijOrders[$keyOrders]['ordNameSandwichOverall'] = $adminbestelling->brdName." ".$adminbestelling->topName;
                // $adminbestelling->order_id;
                // $adminbestelling->usrFirstNam;
                // $adminbestelling->usrLastName;
                // $adminbestelling->usrFirstName;
                // $adminbestelling->usrEmail;
                // $adminbestelling->usrPhone;
                // $adminbestelling->staDescription;
                // $adminbestelling->ordDateDelivery;
                // $adminbestelling->ordTimestamp;
            }

            // new orders_sandwiches_id (= juisteId): process next sandwich(_order)
            if ($keySandwiches <> $adminbestelling->juisteId) {
                $keySandwiches = $adminbestelling->juisteId;
                // init for next rijExtras
                $volgnrExtras = 0;
                // $adminbestelling->orsAmount;                
                $rijOrders[$keyOrders]['totAmountSandwiches'] = $rijOrders[$keyOrders]['totAmountSandwiches'] + $adminbestelling->orsAmount;
                $rijSandwiches[$keySandwiches]['totPriceSandwich'] = (($adminbestelling->orsAmount * $adminbestelling->brdPrice) + ($adminbestelling->orsAmount * $adminbestelling->topPrice));
                $rijOrders[$keyOrders]['totPriceOrder'] = (($rijOrders[$keyOrders]['totPriceOrder']) + ($adminbestelling->orsAmount * $adminbestelling->brdPrice) + ($adminbestelling->orsAmount * $adminbestelling->topPrice));
                // $adminbestelling->brdName;
                // $adminbestelling->brdPrice;
                // $adminbestelling->topName;
                // $adminbestelling->topDescription;
                // $adminbestelling->topPrice;
                // change overall sandwich name when more than 1 sandwich
                $ordNameSandwichNext = $adminbestelling->brdName." ".$adminbestelling->topName;
                if ($rijOrders[$keyOrders]['ordNameSandwichOverall'] <> $ordNameSandwichNext) {
                    $rijOrders[$keyOrders]['ordNameSandwichOverall'] = "Diverse soorten broodjes";
                }
            }
            // prepare fields addicted to every extra for constructing row in array rijExtras
            $orsAmount = $adminbestelling->orsAmount;
            if ($adminbestelling->xtrPrice <> ""){
                $xtrName = $adminbestelling->xtrName;
                $xtrPrice = $adminbestelling->xtrPrice;
            // but mostly there's no extra:
            } else {
                $xtrName = '';
                $xtrPrice = 0;
            }
            // construct row in array rijExtras
            $rijExtras[$keySandwiches][$volgnrExtras]['xtrId'] = $adminbestelling->xtrId;
            $rijExtras[$keySandwiches][$volgnrExtras]['xtrName'] = $xtrName;
            $rijExtras[$keySandwiches][$volgnrExtras]['xtrPrice'] = $xtrPrice;
            $volgnrExtras = $volgnrExtras + 1;
            // add Extra price to total of order and total of sanwich:
            $totExtras = $orsAmount * $xtrPrice;
            $rijSandwiches[$keySandwiches]['totPriceSandwich'] = $rijSandwiches[$keySandwiches]['totPriceSandwich'] + $totExtras;
            $rijOrders[$keyOrders]['totPriceOrder'] = $rijOrders[$keyOrders]['totPriceOrder'] + $totExtras;
        // END FOR EACH:
        } ?> 
        <div class="container-fluid">
            <?PHP
            $keyOrders = -1; // HEEL BELANGRIJK
            $keySandwiches = -1; // HEEL BELANGRIJK
            $i = 0;
            foreach ($adminbestellingen_data as $adminbestelling) {
                //print_r($arrayOrder);
                if ($keyOrders <> $adminbestelling->order_id) {
                    $keyOrders = $adminbestelling->order_id;
                    $i = $i + 1;
                    ?>
                    <div class="order-heading">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <span class="button" onclick="hideOrderDetails($keyOrders)"><u>Details</u></span>
                                    </div>
                                    <div class="col-xs-3">
                                        <?PHP
                                        $iPrint = $i;
                                        if ($i < 10){
                                            $iPrint = "0".$iPrint;
                                        }
                                        if ($i < 100){
                                            $iPrint = "0".$iPrint;
                                        }
                                        ?>
                                        <span><?PHP echo $iPrint ?></span>
                                    </div>
                                    <div class="col-xs-6">
                                        <span><?PHP echo $adminbestelling->usrLastName." ".$adminbestelling->usrFirstName; ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <span><?PHP echo $rijOrders[$keyOrders]['ordNameSandwichOverall'] ?></span>
                                    </div>
                                    <div class="col-xs-3">
                                        <span><?PHP echo $rijOrders[$keyOrders]['totAmountSandwiches'] ?></span>
                                    </div>
                                    <div class="col-xs-3">
                                        <span>&euro;<?PHP echo $rijOrders[$keyOrders]['totPriceOrder'] ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="order-subheading-<?PHP echo $keyOrders;?>">
                        <div class="order-subheading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <span><?PHP echo $adminbestelling->usrEmail; ?></span>
                                </div>
                                <div class="col-xs-3">
                                    <span><?PHP echo $adminbestelling->usrPhone; ?></span>
                                </div>
                                <div class="col-xs-3">
                                    <span><?PHP echo $adminbestelling->staDescription; ?></span>
                                </div>
                                <div class="col-xs-3">
                                    <span><?PHP echo $adminbestelling->ordTimestamp; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?PHP }
                if ($keySandwiches <> $adminbestelling->juisteId) {
                    $keySandwiches = $adminbestelling->juisteId; ?>
                    <div id="order-details-<?PHP echo $keyOrders;?> style="display:none;">
                        <div class="order-details1">
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <span><?PHP echo $adminbestelling->brdName." (&euro;".$adminbestelling->brdPrice.")"; ?></span>
                                        </div>
                                        <div class="col-md-6">
                                            <span><?PHP echo $adminbestelling->topName." (&euro;".$adminbestelling->topPrice.")"; ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <span><?PHP echo $adminbestelling->orsAmount; ?></span>
                                        </div>
                                        <div class="col-md-6">
                                            <?PHP foreach ($rijExtras[$keySandwiches] as $extra) { ?>
                                                <span><?PHP 
                                                    echo $extra['xtrName']." ";
                                                    if ($extra['xtrPrice'] = 0) {
                                                        echo "(&euro; -)"; ?><br></span> <?PHP
                                                    } else {
                                                        echo "(&euro;".$extra['xtrPrice'].")"; ?><br></span>
                                                    <?PHP }
                                            } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?PHP }
            } ?> 
        </div>
    </body>
</html>
<script>
    function hideOrderDetails($keyOrders){
        console.log("test");
        if (document.getElementById("order-subheading-<?PHP echo $keyOrders;?>").style.display != "none") {
            document.getElementById("order-subheading-<?PHP echo $keyOrders;?>").style.display = "none";
        } else {
            document.getElementById("order-subheading-<?PHP echo $keyOrders;?>").style.display = "block";
        }
        if (document.getElementById("order-details-<?PHP echo $keyOrders;?>").style.display != "none") {
            document.getElementById("order-details-<?PHP echo $keyOrders;?>").style.display = "none";
        } else {
            document.getElementById("order-details-<?PHP echo $keyOrders;?>").style.display = "block";
        }
    }
</script>
