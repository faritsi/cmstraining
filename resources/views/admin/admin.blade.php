@extends('dashboard/app')
@section('content')
<div id="bgtable">
    <div id="botable">
        <div id="tabletop" class="clearfix">
            <div class="tabletoptit">
                Data Admin
            </div>
            @can('create role')
            <div class="tabletopbtn">
                <a href="#" id="myBtn">+ Admin</a>
            </div>
            @endcan
        </div>
        <div id="table">
            <table width="100%" cellpadding="0" cellspacing="0" border="0" class="display" id="example">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- menampilkan data admin --}}
                    <?php $no = 1; ?>
                    <?php foreach($admin as $a){ ?>
                        <tr>
                            <td width="1%" align="center"><?= $no++; ?></td>
                            <td><?= $a->name; ?></td>
                            <td><?= $a->username; ?></td>
                            <td>
                                <a href="#" id="myBtnEdit<?= $a->user_id; ?>" class="btnedit"><i class="fa fa-pen"></i></a>
                                <a href="javascript:void(0)" title="Hapus" class="btnhps" data-nama="<?= $a->name; ?>" data-url="{{ route('admin.hapus', $a->user_id) }}"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php } ?>    
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- modal tambah -->
<div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Admin Tambah</h2>
    </div>
    <div class="modal-body">
        <form method="POST" action="{{ route('admin.action') }}" enctype="multipart/form-data">
            @csrf
            <div id="formbox" class="clearfix">
                <div class="formlabel">Nama</div>
                <div class="forminput">
                    <input name="name" type="text" class="form-control" required />
                </div>
            </div>
            <div id="formbox" class="clearfix">
                <div class="formlabel">Username</div>
                <div class="forminput">
                    <input name="username" type="text" class="form-control" required />
                </div>
            </div>
            <div id="formbox" class="clearfix">
                <div class="formlabel">Password</div>
                <div class="forminput">
                    <input name="password" type="password" class="form-control" required />
                </div>
            </div>
            <div id="formbox" class="clearfix">
                <div class="formlabel">Konfirmasi Password</div>
                <div class="forminput">
                    <input name="password_confirm" type="password" class="form-control" required />
                </div>
            </div>
            <div class="formsubmit">
                <input name="submit" type="submit" value="Simpan" class="btnsubmit"></input>
            </div>
        </form>
    </div>
  </div>
</div>

<!-- modal edit -->
		<!--MODAL EDIT DATA-->
<?php foreach($admin as $a){ ?>
    <div id="myModalEdit<?= $a->user_id ?>" class="modal">
        <div class="modal-content">
        <div class="modal-header">
            <span class="closeedit" id="close<?= $a->user_id ?>">&times;</span>
            <h2>Edit Admin</h2>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('admin.update', $a->user_id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
                <div id="formbox" class="clearfix">
                    <div class="formlabel">Nama</div>
                    <div class="forminput">
                        <input name="name" value="<?= $a->name?>" type="text" class="form-control" required />
                    </div>
                </div>
                <div id="formbox" class="clearfix">
                    <div class="formlabel">Username</div>
                    <div class="forminput">
                        <input name="username" value="<?= $a->username ?>" type="text" class="form-control" required />
                    </div>
                </div>
                <div id="formbox" class="clearfix">
                    <div class="formlabel">Password <div style="font-size:12px;color:#c00">*Isi jika ingin mengganti password</div> </div>
                    <div class="forminput">
                        <input name="password" type="password" class="form-control" />
                    </div>
                </div>
                <div class="formsubmit">
                    <input name="edit" type="submit" value="Update" class="btnsubmit"></input>
                </div>
            </form>
        </div>
        </div>
    </div>
<?php } ?>	

<script>
    var modal = document.getElementById("myModal");
    var btn = document.getElementById("myBtn");
    var span = document.getElementsByClassName("close")[0]; 
    btn.onclick = function() {
        modal.style.display = "block";
    }
    span.onclick = function() {
        modal.style.display = "none";
    }
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
<script>
	<?php foreach($admin as $a){ ?>
			var modaledit<?= $a->user_id ?> 	= document.getElementById("myModalEdit<?= $a->user_id ?>");
			var btnedit<?= $a->user_id ?> 	= document.getElementById("myBtnEdit<?= $a->user_id ?>");
			var spanedit<?= $a->user_id ?> 	= document.getElementById("close<?= $a->user_id ?>");
			
			btnedit<?= $a->user_id ?>.onclick = function() {
			  modaledit<?= $a->user_id ?>.style.display = "block";
			}
			
			spanedit<?= $a->user_id ?>.onclick = function() {
			  modaledit<?= $a->user_id ?>.style.display = "none";
			}
			
			window.onclick = function(event) {
			  if (event.target == modaledit<?= $a->user_id ?>) {
				modaledit<?= $a->user_id ?>.style.display = "none";
			  }
			}
	<?php } ?>	
</script>
@if(session('success'))
<script>
    Swal.fire({
        title: 'Sukses!',
        text: '<?= session('success') ?>',
        icon: 'success',
        confirmButtonText: 'Ok'
    });
</script>
@endif
@if($errors->any())
    @foreach($errors->all() as $err)
        <script>
            Swal.fire({
                title: 'Gagal!',
                text: '<?= $err ?>',
                icon: 'error',
                confirmButtonText: 'Ok'
            });
        </script>    
    @endforeach
@endif
<script type="text/javascript" lang="javascript">
    $('.btnhps').click(function(e) {
        let nama = $(this).data('nama'), url = $(this).data('url')
        Swal.fire({
            title: 'Anda Yakin?',
            text: `Apakah anda yakin ingin menghapus ${nama}?`,
            icon: 'question',
            showCancelButton: true,
        }).then(result => {
            if (result.value) {
                window.location = url
            }
        })
    })
</script>
@endsection