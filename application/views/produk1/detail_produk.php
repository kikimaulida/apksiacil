<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                      <strong class="card-title">Detail Produk</strong>
                    </div>
                    <div class="card-body" align="center">
                      <?php $no=1; 
                        foreach ($row->result() as $key => $data) {
                        ?> 
                          <a href="<?=site_url('cproduk1/tampil_produk/'. $data->id_usaha. '/'. $data->id_pengguna)?>">
                              <button type="button" class="btn btn-secondary btn-sm" style="margin-top: 10px""><i class="fa fa-reply-all"></i>&nbsp; Kembali</button>
                          </a>
                          <a href="<?=site_url('cproduk1/tampil_komentar/'. $data->id_produk)?>">
                              <button type="button" class="btn btn-info btn-sm" style="margin-left: 10px; margin-top: 10px""><i class="fa fa-comments-o"></i>&nbsp; Lihat Komentar</button>
                          </a>
                        <?php 
                        }
                      ?> 
                    </div>
                    
                    <div class="card-body">
                      <div class="table-responsive">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">

                              <?php $no=1; 
                                foreach ($row->result() as $key => $data) {
                                ?>  
                                <tr>
                                  <td width="15%"><b>Nama Usaha</b></td>
                                  <td><?=$data->nama_usaha?></td>
                                </tr>
                                <tr>
                                  <td width="15%"><b>Nama produk</b></td>
                                  <td><?=$data->nama_produk?></td>
                                </tr>
                                <tr>
                                  <td width="15%"><b>Deskripsi</b></td>
                                  <td><?=$data->deskripsi_produk?></td>
                                </tr>
                                <tr>
                                  <td width="15%"><b>Harga</b></td>
                                  <td><?=$data->harga?></td>
                                </tr>
                                <tr>
                                  <td width="15%"><b>Foto produk</b></td>  
                                  <td>
                                    <?php if ($data->foto_produk != null ) { ?> 
                                      <img src="<?=base_url('uploads/produk/'.$data->foto_produk)?>" style="width: 150px;">
                                      <?php 
                                    }
                                    ?>                           
                                  </td>
                                </tr>
                                <tr>
                                  <td width="15%"><b>Status</b></td>
                                  <td><?=$data->status_produk?></td>
                                </tr>
                                <tr>
                                  <td width="15%"><b>Tanggal Unggah</b></td>
                                  <td><?=date('d-m-Y', strtotime($data->tgl_unggah))?></td>
                                </tr>
                                <?php 
                                  }
                                ?>                         
                            </tbody>
                        </table>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->