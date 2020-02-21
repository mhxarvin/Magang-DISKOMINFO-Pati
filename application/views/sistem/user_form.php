<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Form <?=$sub == 'add' ? 'Tambah' : 'Edit'?> Pengguna</h4>
          <form class="forms-sample" action="<?=base_url("sistem/user_do/$sub")?>" method="post">
            <div class="form-group row">
            <label class="col-sm-3 col-form-label">NIP</label>
                <div class="col-sm-6">
                    <input name="UserNip" type="text" placeholder="No NIP" class="form-control" value="<?=$user['UserNip']?>"/>                
                </div>
            </div>
            <div class="form-group row">
            <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                <div class="col-sm-6">
                <input name="UserRealName" type="text" placeholder="Nama Lengkap" class="form-control" value="<?=$user['UserRealName']?>"/>
                </div>
            </div>
             <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Username</label>
                    <div class="col-sm-6">
                        <input name="UserName" type="text" placeholder="Username" class="form-control" value="<?=$user['UserName']?>"/>
                    </div>
                </div>
                             
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Password</label>
                    <div class="col-sm-6">
                        <input name="UserPassword" type="password" placeholder="Password" class="form-control" />
                    </div>
                </div>
                             
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Ulangi Password</label>
                    <div class="col-sm-6">
                        <input name="UlangPassword" type="password" placeholder="Ulangi Password" class="form-control"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 control-label" for="groups">Group</label>
                    <div class="col-lg-8">
                        <select id="groups" multiple class="form-control" name="groups[]">
                    <?php
                        $data_array = array();
                        foreach($usergroup as $ug){
                            $data_array[] = $ug['UserGroupGroupId'];
                        }
                        foreach($groups as $group) {
                            $sel = in_array($group['GroupId'], $data_array) ? " selected='selected'" : "";
                            echo "<option value='$group[GroupId]'$sel>$group[GroupBidang]</option>";
                        }
                    ?>
                        </select>
                    </div>
                </div>
                             
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Unit Kerja</label>
                    <div class="col-lg-8">
                        <select name="UserUnitKerjaId" class="form-control">
                    <?php
                        foreach($unitkerja as $uk) {
                            $sel = $user['UserUnitKerjaId'] == $uk[UnitKerjaId] ? " selected='selected'" : "sel";
                            echo "<option value='$uk[UnitKerjaId]'$sel>$uk[UnitKerjaNama]</option>";
                        }
                    ?>        
                        </select> 
                    </div>
                </div>               
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Nomor HP</label>
                    <div class="col-sm-6">
                        <input name="UserHp" type="text" placeholder="No Handphone" class="form-control" value="<?=$user['UserHp']?>" />
                    </div>
                </div>
                             
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">E-mail</label>
                    <div class="col-sm-6">
                        <input name="UserEmail" type="text" placeholder="Email" class="form-control" value="<?=$user['UserEmail']?>" />
                    </div>
                </div>
                             
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Masa Berlaku</label>
                    <div class="col-md-4">                            
                        <input class="form-control form-control-inline input-medium default-date-picker"  name="UserExpired" type="text" value="<?=$user['UserExpired']?>" />
                        <p class="help-block">Pilih tanggal</p>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="UserActive">Status</label>
                    <div class="col-lg-6">
                        <div class="form-check form-check-flat">
                            <label class="form-check-label">
                                <input class="form-check-input" id="UserActive" name="UserActive" type="checkbox" value="1"<?=$user['UserActive'] ? ' checked="checked"' : ''?>>
                                    Aktif
                            </label>
                        </div>
                    </div>
                </div>
                             
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Keterangan</label>
                    <div class="col-sm-6">
                        <input name="UserNote" type="text" placeholder="Keterangan" class="form-control" value="<?=$user['UserNote']?>" />
                    </div>
                </div>   
            <div class="form-group row">
                <div class="col-lg-offset-2 col-lg-10">
                    <input type="hidden" name="UserId" value="<?=$user['UserId']?>"/>
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
                    location.href = '<?=base_url('sistem/user')?>';
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
 <script type="text/javascript">
        $(function(){
            window.prettyPrint && prettyPrint();
        
        $('.default-date-picker').datepicker({
            format: 'dd-mm-yyyy'
        });
    });
    </script>

