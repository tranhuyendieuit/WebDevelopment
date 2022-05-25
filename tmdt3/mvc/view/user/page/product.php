<div class="container">
    <div class="row">
        <div class="row show-product">
            <div class="col-12">
                <div class="row row-prodct-2">
                    <div class="col-12">
                        <div class="row product-2">
                        </div>
                    </div>
                </div>

            </div>
            <?php 
                while ($product = mysqli_fetch_array($data["product"])) {?>
                         <div class="col-12 col-lg-3 col-md-3 padding-laptop col-2th">
                <div class="row">
                    <div class="col-12 content-laptop">
                        <div class="laptop-sell">
                            <div class="laptop-uploads">
                                <a href="home/detail/<?php echo $product["name_search"]; ?>"><img src="<?php echo $product["hinh"]; ?>" alt="không hổ trợ trình duyệt này" /></a>
                            </div>
                            <div class="laptop-price" style="margin-top: 5%;">
                                <div class="name-laptop"><a href="home/detail/<?php echo $product["name_search"]; ?>"><?php echo $product["Ten_hang_hoa"]; ?></a></div>
                                <div class="price-laptop">
                                    <a href="home/detail/<?php echo $product["id"]; ?>">
                                        <span class="price-sell">Giá:&nbsp;<?php echo number_format($product["gia"]) ; ?></span>
                                        <!-- <span class="price-dis"><s>60.000.000đ</s></span> -->
                                    </a>
                                </div>
                                <!-- <label class="discount"><i class="fa fa-tags"></i>giảm 10%</label> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
               <?php
                }
             ?>
                
        
            </div>
      
           
        <!-------------------------------------------------- Mobile --------------------------------------------------->

        <!--------------------------------------------------- end mobile ---------------------------------------------->
    </div>
</div>
</div>