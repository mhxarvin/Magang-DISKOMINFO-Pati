<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Form <?=$sub == 'add' ? 'Tambah' : 'Edit'?> Hak Akses Group</h4>
          <form class="form-sample" action="<?=base_url("sistem/auth_do/$sub")?>" method="post">
             <?php for ($i=0;$i<sizeof($data);$i++): ?>                          
            <div class="row">
              <div class="col-md-12">
              <input type="hidden" name="MenuId<?=$i?>" value="<?=$data[$i]['MenuId']?>" /> 
              <label class="col-sm col-form-label"><?=$data[$i]['MenuName']?></label>     
                <div class="form-group row">              
                  <div class="col-sm">
                  <div class="icheck">
                <label class="form-check-label">
                    <input class="form-check-input" name="index<?=$i?>" type="checkbox" value="1" <?=$data[$i]['view'] == 1 ? 'checked="checked" ' : ''?>/>                                        
                    View
                </label>
                    </div>
                  </div>
                  <div class="col-sm">
                  <div class="icheck">
                <label class="form-check-label">
                    <input class="form-check-input" name="search<?=$i?>" type="checkbox" value="1" <?=$data[$i]['search'] == 1 ? 'checked="checked" ' : ''?> <?=($data[$i]['MenuParentId'] == 0 && $data[$i]['search'] == 0) ? 'disabled="disabled"' : ''?>/>                          
                   Cari
                </label>
            </div>
                  </div>
                  <div class="col-sm">
                  <div class="icheck">
                <label class="form-check-label">
                <input class="form-check-input" name="add<?=$i?>" type="checkbox" value="1" <?=$data[$i]['add'] == 1 ? 'checked="checked" ' : ''?> <?=$data[$i]['MenuParentId'] == 0 ? 'disabled="disabled"' : ''?>/>   
               Tambah 
                </label>
                
                  </div>
                  </div>
                  <div class="col-sm">
                  <div class="icheck">
                <label class="form-check-label">
                <input class="form-check-input" name="update<?=$i?>" type="checkbox" value="1" <?=$data[$i]['update'] == 1 ? 'checked="checked" ' : ''?> <?=$data[$i]['MenuParentId'] == 0 ? 'disabled="disabled"' : ''?>/>
               Ubah 
                </label>
                
                  </div>
                  </div>
                  <div class="col-sm">
                  <div class="icheck">
                <label class="form-check-label">
                <input class="form-check-input" name="delete<?=$i?>" type="checkbox" value="1" <?=$data[$i]['delete'] == 1 ? 'checked="checked" ' : ''?> <?=$data[$i]['MenuParentId'] == 0 ? 'disabled="disabled"' : ''?>/>         
               Hapus  
                </label>
                
                  </div>
                  </div>
                  <div class="col-sm">
                  <div class="icheck">
                <label class="form-check-label">
                <input class="form-check-input" name="detail<?=$i?>" type="checkbox" value="1" <?=$data[$i]['detail'] == 1 ? 'checked="checked" ' : ''?> <?=$data[$i]['MenuParentId'] == 0 ? 'disabled="disabled"' : ''?>/>                       
               Detail 
                </label>
                
                  </div>
                  </div>
                  <div class="col-sm">
                  <div class="icheck">
                <label class="form-check-label">
                <input class="form-check-input" name="print<?=$i?>" type="checkbox" value="1" <?=$data[$i]['print'] == 1 ? 'checked="checked" ' : ''?> <?=$data[$i]['MenuParentId'] == 0 ? 'disabled="disabled"' : ''?>/>                       
               Cetak 
                </label>
                
                  </div>
                  </div>
                  <div class="col-sm">
                  <div class="icheck">
                <label class="form-check-label">
                <input class="form-check-input" name="export<?=$i?>" type="checkbox" value="1" <?=$data[$i]['export'] == 1 ? 'checked="checked" ' : ''?> <?=$data[$i]['MenuParentId'] == 0 ? 'disabled="disabled"' : ''?>/>                       
               Eksport 
                </label>
                
                  </div>
                  </div>
                  
                </div>
              </div>
            </div> 
		     <?php endfor; ?>						 
            <div class="form-group">
              <div class="col-lg-offset-2 col-lg-10">
                  <input type="hidden" name="total" value="<?=sizeof($data)?>" />
                  <input type="hidden" id="GroupId" name="GroupId" value="<?=$group['GroupId']?>" />
                  <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i> Reset</button>
                  <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                  <button type="button" class="btn btn-warning" onclick="self.history.back()"><i class="fa fa-undo"></i> Kembali</button>
              </div>
             </div>
          </form>
        </div>
      </div>
    </div>
 </div>          
<!-- Modal -->
<div id="modal-loading" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">                    
            <div class="modal-header">                        
                <h4 class="modal-title"><i class="ace-icon fa fa-hourglass-o icon-only"></i> Silahkan Tunggu!</h4>
            </div>
            <div class="modal-body">
                <div class="progress">
                  <div class="progress-bar progress-bar-striped bg-info progress-bar-animated" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>                                        
        </div>
    </div>
</div>
<!-- /.modal end here -->
<script type="text/javascript">
    $(function(){
        $('form').ajaxForm({
            dataType: 'json',
            beforeSubmit: function(arr, $form, options) { 
                $('#modal-loading').modal('show');
            },        
            success: function(data){
                $('#modal-loading').modal('hide');
                if(data.success) {
                    location.href = '<?=base_url('sistem/auth')?>';
                } else{
                    $.gritter.add({
                        title: 'Error!',
                        text: data.msg,
                        class_name: 'gritter-error gritter-center'
                    });
                }
            }
        });        
    });
</script>