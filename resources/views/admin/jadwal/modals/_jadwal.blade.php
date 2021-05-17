<div class="modal fade modal-flex p-0" id="modal-jadwal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header p-4">
        <h4 class="modal-title">
          Tambah Jadwal
        </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-4">
        <form id="form-pesan" action="">
          @csrf

          <div class="row">
            <input type="hidden" name="hidden_id" id="hidden_id" class="form-control form-control-sm">

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
                <label class="bmd-label-floating">Jam</label>
                <input type="text" name="jam" id="jam" class="form-control form-control-sm" placeholder="Jam">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group bmd-form-group">
                <label class="bmd-label-floating">Tanggal Jadwal</label>
                <input type="date" name="tanggal-jadwal" id="tanggal-jadwal" class="form-control form-control-sm">
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