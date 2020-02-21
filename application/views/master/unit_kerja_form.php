<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
         <h4 class="card-title">Form <?=$sub == 'add' ? 'Tambah' : 'Edit'?> Unit Kerja</h4>
          <form class="forms-sample" action="<?=base_url().index_page()."/master/unit_kerja_do/".$sub?>">
            <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="UnitKerjaNama">Nama Unit Kerja</label>
                <div class="col-sm-6">
            <input type="text" class="form-control"  autocomplete="on" id="UnitKerjaNama" name="UnitKerjaNama" value="<?=$unit_kerja['UnitKerjaNama']?>" data-rule-required="true" data-rule-minlength="2">
                </div>
            </div>
            <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="groups">Induk Unit Kerja</label>
                <div class="col-lg-6">
                  <select class="form-control" id="UnitKerjaIndukId" name="UnitKerjaIndukId" data-rule-required="true">
                      <option value="">-- Pilih --</option>
                      <?php
                          foreach($unit_kerja_induk as $induk) {
                              $sel = $unit_kerja['UnitKerjaIndukId'] == $induk['UnitKerjaId'] ? "selected='selected'" : "";
                              echo "<option value='$induk[UnitKerjaId]' $sel>$induk[UnitKerjaNama]</option>";
                          }
                      ?>
                  </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Aktif</label>
                <div class="col-sm-6">                            
                    <div class="form-radio form-radio-flat">
                        <label class="form-check-label">
                        <input type="radio" name="UnitKerjaAktif" value="1"  data-rule-required="true" <?=$unit_kerja['UnitKerjaAktif'] == 1 ? "checked='checked'" : ""?>>
                            Ya
                        </label>
                    </div>
                    <div class="form-radio form-radio-flat">
                        <label class="form-check-label">
                        <input type="radio" name="UnitKerjaAktif" value="0"  data-rule-required="true" <?=$unit_kerja['UnitKerjaAktif'] == 0 ? "checked='checked'" : ""?>>
                            Tidak
                        </label>
                    </div>
                </div>
            </div>          
            <div class="form-group row">
                <div class="col-lg-offset-2 col-lg-10">
                    <input type="hidden" name="UnitKerjaId" value="<?=$unit_kerja['UnitKerjaId']?>"/>
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
                    location.href = '<?=base_url('sistem/menu')?>';
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
    
    $('select[name="is_child"]').change(function(){
        if($('select[name="is_child"] option:selected').val() == '0') {
            $('.parent_related').hide();
        } else {
            $('.parent_related').show();
        }
    });
</script>