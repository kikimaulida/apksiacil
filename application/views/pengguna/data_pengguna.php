<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
               <?php $this->view('messages') ?>
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Data Pengguna</strong>
                    </div>
                    <div class="card-body">
                        <a href="<?=site_url('Cpengguna/tambah')?>">
                            <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp; Tambah Data</button>
                        </a>
                    </div>
                    
                    <div class="card-body">
                      <div class="table-responsive">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th>No </th>
                                <th>Nama Lengkap</th>
                                <th>Username</th>
                                <th>Level</th>
                                <th>Status</th>
                                <th>Aksi </th>

                              </tr>
                            </thead>

                            <tbody>
                            <?php $no=1; 
                            foreach ($row->result_array() as $data):
                              
                                $id_pengguna=$data['id_pengguna'];
                                $nama_lengkap=$data['nama_lengkap'];
                                $username=$data['username'];
                                $level=$data['level'];
                                $status=$data['status'];
                            ?>
                           
                            <tr> 
                              <td><?=$no++?>.</td>
                              <td><?php echo $nama_lengkap;?></td>
                              <td><?php echo $username;?></td>
                              <td><?php echo $level;?></td>
                              <td>
                                <?php 
                                  if ($status == 'menunggu konfirmasi') 
                                  { ?>
                                      <button type="button" data-toggle="modal" data-whatever="@getbootstrap" data-target="#terima<?php echo $id_pengguna;?>" class="btn btn-success btn-sm">Terima</button>
                                      <button type="button" data-toggle="modal" data-whatever="@getbootstrap" data-target="#tolak<?php echo $id_pengguna;?>" class="btn btn-danger btn-sm">Tolak</button>
                                  <?php }
                                  else if ($status == 'diterima') { ?>
                                    <?php echo "Diterima"; ?>
                                  <?php } 
                                  else { ?>
                                    <?php echo "Ditolak"; ?>
                                  <?php } ?>
                              </td>


                              <td class="text-center" width="270px">
                                <a href="<?=site_url('cpengguna/detail_pengguna/'. $id_pengguna)?>" class="btn btn-info btn-sm"><i class="fa fa-eye"> Detail</i></button></a>
                                  <a href="<?=site_url('cpengguna/ubah/'. $id_pengguna)?>" class="btn btn-success btn-sm"><i class="fa fa-pencil"> Ubah</i></button></a>
                                  <a href="<?=site_url('cpengguna/hapus_pengguna/'. $id_pengguna)?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus?')" class="btn btn-danger btn-sm"><i class="fa fa-trash-o "> Hapus</i></button></a>
                              </td>  
                              </tr>
                            <?php endforeach;?>                       
                          </tbody>
                        </table>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->

<?php
  foreach ($row->result_array() as $data):
      $id_pengguna=$data['id_pengguna'];
      $nama_lengkap=$data['nama_lengkap'];
      $status=$data['status'];
?>
<div class="modal fade" id="terima<?php echo $id_pengguna?>" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h6 class="modal-title" id="staticModalLabel">Konfirmasi Terima</h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <form class="form-horizontal" method="post" action="<?=site_url('cpengguna/status_daftar')?>">
            <div class="modal-body">
              <center><p>Terima <b><?php echo $nama_lengkap;?></b> ?</p></center> 
              <input type="hidden" name="id_pengguna" value="<?php echo $id_pengguna;?>" readonly="readonly">
              <input type="hidden" name="email" value="<?php echo $data['email'];?>" readonly="readonly">
              <input type="hidden" name="status" value="diterima" readonly="readonly" class="form-control col-md-7 col-xs-12">
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-info">OK</button>
            </div>
          </form>
      </div>
  </div>
</div>
<?php endforeach;?>

<?php
  foreach ($row->result_array() as $data):
      $id_pengguna=$data['id_pengguna'];
      $nama_lengkap=$data['nama_lengkap'];
      $status=$data['status'];
?>
<div class="modal fade" id="tolak<?php echo $id_pengguna?>" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h6 class="modal-title" id="staticModalLabel">Konfirmasi Penolakan</h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <form class="form-horizontal" method="post" action="<?=site_url('cpengguna/status_daftar')?>">
            <div class="modal-body">
              <center><p>Tolak <b><?php echo $nama_lengkap;?></b> ?</p></center> 
              <input type="hidden" name="id_pengguna" value="<?php echo $id_pengguna;?>" readonly="readonly">
              <input type="hidden" name="status" value="ditolak" readonly="readonly" class="form-control col-md-7 col-xs-12">
              <input type="hidden" name="email" value="<?php echo $data['email'];?>" readonly="readonly">
              <div class="row form-group">
                <div class="col-12 col-md-12"><textarea name="pesan" rows="3" class="form-control" placeholder="Masukkan alasan penolakan"></textarea></div>
              </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-info">OK</button>
            </div>
          </form>
      </div>
  </div>
</div>
<?php endforeach;?>

