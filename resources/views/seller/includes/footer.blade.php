<h6 class="title-divider text-muted mt40 mb20"> Site Statistics
    <span class="pull-right text-primary fw600">Today</span>
</h6>
</div>
</div>
</aside>
<!--  /Sidebar Right  -->

</div>
<!--  /Body Wrap   -->

<!--  Scripts  -->

<!--  jQuery  -->
<script src="{{asset('public/seller')}}/assets/js/jquery/jquery-1.11.3.min.js"></script>
<script src="{{asset('public/seller')}}/assets/js/jquery/jquery_ui/jquery-ui.min.js"></script>

<script src="{{asset('public/seller')}}/assets/js/plugins/fileupload/fileupload.js"></script>
<script src="{{asset('public/seller')}}/assets/js/plugins/holder/holder.min.js"></script>


<!--  HighCharts Plugin  -->
<script src="{{asset('public/seller')}}/assets/js/plugins/highcharts/highcharts.js"></script>
<script src="{{asset('public/seller')}}/assets/js/plugins/c3charts/d3.min.js"></script>
<script src="{{asset('public/seller')}}/assets/js/plugins/c3charts/c3.min.js"></script>

<!--  Simple Circles Plugin  -->
<script src="{{asset('public/seller')}}/assets/js/plugins/circles/circles.js"></script>

<!--  Maps JSs  -->
<script src="{{asset('public/seller')}}/assets/js/plugins/jvectormap/jquery.jvectormap.min.js"></script>
<script src="{{asset('public/seller')}}/assets/js/plugins/jvectormap/assets/jquery-jvectormap-us-lcc-en.js"></script>

<!--  FullCalendar Plugin  -->
<script src="{{asset('public/seller')}}/assets/js/plugins/fullcalendar/lib/moment.min.js"></script>
<script src="{{asset('public/seller')}}/assets/js/plugins/fullcalendar/fullcalendar.min.js"></script>

<!--  Date/Month - Pickers  -->
<script src="{{asset('public/seller')}}/assets/allcp/forms/js/jquery-ui-monthpicker.min.js"></script>
<script src="{{asset('public/seller')}}/assets/allcp/forms/js/jquery-ui-datepicker.min.js"></script>

<!--  Magnific Popup Plugin  -->
<script src="{{asset('public/seller')}}/assets/js/plugins/magnific/jquery.magnific-popup.js"></script>

<!--  Theme Scripts  -->
<script src="{{asset('public/seller')}}/assets/js/utility/utility.js"></script>
<script src="{{asset('public/seller')}}/assets/js/demo/demo.js"></script>
<script src="{{asset('public/seller')}}/assets/js/main.js"></script>

<!--  Widget JS  -->
<script src="{{asset('public/seller')}}/assets/js/demo/widgets.js"></script>
<script src="{{asset('public/seller')}}/assets/js/demo/widgets_sidebar.js"></script>
<script src="{{asset('public/seller')}}/assets/js/pages/dashboard1.js"></script>
<!--  /Scripts  -->

    <script src="{{asset('public/frontend/js/new-script.css')}}" charset="utf-8"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-confirmation/1.0.5/bootstrap-confirmation.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">

<script type="text/javascript">
    $(document).ready(function () {


        $('#master').on('click', function(e) {
         if($(this).is(':checked',true))
         {
            $(".sub_chk").prop('checked', true);
         } else {
            $(".sub_chk").prop('checked',false);
         }
        });


        $('.delete_all').on('click', function(e) {


            var allVals = [];
            $(".sub_chk:checked").each(function() {
                allVals.push($(this).attr('data-id'));
            });


            if(allVals.length <=0)
            {
                alert("Please select row.");
            }  else {


                var check = confirm("Are you sure you want to delete this row?");
                if(check == true){


                    var join_selected_values = allVals.join(",");


                    $.ajax({
                        url: $(this).data('url'),
                        type: 'DELETE',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: 'ids='+join_selected_values,
                        success: function (data) {
                            if (data['success']) {
                                $(".sub_chk:checked").each(function() {
                                    $(this).parents("tr").remove();
                                });
                                alert(data['success']);
                            } else if (data['error']) {
                                alert(data['error']);
                            } else {
                                alert('Whoops Something went wrong!!');
                            }
                        },
                        error: function (data) {
                            alert(data.responseText);
                        }
                    });


                  $.each(allVals, function( index, value ) {
                      $('table tr').filter("[data-row-id='" + value + "']").remove();
                  });
                }
            }
        });


        $('[data-toggle=confirmation]').confirmation({
            rootSelector: '[data-toggle=confirmation]',
            onConfirm: function (event, element) {
                element.trigger('confirm');
            }
        });


        $(document).on('confirm', function (e) {
            var ele = e.target;
            e.preventDefault();


            $.ajax({
                url: ele.href,
                type: 'DELETE',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function (data) {
                    if (data['success']) {
                        $("#" + data['tr']).slideUp("slow");
                        alert(data['success']);
                    } else if (data['error']) {
                        alert(data['error']);
                    } else {
                        alert('Whoops Something went wrong!!');
                    }
                },
                error: function (data) {
                    alert(data.responseText);
                }
            });


            return false;
        });
    });
</script>

</body>

</html>
