<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
              <?php $this->view('messages') ?>
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Data Pemesan</strong>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th>No </th>
                                <th>Nama Pemesan</th>
                                <th>Alamat Pengiriman</th>
                                <th>Telepon</th>
                                <th>Tanggal Pemesanan</th>
                               
                                <th>Aksi </th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php $no=1; 
                                foreach ($invoice->result() as $key => $data) {
                                ?>  
                                <tr> 
                                  <td><?=$no++?>.</td>
                                  <td><?=$data->nama_pemesan?></td>   
                                  <td><?=$data->alamat?></td> 
                                  <td><?=$data->telepon?></td> 
                                  <td><?=$data->tgl_pesan?></td> 
                                 
                                  
                                  <td class="text-center" width="180px">
                                      <a href="<?=site_url('cinvoice/detail_invoice/'. $data->id_invoice)?>" class="btn btn-info btn-sm"><i class="fa fa-pencil"> Detail</i></button></a> 
                                  </td>
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