<div class="content-wrapper">
  <div class="row">  
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Form <?=$sub == 'add' ? 'Tambah' : 'Edit'?> Group</h4>          
          <form class="forms-sample" action="<?=base_url("sistem/group_do/$sub")?>" method="post">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Bidang</label>
               <div class="col-sm-6">
                  <input name="GroupBidang" type="text" placeholder="Bidang" class="form-control" value="<?=$group['GroupBidang']?>">
               </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Jabatan</label>
                <div class="col-sm-6">
                  <input name="GroupJabatan" type="text"  placeholder="Jabatan" class="form-control" value="<?=$group['GroupJabatan']?>">
                </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-offset-2 col-lg-10">
              <input type="hidden" name="GroupId" value="<?=$group['GroupId']?>"/>
              <button type="reset" class="btn btn-light"><i class="fa fa-refresh"></i> Reset</button>
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
                    location.href = '<?=base_url('sistem/group')?>';
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