        <footer class="main-footer">
            <div class="footer-left">
                Copyright &copy; 2021 By Hotel-Bamboo Made with ❤</a>
            </div>
            <div class="footer-right">
                v1.0
            </div>
        </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="../assets/js/stisla.js"></script>

  <!-- JS Libraies -->
  <script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>

  <!-- Datatables JS File -->
  <script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="../assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="../assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="../assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="../assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="../assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="../assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="../assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="../assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

  <!-- Page Specific JS File -->
  <script>
    $(function () {
        $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        });
    });
  </script>

  <!-- Template JS File -->
  <script src="../assets/js/scripts.js"></script>
  <script src="../assets/js/custom.js"></script>
</body>
</html>