<script src="../plugins/common/common.min.js"></script>
<script src="../js/custom.min.js"></script>
<script src="../js/settings.js"></script>
<script src="../js/gleek.js"></script>
<!-- <script src="../js/styleSwitcher.js"></script> -->

<script src="../js/dashboard/dashboard-1.js"></script>
<script src="../plugins/tables/js/jquery.dataTables.min.js"></script>
    <script src="../plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="../plugins/tables/js/datatable-init/datatable-basic.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.3.1/classic/ckeditor.js"></script>

   <script>
     ClassicEditor
        .create( document.querySelector( '#description' ), {
      removePlugins: ['CKFinderUploadAdapter', 'CKFinder', 'EasyImage', 'Image', 'ImageCaption', 'ImageStyle', 'ImageToolbar', 'ImageUpload', 'MediaEmbed'],
    } )
        .catch( error => {
            console.error( error );
        } );
        $(".msg").fadeTo(2500,0.7).fadeOut(2500);
    </script>

</body>

</html>