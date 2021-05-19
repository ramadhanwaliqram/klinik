@extends('layouts.head')

 
  @section('content')
    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container">

        <div class="row">
          <div class="col-lg-4 d-flex align-items-stretch">
            <div class="content" style="background-color: red">
              <h3>Kenapa memilih kami ?</h3>
              <p>
              Layanan Kesehatan Terlengkap di Setiap Langkah Perjalanan Medis Pengguna.
              Akses Mudah dan Cepat Demi Masa Depan Kesehatan Indonesia yang Berkualitas.
              Semua informasi kesehatan yang tersedia di KLinik Kami disusun dalam bahasa Indonesia yang mudah dimengerti dan ditinjau oleh tim dokter yang kompeten.
              </p>
              <div class="text-center">
                <a href="#" class="more-btn">Lihat Lebih <i class="bx bx-chevron-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-8 d-flex align-items-stretch">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-receipt" style="color:red"></i>
                    <h4>Dokter</h4>
                    <p>Kami memliki dokter yang sangat baik di bidangnya, dan mereka akan membantu anda dengan sangat profesional</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-cube-alt" style="color:red"></i>
                    <h4>Rekam Medis</h4>
                    <p>Rekam medis cocok untuk anda yang ingin mendapatkan statistik kesehatan anda</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-images" style="color:red"></i>
                    <h4>Apotek</h4>
                    <p>Kami menyediakan obat-obatan untuk pasien, dan bisa di beli sesuai dengan resep atau anjuran dokter</p>
                  </div>
                </div>
              </div>
            </div><!-- End .content-->
          </div>
        </div>

      </div>
    </section><!-- End Why Us Section -->

      <!-- ======= Appointment Section ======= -->
      <section id="appointment" class="appointment section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Konsultasi</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <form action="forms/appointment.php" method="post" role="form" class="php-email-form">
          <div class="form-row">
          <div class="col-md-4 form-group">
              <select name="department" id="department" class="form-control">
                <option value="">Pilih Dokter</option>
                <option value="Department 1">Dokter 1</option>
                <option value="Department 2">Dokter 2</option>
                <option value="Department 3">Dokter 3</option>
              </select>
              <div class="validate"></div>
            </div>
          </div>

          <div class="form-group">
            <textarea class="form-control" name="message" rows="5" placeholder="Message (Optional)"></textarea>
            <div class="validate"></div>
          </div>
          <div class="mb-3">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message" style="background-color: red">Permintaan kamu sedang diperoses, harap sabar ya!. Thank you!</div>
          </div>
          <div class="text-center" ><button type="submit" style="background-color: red">Konsultasi</button></div>
        </form>

      </div>
    </section><!-- End Appointment Section -->
   
  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="container d-md-flex py-4">

      <div class="mr-md-auto text-center text-md-left">
        <div class="copyright">
          &copy; Copyright <strong><span>Medilab</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/ -->
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"  style="background-color:red"><i class="bx bxl-twitter"  ></i></a>
        <a href="#" class="facebook"  style="background-color:red"><i class="bx bxl-facebook" ></i></a>
        <a href="#" class="instagram"  style="background-color:red"><i class="bx bxl-instagram" ></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top" ><i class="icofont-simple-up"  style="background-color:red"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  @endsection