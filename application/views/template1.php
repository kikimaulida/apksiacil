<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <title>Sistem Informasi Usaha Kecil</title>
    <link rel="shortcut icon" href="<?=base_url()?>/assets/images/tala.png">
    <!-- Google Font -->
   <!--  <link href="<?=base_url()?>/assets1/https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet"> -->
    <!-- Css Styles -->
    <link rel="stylesheet" href="<?=base_url()?>/assets1/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?=base_url()?>/assets1/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?=base_url()?>/assets1/css/elegant-icons.css" type="text/css">
    <!-- <link rel="stylesheet" href="<?=base_url()?>/assets1/css/nice-select.css" type="text/css"> -->
    <link rel="stylesheet" href="<?=base_url()?>/assets1/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="<?=base_url()?>/assets1/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="<?=base_url()?>/assets1/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="<?=base_url()?>/assets1/css/style.css" type="text/css">

    <!-- Css Styles assets 2 -->
    <!-- Required meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="icon" href="img/favicon.png" type="image/png" />
      
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?=base_url()?>assets2/css/bootstrap.css" />
    <link rel="stylesheet" href="<?=base_url()?>assets2/vendors/linericon/style.css" />
    <link rel="stylesheet" href="<?=base_url()?>assets2/css/font-awesome.min.css" />
    <link rel="stylesheet" href="<?=base_url()?>assets2/css/themify-icons.css" />
    <link rel="stylesheet" href="<?=base_url()?>assets2/css/flaticon.css" />
    <link rel="stylesheet" href="<?=base_url()?>assets2/vendors/owl-carousel/owl.carousel.min.css" />
    <link rel="stylesheet" href="<?=base_url()?>assets2/vendors/lightbox/simpleLightbox.css" />
    <link rel="stylesheet" href="<?=base_url()?>assets2/vendors/nice-select/css/nice-select.css" />
    <link rel="stylesheet" href="<?=base_url()?>assets2/vendors/animate-css/animate.css" />
    <link rel="stylesheet" href="<?=base_url()?>assets2/vendors/jquery-ui/jquery-ui.css" />
    <!-- main css -->
    <link rel="stylesheet" href="<?=base_url()?>assets2/css/style.css" />
    <link rel="stylesheet" href="<?=base_url()?>assets2/css/responsive.css" />
    <link href="<?=base_url()?>/bxslider/dist/jquery.bxslider.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?=base_url()?>/assets/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/vendors/flag-icon-css/css/flag-icon.min.css">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
   integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
   crossorigin=""/>

    <link rel="stylesheet" href="<?=base_url()?>/assets/leaflet/routing/dist/leaflet-routing-machine.css">
    <style type="text/css">
        #mapid{
            height: 500px;
        }
    </style>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    <!-- Humberger Begin -->
    <?php
        if($this->session->userdata('id_pengguna')){
    ?>
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="<?=base_url()?>/assets1/#"><img src="<?=base_url()?>/assets1/img/logo.png" alt=""></a>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li><a href="<?=site_url('Chome')?>">Home</a></li>
                <li><a href="<?=site_url('chome/tampilusaha')?>">Usaha</a></li>
                <li><a href="<?=site_url('chome/tampilproduk')?>">Produk</a></li>
                <li><a href="<?=site_url('chome/kontak')?>">Kontak</a></li>
                <li><a href="<?=site_url('chome/tentang')?>">Tentang</a></li>
                <?php if($this->session->userdata('level') != 'user') { ?>
                    <li><a href="<?=site_url('Dashboard')?>"> Beranda</a></li> 
                <?php } ?>
                <li><a href="<?=site_url('cakun/profile_pengguna/'. $this->session->userdata('id_pengguna'))?>">Profil Saya</a></li>
                <li><a href="<?=site_url('Auth/logout')?>">Logout</a></li>

            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-phone"></i> 0512-21873</li>
                <li>Dapatkan Produk-produk Unggulan dan Berkualitas Disini</li>
            </ul>
        </div>
    </div>
    <?php }
    else
    { ?>
        <div class="humberger__menu__overlay"></div>
        <div class="humberger__menu__wrapper">
            <div class="humberger__menu__logo">
                <a href="<?=base_url()?>/assets1/#"><img src="<?=base_url()?>/assets1/img/logo.png" alt=""></a>
            </div>
            <nav class="humberger__menu__nav mobile-menu">
                <ul>
                    <li><a href="<?=site_url('Chome')?>">Home</a></li>
                    <li><a href="<?=site_url('Chome/tampilusaha')?>">Usaha</a></li>
                    <li><a href="<?=site_url('Chome/tampilproduk')?>">Produk</a></li>
                    <li><a href="<?=site_url('chome/kontak')?>">Kontak</a></li>
                    <li><a href="<?=site_url('chome/tentang')?>">Tentang</a></li>
                    <li><a href="<?=site_url('Auth/login')?>">Login</a></li>
                    <li><a href="<?=site_url('Chome/daftar')?>">Daftar</a></li>
                </ul>
            </nav>
            <div id="mobile-menu-wrap"></div>
            <div class="humberger__menu__contact">
                <ul>
                    <li><i class="fa fa-phone"></i> 0512-21873</li>
                    <li>Dapatkan Produk-produk Unggulan dan Berkualitas Disini</li>
                </ul>
            </div>
        </div>
    <?php } ?>
    <!-- Humberger End -->

    <!-- web -->
    <header class="header_area">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__left">
                        <ul>
                            <li><i class="fa fa-phone"></i> 0512-21873</li>
                            <li>Dapatkan Produk-produk Unggulan dan Berkualitas Disini</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__right">
                        <?php
                            if($this->session->userdata('id_pengguna')){
                        ?>
                        <div class="header__top__right__language">
                            <div> 
                                <?php
                                    $dt=$this->db->query("SELECT * FROM tb_keranjang WHERE id_pengguna = '".$this->session->userdata('id_pengguna')."'")->num_rows();
                                $keranjang = 'Keranjang Belanja: '.$dt. ' items' ?>
                                <?php echo anchor('chome/detail_keranjang', $keranjang) ?>

                            </div>
                        </div>
                        <div class="header__top__right__language">
                            <img src="img/language.png" alt=""><i class="fa fa-user" style="color: black;"></i>&nbsp; 
                            <div style="color: black;"><?=ucfirst($this->fungsi->pengguna_login()->nama_lengkap)?></div>
                            <span class="arrow_carrot-down"></span>
                            <ul style="background: grey; width: 130%;">
                                <?php if($this->session->userdata('level') != 'user') { ?>
                                <li><a href="<?=site_url('Dashboard')?>"> Beranda</a></li> 

                                <?php } ?>
                                <li><a href="<?=site_url('cakun/profile_pengguna/'. $this->session->userdata('id_pengguna'))?>">Profil Saya</a></li>
                                <li><a href="<?=site_url('Auth/logout')?>">Logout</a></li>
                            </ul>
                        </div>
                        
                        <?php } 
                        else{ ?>
                        <div class="header__top__right__social">
                            <a href="<?=site_url('Auth/login')?>"><i class="fa fa-user"></i>&nbsp; Login</a>
                        </div>
                         <div class="header__top__right__auth"> 
                            <a href="<?=site_url('chome/daftar')?>"><i class="fa fa-user"></i>Daftar</a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main_menu" style="background-color: black; margin-bottom: 15px;">
       <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="<?=base_url()?>/assets1/./index.html" ><img src="<?=base_url()?>/assets/images/logo4.png" style="height: 60px;" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li <?=$this->uri->segment(1) == 'Chome' || $this->uri->segment(1) == '' ? 'class="active"' : ''?>><a href="<?=site_url('Chome')?>">Home</a></li>
                            <li <?=$this->uri->segment(2) == 'tampilusaha' || $this->uri->segment(2) == 'detailusaha' ? 'class="active"' : ''?>><a href="<?=site_url('chome/tampilusaha')?>">Usaha</a></li>
                            <li <?=$this->uri->segment(2) == 'tampilproduk' || $this->uri->segment(2) == 'detail_produk' ? 'class="active"' : ''?>><a href="<?=site_url('chome/tampilproduk')?>">Produk</a></li>
                            <li <?=$this->uri->segment(2) == 'kontak' ? 'class="active"' : ''?>><a href="<?=site_url('chome/kontak')?>">Kontak</a></li>
                            <li <?=$this->uri->segment(2) == 'tentang' ? 'class="active"' : ''?>><a href="<?=site_url('chome/tentang')?>">Tentang</a></li>
                        </ul>
                    </nav>
                </div> 

                <div class="col-lg-3">
                    <div class="header__cart">
                       <!--  <ul>
                            <li style="color: white">
                                <?php
                                $keranjang = 'Keranjang Belanja: '.$this->cart->total_items(). ' items' ?>
                                <?php echo anchor('chome/detail_keranjang', $keranjang) ?>
                            </li>
                        </ul> -->
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </div>
  </header>
    <!-- Header Section End -->

    <div class="contents">
            <?php echo $contents ?>
    </div>

    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text">
                            <p>
                                <!-- Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="<?=base_url()?>/assets1/https://colorlib.com" target="_blank">Colorlib</a> -->
                                Copyright &copy;<script>document.write(new Date().getFullYear());</script> | Sistem Informasi Usaha Kecil (SI ACIL) Kabupaten Tanah Laut berbasis <i> Web</i>

                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="<?=base_url()?>/assets1/js/jquery-3.3.1.min.js"></script>
    <script src="<?=base_url()?>/assets1/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>/assets1/js/jquery.nice-select.min.js"></script>
    <script src="<?=base_url()?>/assets1/js/jquery-ui.min.js"></script>
    <script src="<?=base_url()?>/assets1/js/jquery.slicknav.js"></script>
    <script src="<?=base_url()?>/assets1/js/mixitup.min.js"></script>
    <script src="<?=base_url()?>/assets1/js/owl.carousel.min.js"></script>
    <script src="<?=base_url()?>/assets1/js/main.js"></script>

    <!-- Js Plugins Assets 2-->
    <script src="<?=base_url()?>assets2/js/jquery-3.2.1.min.js"></script>
    <script src="<?=base_url()?>assets2/js/popper.js"></script>
    <script src="<?=base_url()?>assets2/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>assets2/js/stellar.js"></script>
    <script src="<?=base_url()?>assets2/vendors/lightbox/simpleLightbox.min.js"></script>
    <script src="<?=base_url()?>assets2/vendors/nice-select/js/jquery.nice-select.min.js"></script>
    <script src="<?=base_url()?>assets2/vendors/isotope/imagesloaded.pkgd.min.js"></script>
    <script src="<?=base_url()?>assets2/vendors/isotope/isotope-min.js"></script>
    <script src="<?=base_url()?>assets2/vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="<?=base_url()?>assets2/js/jquery.ajaxchimp.min.js"></script>
    <script src="<?=base_url()?>assets2/vendors/counter-up/jquery.waypoints.min.js"></script>
    <script src="<?=base_url()?>assets2/vendors/counter-up/jquery.counterup.js"></script>
    <script src="<?=base_url()?>assets2/js/mail-script.js"></script>
    <script src="<?=base_url()?>assets2/js/theme.js"></script>
    <script src="<?=base_url()?>assets2/vendors/jquery-ui/jquery-ui.js"></script>

    <!-- jQuery library -->
    <script src="<?=base_url()?>/bxslider/dist/jquery-3.1.1.min.js"></script>
    <!-- bxSlider Javascript file -->
    <script src="<?=base_url()?>/bxslider/dist/jquery.bxslider.js"></script>
    <script>
      $(document).ready(function(){
        $('.bxslider').bxSlider({
          mode: 'horizontal',
          moveSlides: 1,
          slideMargin: 40,
          infiniteLoop: true,
          slideWidth: 1000,

          minSlides: 1,
          maxSlides: 1,
          speed: 800,
          auto: true,

        });
      });
    </script>

    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
   integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
   crossorigin=""></script>

   <script src="<?=base_url()?>/assets/leaflet/routing/dist/leaflet-routing-machine.js"></script>

   <script type="text/javascript">
        var mymap = L.map('mapid').fitWorld();

        L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
              attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
              maxZoom: 18,
              id: 'mapbox.streets',
              accessToken: 'pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw'}).addTo(mymap);

        var marker;
        var latlng;
        var lat1, lng1;
        var lat2, lng2;
        var route;
        var icon;
        var statusrute = 0;
       
        function onLocationFound(e)
        {
            latlng = e.latlng;
            lat1 = String(e.latlng.lat);
            lng1 = String(e.latlng.lng);
            marker = new L.marker(latlng).addTo(mymap).bindTooltip("Saya");
        }
        mymap.on('locationfound', onLocationFound);
        mymap.locate({setView: true, watch: true, maxZoom: 12});
        
        <?php 
            foreach ($map->result() as $data):
        ?> 
            icon = L.icon({iconUrl: "<?=base_url()?>/assets/images/green.png", iconSize: [24, 37], iconAnchor: [12, 37]});
            marker = new L.marker([<?php echo $data->lat ?>, <?php echo $data->lng?>], {icon: icon}).addTo(mymap).bindTooltip("<?php echo $data->nama_usaha?>");
        <?php endforeach; ?>
       
        marker.on('click', function(e)
        {
            lat2 = e.latlng.lat;
            lng2 = e.latlng.lng;
            if (statusrute == 1)
                mymap.removeControl(route);
            route = L.Routing.control({
            waypoints: [
                L.latLng(lat1, lng1),
                L.latLng(lat2, lng2)
            ]
            }).addTo(mymap);
            statusrute = 1;
        });

        mymap.on('click', function (){
            if(statusrute == 1)
            {
                mymap.removeControl(route);
                statusrute = 0;
            }
        });
   </script>
</body>
</html>