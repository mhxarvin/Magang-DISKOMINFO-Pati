
<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Form <?=$sub == 'add' ? 'Tambah' : 'Edit'?> Menu</h4>
          <form class="forms-sample" action="<?=base_url("sistem/menu_do/$sub")?>" method="post">
            <div class="form-group row">
            <label class="col-sm-3 col-form-label">Nama Menu</label>
                <div class="col-sm-6">
            <input name="MenuName" type="text" autocomplete="on" placeholder="Nama Menu" class="form-control" value="<?=$menu['MenuName']?>">
                </div>
            </div>
            <div class="form-group row">
            <label class="col-sm-3 col-form-label">Menu Modul</label>
                <div class="col-sm-6">
            <input name="MenuModule" type="text" autocomplete="on" placeholder="Menu Modul" class="form-control" value="<?=$menu['MenuModule']?>">
                </div>
            </div>
            <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="groups">Status</label>
                <div class="col-lg-6">
            <select class="form-control" id="is_child" name="is_child">
                <option value="0">Menu Utama</option>
                <option value="1" <?=$menu['MenuParentId'] ? 'selected' : ''?>>Sub Menu</option>
            </select>
                </div>
            </div>
            <div class="form-group row parent_related" style="display: <?=$menu['MenuParentId'] == 0 ? 'none' : 'block'?>">
                <label class="col-sm-3 col-form-label" for="MenuParentId"> Menu Induk </label>
                <div class="col-sm-3">
                    <select class="form-control" id="MenuParentId" name="MenuParentId">
                        <option value="0">-- pilih --</option>
                    <?php 
                        foreach($parents as $parent) {
                            $selected = $menu['MenuParentId'] == $parent['MenuId'] ? "selected " : "";
                            echo "<option value='$parent[MenuId]' $selected>$parent[MenuName]</option>";
                        }
                    ?>
                    </select>
                </div>
            </div>
            <div class="form-group row parent_related" style="display: <?=$menu['MenuParentId'] == 0 ? 'none' : 'block'?>">
                <label class='col-sm-3 col-form-label' for='index'> Aksi </label>
                <div class="col-sm-9">
                    <div class="form-check form-check-flat">
                        <label class="form-check-label">
                            <input class="form-check-input" name="index" type="checkbox" value="1" <?=$aksi['index'] ? 'checked="checked"' : ''?>/>
                            View
                        </label>
                    </div>
                    <div class="form-check form-check-flat">
                        <label class="form-check-label">
                            <input class="form-check-input" name="search" type="checkbox" value="1" <?=$aksi['search'] ? 'checked="checked"' : ''?>/>
                           Cari                                             
                        </label>
                    </div>
                    <div class="form-check form-check-flat">
                        <label class="form-check-label">
                            <input class="form-check-input"name="add" type="checkbox" value="1" <?=$aksi['add'] ? 'checked="checked"' : ''?>/>
                           Add                            
                        </label>
                    </div>
                    <div class="form-check form-check-flat">
                        <label class="form-check-label">
                            <input class="form-check-input"name="update" type="checkbox" value="1" <?=$aksi['update'] ? 'checked="checked"' : ''?>/>
                           Update                            
                        </label>
                    </div>
                    <div class="form-check form-check-flat">
                        <label class="form-check-label">
                            <input class="form-check-input" name="delete" type="checkbox" value="1" <?=$aksi['delete'] ? 'checked="checked"' : ''?>/>
                           Delete                           
                        </label>
                    </div>
                    <div class="form-check form-check-flat">
                        <label class="form-check-label">
                            <input class="form-check-input" name="detail" type="checkbox" value="1" <?=$aksi['detail'] ? 'checked="checked"' : ''?>/>
                           Detail                           
                        </label>
                    </div>
                    <div class="form-check form-check-flat">
                        <label class="form-check-label">
                            <input class="form-check-input"name="print" type="checkbox" value="1" <?=$aksi['print'] ? 'checked="checked"' : ''?>/>
                           Cetak                           
                        </label>
                    </div>
                    <div class="form-check form-check-flat">
                        <label class="form-check-label">
                            <input class="form-check-input" name="export" type="checkbox" value="1" <?=$aksi['export'] ? 'checked="checked"' : ''?>/>
                           Export                           
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Icon</label>
                <div class="col-sm-6">
                    <input name="MenuIcon" type="text" placeholder="Icon Menu" class="form-control" value="<?=$menu['MenuIcon']?>">
                </div>
            </div>                           
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Urutan</label>
                <div class="col-sm-6">
                    <input name="MenuOrder" type="text" placeholder="Urutan Menu" class="form-control" value="<?=$menu['MenuOrder']?>">
                </div>
            </div>  
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Tampilkan</label>
                <div class="col-sm-6">                            
                    <div class="form-radio form-radio-flat">
                        <label class="form-check-label">
                            <input class="form-check-input" name="MenuIsShow" type="radio" value="1" checked="checked"/>
                            Ya
                        </label>
                    </div>
                    <div class="form-radio form-radio-flat">
                        <label class="form-check-label">
                            <input class="form-check-input" name="MenuIsShow" type="radio" value="0" <?=($menu['MenuIsShow']=='0'?'checked="checked"':'')?>/>
                            Tidak
                        </label>
                    </div>
                </div>
            </div>          
            <div class="form-group row">
                <div class="col-lg-offset-2 col-lg-10">
                    <input type="hidden" name="MenuId" value="<?=$menu['MenuId']?>"/>
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