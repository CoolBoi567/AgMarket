<?php
require_once('database.php');
require_once('server.php');

if(!isset($_SESSION['customer']) || empty($_SESSION['customer']))
    header('location: index.php');

require_once('header.php'); 
include('errors.php'); 
?>

<!-- Slide1 -->
<section class="banner bgwhite p-t-10 p-b-10">
    <!-- Slide1 -->
    <section class="slide1">
        <div class="wrap-slick1">
            <div class="slick1">
                <div class="item-slick1 item1-slick1" style="background-size: contain;  background-image: url(https://i.imgur.com/OFPM0Va.png);">
                    <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15">
                        <span class="rounded caption1-slide1 xs-text1 text-dark bg-white t-center animated visible-false m-b-15 p-t-10 p-b-10 p-l-10 p-r-10" data-appear="rollIn">
                            Use this application in your own language
                        </span>
                        <h3 class="rounded caption2-slide1 text-dark bg-white t-center animated visible-false m-b-15 p-t-10 p-b-10 p-l-10 p-r-10" data-appear="lightSpeedIn">
                            Native Language
                        </h3>
                    </div>
                </div>

                <div class="item-slick1 item2-slick1" style="background-size: contain;  background-image: url(https://i.imgur.com/R73dDfC.png);">
                    <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15">
                        <span class="rounded caption1-slide1 xs-text1 t-center bg-danger animated visible-false m-b-15 p-t-10 p-b-10 p-l-10 p-r-10" data-appear="rotateInDownLeft">
                            Know the predictions of weather
                        </span>
                        <h3 class="rounded caption2-slide1 t-center animated visible-false bg-danger m-b-15 p-t-10 p-b-10 p-l-10 p-r-10" data-appear="rotateInUpRight">
                            Weather Utilities
                        </h3> 
                    </div>
                </div>

                <div class="item-slick1 item3-slick1" style="background-size: contain;  background-image: url(https://i.imgur.com/zGIb4OA.png);">
                    <div class="wrap-content-slide1 sizefull text-white flex-col-c-m p-l-15 p-r-15">
                        <span class="rounded caption1-slide1 xs-text1 bg-info t-center animated visible-false m-b-15 p-t-10 p-b-10 p-l-10 p-r-10" data-appear="fadeInDown">
                            Exact GPS locations are shared between involved parties.
                        </span>

                        <h3 class="rounded caption2-slide1 bg-info t-center animated visible-false m-b-15 p-t-10 p-b-10 p-l-10 p-r-10" data-appear="fadeInUp">
                            Google Maps Geolocation
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
<hr/>

<!-- Banner -->
<section class="banner bgwhite p-t-30 p-b-30">
    <div class="sec-title p-b-20">
        <h3 class="m-text5 t-center">
            Categories
        </h3>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
                <!-- block1 -->
                <div class="block1 hov-img-zoom pos-relative m-b-30">
                    <img src="https://i.imgur.com/rHSh5T9.png" alt="IMG-BENNER">

                    <div class="block1-wrapbtn w-size2">
                        <!-- Button -->
                        <a href="product.php?categoryid=1" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
                            Crops
                        </a>
                    </div>
                </div>

                <!-- block1 -->
                <div class="block1 hov-img-zoom pos-relative m-b-30">
                    <img src="https://i.imgur.com/ADryhSF.jpg" alt="IMG-BENNER">

                    <div class="block1-wrapbtn w-size2">
                        <!-- Button -->
                        <a href="product.php?categoryid=2" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
                            Livestock
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
                <!-- block1 -->
                <div class="block1 hov-img-zoom pos-relative m-b-30">
                    <img src="https://i.imgur.com/XHcw59Y.jpg" alt="IMG-BENNER">
                    <div class="block1-wrapbtn w-size2">
                        <!-- Button -->
                        <a href="product.php?categoryid=3" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4 ">
                            Machineries
                        </a>
                    </div>
                </div>

                <!-- block1 -->
                <div class="block1 hov-img-zoom pos-relative m-b-30">
                    <img src="https://i.imgur.com/d3ydZeJ.jpg" alt="IMG-BENNER">

                    <div class="block1-wrapbtn w-size2">
                        <!-- Button -->
                        <a href="product.php?categoryid=4" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
                            Plants and Seeds
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Product -->
<section class="newproduct bgwhite p-t-25 p-b-25">
    <div class="container">
        <div class="sec-title p-b-20">
            <h3 class="m-text5 t-center">
                Featured Commodities
            </h3>
        </div>
        <!-- Slide2 -->
        <div class="wrap-slick2">
            <div class="slick2">
                <?php
                $iszero = 2;
                mysqli_query($db,"SET @count:=0");
                $res1 = mysqli_query($db, "SELECT (@count:=@count+1) AS sn,t1.id, t1.name, t1.price, t1.avail,t1.vid,v.name as vname, image_url FROM vendors as v,commodities as t1 INNER JOIN(select min(price) as MP, name from commodities group by name) as t2 on t1.name = t2.name and t1.price = t2.MP WHERE v.id = t1.vid LIMIT 0,5");

                if (mysqli_num_rows($res1)<=0) {
                    $iszero -= 1;
                }
                else {
                    while($row1 = mysqli_fetch_assoc($res1)) {
                        ?>
                        <div class="item-slick2 p-l-15 p-r-15">
                            <!-- Block2 -->
                            <div class="block2">
                                <div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelsale">
                                    <img class="featured-img" src="<?php echo $row1['image_url']; ?>"  alt="IMG-PRODUCT">
                                    <div class="p-t-10 p-l-140 block2-overlay trans-0-4 text-white">
                                        Available : <?php echo $row1['avail']; ?>
                                        <div class="block2-btn-addcart w-size1">
                                            <!-- Button -->
                                            <button class="addtocart flex-c-m size1 bg4 bo-rad-23 hov1 s-text1" id='addtocart_<?php echo $row1['id']; ?>' data-id='addtocart_<?php echo $row1['id']; ?>'>
                                                Add to Cart
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="block2-txt p-t-5 p-b-5">
                                    <a href="product-detail.php?commodityid=<?php echo $row1['id']; ?>" class="block2-name dis-block s-text3">
                                        <?php echo  ucfirst($row1['name']); ?>
                                    </a>
                                    <span class="block2-price m-text6">
                                        Rate: ₹ <span ><?php echo $row1['price']; ?></span>
                                    </span>
                                    <div class="block2-price m-text6">
                                        Vendor:
                                        <a class="notranslate" href="profile.php?vendorid=<?php echo $row1['vid']; ?>">
                                            <?php echo $row1['vname']; ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                mysqli_query($db,"SET @count:=0");
                $res2 = mysqli_query($db, "SELECT (@count:=@count+1) AS sn, t1.id, t1.name as name, t1.price, t1.avail,t1.vid,v.name as vname, image_url FROM vendors as v,commodities as t1 INNER JOIN(select vid,min(id) as mi from commodities group by vid) as t2 on t1.vid = t2.vid and t1.id=t2.mi where v.id = t1.vid LIMIT 0,5");
                if(mysqli_num_rows($res2)<=0) {
                    $iszero-=1;
                }
                else {
                    while($row2 = mysqli_fetch_assoc($res2)) {
                        ?>
                        <div class="item-slick2 p-l-15 p-r-15">
                            <!-- Block2 -->
                            <div class="block2">
                                <div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
                                    <img class="featured-img" src="<?php echo $row2['image_url']; ?>" alt="IMG-PRODUCT">
                                    <div class="p-t-10 p-l-140 block2-overlay trans-0-4 text-white">
                                        Available : <?php echo $row2['avail']; ?>
                                        <div class="w-size1">
                                            <div class="block2-btn-addcart w-size1">
                                                <!-- Button -->
                                                <button class="addtocart flex-c-m size1 bg4 bo-rad-23 hov1 s-text1" id='addtocart_<?php echo $row2['id']; ?>' data-id='addtocart_<?php echo $row2['id']; ?>'>
                                                    Add to Cart
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="block2-txt p-t-5 p-b-5">
                                    <a href="product-detail.php?commodityid=<?php echo $row2['id'];?>" class="block2-name dis-block s-text3 p-b-5">
                                        <?php echo  ucfirst($row2['name']); ?>
                                    </a>
                                    <span class="block2-price m-text6 p-r-5">
                                        Rate: ₹ <span ><?php echo $row2['price']; ?></span>
                                    </span>
                                    <div class="m-text6 p-r-5">
                                        Vendor:
                                        <a href="profile.php?vendorid=<?php echo $row2['vid']; ?>" class="notranslate">
                                            <?php echo $row2['vname']; ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                if(!$iszero) {
                    ?>
                    <h2 class="center">No Commodities Featured Right now. ! <br/><a href="vendor-login.php" alt="AgMarket Home Page" style="text-decoration: none;">Sell commodities in the platform !!</a></h2>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</section>

<!-- Shipping -->
<section class="shipping bgwhite p-t-25 p-b-25">
    <div class="flex-w p-l-15 p-r-15">
        <div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
            <h4 class="m-text12 t-center">
                Always be at profit
            </h4>
            <span class="s-text11 t-center">
                Compare rates from different vendors
            </span>
        </div>

        <div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 bo2 respon2">
            <h4 class="m-text12 t-center">
                Delivery or Pick-up
            </h4>

            <span class="s-text11 t-center">
                Simply select option for either delivery or pick-up while ordering
            </span>
        </div>

        <div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
            <h4 class="m-text12 t-center">
                Place Order anytime
            </h4>

            <span class="s-text11 t-center">
                Our site is 24/7 available for your service
            </span>
        </div>
    </div>
</section>

<?php require_once('footer.php'); ?>
<!-- Set rating -->
<script type='text/javascript'>
    $(document).ready(function() {
        $(".addtocart").click(function() {
            // Get element id by data-id attribute
            var el_id = $(this).data("id")

            // commodity was selected by a user
            var split_id = el_id.split("_");
            var comid = split_id[1]; // postid
            var value = 1;

            // AJAX Request
            $.ajax({
                url: 'addtocart_ajax.php',
                type: 'post',
                data: {comid:comid,quantity:value},
                dataType: 'json',
                success: function(data){
                    var status = data['status'];
                    var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
                    $(this).on('click', function(){
                        swal(nameProduct, "is added to cart !", "success");
                    });
                    if(!status)
                        agalert("Alert","Commodity already exists in the cart","yellow");
                    else if(status==-1)
                        swal("Error while adding Commodity to cart","failure");
                    else if(status==1) {
                        $(".cartcount").text(parseInt($(".cartcount").text()[0])+1);
                        swal("Successfully added Commodity to cart","success");
                    }
                }
            });
        });
    });
</script>
</body>
</html>