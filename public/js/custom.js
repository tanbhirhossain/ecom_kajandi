$(document).ready(function() {

 $('select[name="seller_id"]').on('change', function(){
     var sellerId = $(this).val();
     if(sellerId) {

         $.ajax({
             url: 'get/pro/'+sellerId,
             type:"GET",
             dataType:"json",
             beforeSend: function(){
                 $('#loader').css("visibility", "visible");
             },

             success:function(data) {

                 $('select[name="product_id"]').empty();

                 $.each(data, function(key, value){

                     $('select[name="product_id"]').append('<option value="'+ key +'">' + value + '</option>');

                 });
             },
             complete: function(){
                 $('#loader').css("visibility", "hidden");
             }
         });
     } else {
         $('select[name="product_id"]').empty();
     }

 });

});
