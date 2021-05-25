<div class="modal fade modal-flex p-0" id="modal-dokter" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header p-4">
        <h4 class="modal-title">
          Tambah Dokter
        </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-4">
        <form class="form-add-dokter" method="POST">
          @csrf
          <div class="row">
            <input type="hidden" name="hidden_id" id="hidden_id" class="form-control form-control-sm">
            <input type="hidden" name="send_type" id="send_type" class="form-control form-control-sm">

            <div class="col-md-12">
              <div class="form-group bmd-form-group">
                <label class="bmd-label-floating">Nama Dokter</label>
                <input type="text" name="nama" id="nama" class="form-control form-control-sm" placeholder="Nama Dokter">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group bmd-form-group">
                <label class="bmd-label-floating">Username</label>
                <input type="text" name="username" id="username" class="form-control form-control-sm" placeholder="Username">
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group bmd-form-group">
                <label class="bmd-label-floating">Password</label>
                <input type="password" name="password" id="password" class="form-control form-control-sm" placeholder="Password">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group bmd-form-group">
                <label class="bmd-label-floating">Tanggal Lahir</label>
                <input type="date" name="tanggal-lahir" id="tanggal-lahir" class="form-control form-control-sm" placeholder="Tanggal Lahir">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="gender">Jenis Kelamin</label>
                  <select name="gender" id="gender" class="form-control form-control-sm">
                      <option value="">-- Jenis Kelamin --</option>
                      <option value="Laki-laki">Laki-Laki</option>
                      <option value="Perempuan">Perempuan</option>
                  </select>
              </div>
            </div>
          </div>


          <div class="row">
            <div class="col-md-6">
              <div class="form-group bmd-form-group">
                <label class="bmd-label-floating">Email</label>
                <input type="text" name="email" id="email" class="form-control form-control-sm" placeholder="Email">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group bmd-form-group">
                <label class="bmd-label-floating">No Telp</label>
                <input type="number" name="no-telp" id="no-telp" class="form-control form-control-sm" placeholder="No Telp">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group bmd-form-group">
                <label class="bmd-label-floating">Spesialis</label>
                <input type="text" name="spesialis" id="spesialis" class="form-control form-control-sm" placeholder="Spesialis">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <label>Alamat</label>
              <div class="form-group">
                <textarea class="form-control form-control-sm" name="alamat" id="alamat" rows="5" placeholder="Alamat"></textarea>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="d-flex justify-content-end align-items-center">
                <div>
                  <button type="submit" id="button" class="btn btn-sm btn-success">Simpan</button>
                  <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Batal</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
