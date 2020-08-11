<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="<?=base_url()?>/assets1/img/b3.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Shooping Cart</h2>
                    <div class="breadcrumb__option">
                        <span>Home - Shooping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

 <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Quantity</th>    
                                    <th>Sub-Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                foreach ($this->cart->contents() as $items): ?> 
                                 
                                <tr>
                                    <td class="shoping__cart__item">
                                        <!-- <img src="<?php echo base_url('uploads/produk/'.$items['image']); ?>" alt=""> -->
                                        <h5><?php echo $items['name'] ?></h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        Rp. <?php echo number_format($items['price'], 0,',','.')  ?>
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="text" value=<?php echo $items['qty'] ?>>
                                            </div>
                                        </div>
                                    </td>
                                    
                                    
                                    <td class="shoping__cart__total">
                                        Rp. <?php echo number_format($items['subtotal'], 0,',','.')  ?>
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <a href="<?=base_url('chome/hapus_keranjang/'. $items['rowid'] )?> "> <span class="icon_close"></span></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="<?=site_url('chome/tampilproduk')?>" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                        <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                            Upadate Cart</a>
                    </div>
                </div>
                <div class="col-lg-3">
                    
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Total <span> Rp. <?php echo number_format($this->cart->total(), 0,',','.')  ?></span></li>
                        </ul>
                        <a href="<?=site_url('chome/pembayaran')?>" class="primary-btn">PROCEED TO CHECKOUT</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->