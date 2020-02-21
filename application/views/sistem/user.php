
<div class="content-wrapper">
  <div class="card">
    <div class="card-body">
      <div class="btn-group pull-right">
          <a href="<?= base_url('sistem/user/add') ?>" class="btn btn-success">
              <i class="fa fa-plus"></i> Tambah Baru
          </a>
      </div>
      <div class="col-sm-16">
      <h3 class="card-title">Daftar Pengguna</h3>
        <div class="row">
         <div class="card"> </div> 
          <div class="table-responsive">   
            <table class="table table-bordered" id="data-table"></table>  
          </div>
        </div>
      </div>
    </div>
  </div>
<script type="text/javascript" src="<?=base_url("template/backend/js/jquery.js")?>"></script>
<script type="text/javascript">
    $(function() {
        $("#data-table").tabel({
            source: '<?=base_url("sistem/user/search")?>',
            filterParams: $("div#data-table_wrapper").find("select").serializeArray(),
            order: [[ 2, 'asc' ]],
            columns: [		            	
                {bVisible: false,data :'UserId'},                
                {title: 'Aksi' , data : 'aksi'},
                {title: 'NIP' , data : 'UserNip'},
                {title: 'Nama Lengkap' , data : 'UserRealName'},
                {title: 'Username' , data : 'UserName'},
                {title: 'e-mail' , data : 'UserEmail'},
                {title: 'Berlaku' , data : 'UserExpired'},
                {title: 'Aktif' , data : 'UserActive'}
            ]
        });
    });
    
    function hapus(id) {
        bootbox.confirm({
            message: "Apakah anda yakin akan menghapus data Pengguna ini?",
            buttons: {
                cancel: {
                    label: '<i class="fa fa-times"></i> Batal',
                    className: "btn-danger btn-sm"
                },
                confirm: {
                    label: '<i class="fa fa-check"></i> Yakin',
                    className: "btn-primary btn-sm"        
                }
            },
            callback: function (result) {
                if(result) {
                    $.post(
                        '<?=base_url("sistem/user_do/delete")?>',
                        {id: id},
                        function(data) {
                            if(data.success) {
                                $.gritter.add({
                                    title: 'Informasi',
                                    text: 'Pengguna berhasil dihapus.',
                                    class_name: 'gritter-info gritter-center'
                                });
                                $("#data-table").tabel({
                                    reload :true                                
                                });
                            } else {
                                bootbox.alert(data.msg);
                            }
                        }, "json"
                    );
                }
            }
        });                
    }
</script>    