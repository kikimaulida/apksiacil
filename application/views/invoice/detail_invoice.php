<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
              <?php $this->view('messages') ?>
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Detail Pesanan </strong>
                    </div>
                    <div class="card-body" align="center">
                      <a href="<?=site_url('cinvoice/index')?>">
                        <button type="button" class="btn btn-secondary btn-sm" style="margin-top: 10px""><i class="fa fa-reply-all"></i>&nbsp; Kembali</button>
                      </a>
                    </div>
                        
                    <div class="card-body">
                      <div class="table-responsive">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th>No </th>
                                <th>Nama Produk</th>
                                <th>Jumlah Pesanan</th>
                                <th>Harga Satuan</th>
                                <th>Sub-Total</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php $no=1; $total = 0;
                                foreach ($pesanan as $psn): 
                                  $subtotal = $psn->jumlah * $psn->harga;
                                  $total += $subtotal;
                              ?>  
                              <tr>
                                <td><?=$no++?>.</td>
                                <td><?php echo $psn->nama_produk?></td>
                                <td><?php echo $psn->jumlah?></td>
                                <td><?php echo number_format($psn->harga,0,',',',')?></td>
                                <td><?php echo number_format($subtotal,0,',',',')?></td>
                              </tr>
                            <?php endforeach; ?>  
                            </tbody>
                            <tr>
                              <td colspan="4" align="right"> Total Pembayaran</td>
                              <td align="right"><?php echo number_format($total,0,',',',')?></td>
                            </tr>  
                        </table>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->