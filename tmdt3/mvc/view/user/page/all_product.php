<div class="container">
    <div class="row">
        <div class="row show-product">
            <div class="col-12">
                <div class="row row-prodct-2">
                    <div class="col-12">
                        <div class="row product-2">
                            <div class="col-12 col-lg-4 col-md-6 title-product-2">
                                <h5>Tất cả sản phẩm</h5>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <?php 
                while ($product = mysqli_fetch_array($data["pagination"])) {?>
                           <div class="col-12 col-lg-3 col-md-3 padding-laptop col-2th">
                <div class="row">
                    <div class="col-12 content-laptop">
                        <div class="laptop-sell">
                            <div class="laptop-uploads">
                                <a href="home/detail/<?php echo $product["name_search"]; ?>"><img src="<?php echo $product["hinh"]; ?>" alt="không hổ trợ trình duyệt này" /></a>
                            </div>
                            <div class="laptop-price">
                                <div class="name-laptop"><a href="#"><?php echo $product["Ten_hang_hoa"]; ?></a></div>
                                <div class="price-laptop">
                                    <a href="home/detail/<?php echo $product["name_search"]; ?>">
                                        <span class="price-sell"><?php echo number_format( $product["gia"]); ?></span>
                                      <!--   <span class="price-dis"><s>60.000.000đ</s></span> -->
                                    </a>
                                </div>
                               <!--  <label class="discount"><i class="fa fa-tags"></i>giảm 10%</label> -->
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
                <?php
            }
             ?>

    
                    </div>
                            <div class="col-12" style="text-align: center;">
                              <nav aria-label="Page navigation example">
                                      <ul class="pagination" style="text-align: center;display: flex;justify-content: center;">
                                      <?php 
                                            $page = mysqli_num_rows($data["page_product"]);
                                            $button_page = ceil($page/10);
                                            $i = 0;
                                            for ($i=1; $i <= $button_page ; $i++) {?> 
                                                <li class="page-item numberpage page-item page-link" id="click"><a href="home/allproduct&&page=<?php echo $i ?>"> <?php echo $i; ?></a></li>
                                            <?php
                                        }
                                            
                                       ?>
                                      </ul>
                                 </nav>
                              </div>
                </div>
        <!-------------------------------------------------- Mobile --------------------------------------------------->
     
</div>
</div>