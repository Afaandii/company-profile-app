  <!-- Main Footer -->
  <footer class="main-footer">
      <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
          <b>Version</b> 3.2.0
      </div>
  </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
  <script src="{{ asset('admin_lte/plugins/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap -->
  <script src="{{ asset('admin_lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- overlayScrollbars -->
  <script src="{{ asset('admin_lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('admin_lte/dist/js/adminlte.js') }}"></script>

  <!-- PAGE PLUGINS -->
  <!-- jQuery Mapael -->
  <script src="{{ asset('admin_lte/plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
  <script src="{{ asset('admin_lte/plugins/raphael/raphael.min.js') }}"></script>
  <script src="{{ asset('admin_lte/plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
  <script src="{{ asset('admin_lte/plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
  <!-- ChartJS -->
  <script src="{{ asset('admin_lte/plugins/chart.js/Chart.min.js') }}"></script>
  {{-- 
  <!-- AdminLTE for demo purposes -->
  <script src="{{ asset('admin_lte/dist/js/demo.js') }}"></script> --}}
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="{{ asset('admin_lte/dist/js/pages/dashboard2.js') }}"></script>

  <script>
      document.addEventListener('DOMContentLoaded', function() {
          const title = document.querySelector('#title');
          const slug = document.querySelector('#slug');

          if (title) {
              title.addEventListener('change', function() {
                  fetch('/checkSlug?name=' + encodeURIComponent(title.value))
                      .then(response => response.json())
                      .then(data => {
                          slug.value = data.slug;
                      });
              });
          }
      });
  </script>

  </body>

  </html>
