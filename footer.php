<div class="footer top-page">
    &copy; 2020 - <?php echo date('Y') ?> <span class="roll">Roll: 40, 45, 38, 03</span> All Rights
    Reserved.
</div>

</section>
<!-- Dashboard Content END -->

</div>

<script src="./assets/js/jquery.js"></script>
<script src="./assets/js/bootstrap.min.js"></script>
<script src="./assets/js/main.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
<!-- CK Editor -->
<script src="./assets/ckeditor/ckeditor.js"></script>
<script>
    $(function() {
        $('#data_table').DataTable();
        CKEDITOR.replace('editor1');
    } );
</script>
</body>

</html>
