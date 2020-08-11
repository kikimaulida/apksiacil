
<section class="breadcrumb-section set-bg" data-setbg="<?=base_url()?>/assets1/img/b3.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Checkout</h2>
                    <div class="breadcrumb__option">
                        <span>Home - Checkout</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <h4>Billing Details</h4>
            <form action="<?=base_url('chome/proses_pesanan')?>" method="post">
                <div class="row">
                    
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4>Pesanan Anda</h4>
                            <div class="checkout__order__products">Produk(jumlah) <span>Total</span></div>
                            <?php 
                            $grand_total = 0;
                            if($keranjang = $this->cart->contents())
                            {
                                foreach ($keranjang as $items) 
                                {?>
                                    <ul>
                                        <li><?php echo $items['name'] ?> (<?php echo $items['qty'] ?>) <span> Rp. <?php echo number_format($items['subtotal'], 0,',','.')  ?></span></li>
                                    </ul>
                              <?php  }
                             ?>
                           
                            <div class="checkout__order__total">Total Pembayaran <span>Rp. <?php echo number_format($this->cart->total(), 0,',','.')  ?></span></div>
            
                            <button type="submit" class="site-btn">PESAN</button>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-6">
                        <!-- <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Fist Name<span>*</span></p>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Last Name<span>*</span></p>
                                    <input type="text">
                                </div>
                            </div>
                        </div> -->
                        <div class="checkout__input">
                            <p>Nama Lengkap<span>*</span></p>
                            <input type="text" name="nama_pemesan" placeholder="Nama Lengkap Anda">
                        </div>
                        <div class="checkout__input">
                            <p>Alamat Lengkap<span>*</span></p>
                            <input type="text" name="alamat" placeholder="Alamat Lengkap Anda">
                        </div>
                        <div class="checkout__input">
                            <p>No. Telepon<span>*</span></p>
                            <input type="text" name="telepon" placeholder="No. Telepon Anda">
                        </div>
                        <div class="checkout__input">
                            <p>Keterangan Order<span>*</span></p>
                            <input type="text" name="keterangan" 
                                placeholder="Notes about your order, e.g. special notes for delivery.">
                        </div>
                    </div>
                </div>
            </form>

            <?php 
        }else{
            echo "<h6>Keranjang Belanja Anda Masih Kosong";
        }
        ?>
            
        </div>
    </div>
</section>
<!-- Checkout Section End