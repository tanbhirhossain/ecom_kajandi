

</div><!-- /#right-panel -->

<!-- Right Panel -->
<script type="text/javascript">
function readURL(input) {

if (input.files && input.files[0]) {
  var reader = new FileReader();

  reader.onload = function(e) {
    $('#blah').attr('src', e.target.result);

    $('#blah').hide();
    $('#blah').fadeIn(650);

  }

  reader.readAsDataURL(input.files[0]);
}
}

$("#imgInp").change(function() {
readURL(this);
});
</script>
<script src="{{asset('/public/backend/assets/')}}/js/vendor/jquery-2.1.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
<script src="{{asset('/public/backend/assets/')}}/js/plugins.js"></script>
<script src="{{asset('/public/backend/assets/')}}/js/main.js"></script>


<script src="{{asset('/public/backend/assets/')}}/js/lib/chart-js/Chart.bundle.js"></script>
<script src="{{asset('/public/backend/assets/')}}/js/dashboard.js"></script>
<script src="{{asset('/public/backend/assets/')}}/js/widgets.js"></script>
<script src="{{asset('/public/backend/assets/')}}/js/lib/vector-map/jquery.vmap.js"></script>
<script src="{{asset('/public/backend/assets/')}}/js/lib/vector-map/jquery.vmap.min.js"></script>
<script src="{{asset('/public/backend/assets/')}}/js/lib/vector-map/jquery.vmap.sampledata.js"></script>
<script src="{{asset('/public/backend/assets/')}}/js/lib/vector-map/country/jquery.vmap.world.js"></script>
{{--Datable Script Start--}}
<script src="{{asset('public/backend/assets/')}}/js/lib/data-table/datatables.min.js"></script>
<script src="{{asset('public/backend/assets/')}}/js/lib/data-table/dataTables.bootstrap.min.js"></script>
<script src="{{asset('public/backend/assets/')}}/js/lib/data-table/dataTables.buttons.min.js"></script>
<script src="{{asset('public/backend/assets/')}}/js/lib/data-table/buttons.bootstrap.min.js"></script>
<script src="{{asset('public/backend/assets/')}}/js/lib/data-table/jszip.min.js"></script>
<script src="{{asset('public/backend/assets/')}}/js/lib/data-table/pdfmake.min.js"></script>
<script src="{{asset('public/backend/assets/')}}/js/lib/data-table/vfs_fonts.js"></script>
<script src="{{asset('public/backend/assets/')}}/js/lib/data-table/buttons.html5.min.js"></script>
<script src="{{asset('public/backend/assets/')}}/js/lib/data-table/buttons.print.min.js"></script>
<script src="{{asset('public/backend/assets/')}}/js/lib/data-table/buttons.colVis.min.js"></script>
<script src="{{asset('public/backend/assets/')}}/js/lib/data-table/datatables-init.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#bootstrap-data-table-export').DataTable();
    } );
</script>

{{--Datable Script End--}}
<script>
    ( function ( $ ) {
        "use strict";

        jQuery( '#vmap' ).vectorMap( {
            map: 'world_en',
            backgroundColor: null,
            color: '#ffffff',
            hoverOpacity: 0.7,
            selectedColor: '#1de9b6',
            enableZoom: true,
            showTooltip: true,
            values: sample_data,
            scaleColors: [ '#1de9b6', '#03a9f5' ],
            normalizeFunction: 'polynomial'
        } );
    } )( jQuery );
</script>
{{--Ck Editor Script--}}
<script src="{{asset('/vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('/vendor/unisharp/laravel-ckeditor/adapters/jquery.js')}}"></script>
<script>
    $('textarea').ckeditor();
    // $('.textarea').ckeditor(); // if class is prefered.
</script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

<script type="text/javascript">
    $("select[name='seller_id']").change(function(){
        var seller_id = $(this).val();
        var token = $("input[name='_token']").val();
        $.ajax({
            url: "<?php echo route('select-pro') ?>",
            method: 'POST',
            data: {seller_id:seller_id, _token:token},
            success: function(data) {
                $("select[name='product_id'").html('');
                $("select[name='product_id'").html(data.options);
            }
        });
    });
</script>

</body>
</html>
