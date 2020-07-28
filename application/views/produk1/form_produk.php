<div class="col-lg-12">
    <?php $this->view('messages') ?>
    <div class="card">
        <div class="card-header">
            <strong>Form <?=ucfirst($page)?> Produk</strong>
        </div>
        <div class="card-body card-block">
            <?php echo form_open_multipart('cproduk1/proses') ?>
            <form action="<?=site_url('Cproduk1/proses')?>" method="post" class="form-horizontal">
                <div class="row form-group"> 
                    <div class="col-12 col-md-9">
                        <input type="hidden" name="id_produk" value="<?=$row->id_produk?>" class="form-control">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-3"><label class=" form-control-label">Nama Pemilik</label></div>
                    <div class="col-12 col-md-9"><input type="hidden" name="pengguna" value="<?php echo $usaha['id_pengguna'] ?>" class="form-control">
                    <input type="text" value="<?php echo $usaha['nama_lengkap'] ?>" class="form-control" readonly>
                    </div>
                </div>
                        
                
                <div class="row form-group">
                    <div class="col-md-3"><label class=" form-control-label">Nama usaha</label></div>
                    <div class="col-12 col-md-9"><input type="hidden" name="usaha" value="<?php echo $usaha['id_usaha'] ?>" class="form-control">
                    <input type="text" value="<?php echo $usaha['nama_usaha'] ?>" class="form-control" readonly>
                    </div>
                </div>
                 

                <div class="row form-group">
                    <div class="col-md-3"><label class=" form-control-label">Nama produk</label></div>
                    <div class="col-12 col-md-9"><input type="text" name="nama_produk" value="<?=$row->nama_produk?>" class="form-control" required></div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Deskripsi</label></div>
                    <div class="col-12 col-md-9"><textarea name="deskripsi_produk" rows="9"  class="form-control" required><?=$row->deskripsi_produk?></textarea></div>
                </div>

                <div class="row form-group">
                    <div class="col-md-3"><label class=" form-control-label">Harga</label></div>
                    <div class="col-12 col-md-9"><input type="text" name="harga" value="<?=$row->harga?>" class="form-control" required></div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="file-input" class=" form-control-label">Foto produk</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <?php if($page == 'ubah') {
                            if($row->foto_produk != null){ ?>
                                <div style="margin-bottom: 5px">
                                    <img src="<?=base_url('uploads/produk/'.$row->foto_produk)?>" style="width: 20%">
                                </div>
                            <?php
                            }
                        } ?>

                        <input type="file" id="file-input" name="foto_produk" value="<?=$row->foto_produk?>"  class="form-control-file">
                        <!-- <input type="file" id="file-input" name="foto_produk[]" class="form-control-file" multiple="multiple"> -->
                    </div>
                </div>

                 <!-- PAGE TAMBAH -->
                <?php if($page == 'tambah') { ?>
                <div class="row form-group">
                    <div class="col-md-3"><label class=" form-control-label">Status</label></div>
                    <div class="col-12 col-md-9"> 
                        <select name="status_produk" class="form-control" required="">
                            <option value="">- Pilih -</option>
                            <option value="Tersedia" <?=set_value('status_produk') == "Tersedia" ? "selected" : null?>>Tersedia</option>
                            <option value="Kosong" <?=set_value('status_produk') == "Kosong" ? "selected" : null?>>Kosong</option>
                         </select>
                    </div>
                </div>
                <?php } ?>

                <!-- PAGE UBAH -->
                <?php if($page == 'ubah') { ?>
                <div class="row form-group">
                    <div class="col-md-3"><label class=" form-control-label">status</label></div>
                    <div class="col-12 col-md-9">
                        <select name="status_produk" class="form-control">
                            <?php $status = $this->input->post('status_produk') ? $this->input->post('status_produk') : $row->status ?>
                            <option value="Tersedia" <?=set_value('status_produk') == "Tersedia" ? "selected" : null?>>Tersedia</option>
                            <option value="Kosong" <?=$status == "Kosong" ? 'selected' : null?>>Kosong</option>
                         </select>
                    </div>
                </div>
                <?php } ?>

                <?php if($page == 'tambah') { ?>
                <!-- Input tanggal otomatis -->
                <input type="hidden" name="tgl_unggah" value="<?php echo $tgl_unggah = date("Y-m-d")?>" readonly="readonly" class="form-control">
                <!-- end Input tanggal otomatis -->
                <?php } ?>

                <hr>
                <div align="center">
                    <button type="submit" name="<?=$page?>" class="btn btn-info">Simpan</button>
                    <a href="<?=site_url('cproduk1')?>">
                        <button type="button" class="btn btn-warning">Batal</button>
                    </a>

                    <!-- <?php
                        /*foreach ($row->result() as $key => $data)*/ {
                    ?> 
                    <a href="<?=site_url('cproduk1/tampil_produk/'. $data->id_produk)?>">
                        <button type="button" class="btn btn-warning">Batal</button>
                    </a>
                    <?php } ?>  -->

                    
                </div>
            </form>
            <?php echo form_close()?>
        </div>
    </div>
</div12