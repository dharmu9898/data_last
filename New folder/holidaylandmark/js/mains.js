function check()
{

    var pass1 = document.getElementById('Phoneno');


    var message = document.getElementById('message');

   var goodColor = "#0C6";
    var badColor = "#FF9B37";

    if(Phoneno.value.length!=10){

      Phoneno.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "required 10 digits, match requested format!"
    }}
	
	setTimeout(function() {
    $('#mydiv').fadeOut('fast');
}, 3000); // <-- time in milliseconds

function goBack() {

window.history.back();

  }



    
    
     $(document).ready(function(){

            $("#f3").validate(
            {
                ignore: [],
              debug: false,
                rules: { 

                    Describes:{
                         required: function() 
                        {
                         CKEDITOR.instances.Describes.updateElement();
                        },

                         minlength:10
                    }
                },
                messages:
                    {

                    Describes:{
                        required:"Please enter Text",
                        minlength:"Please enter 10 characters"


                    }
                }
            });
        });

 $(document).ready(function(){
                $(".countries").hide();
                $(".states").hide();
                $(".cities").hide();
                $( ".updatecountries" ).change(function() {
              $(".updatecountries").hide();
              $(".countries").show();
              $('.countries').attr('name', 'country');
               $(".updatestates").hide();
              $(".states").show();
              $('.states').attr('name', 'state');
              $(".updatecities").hide();
              $(".cities").show();
              $('.cities').attr('name', 'city');
            });
          });
  function welcome_fetch_data(page, manual_filter, manual_filter_tablesm){

    
      
                $.ajax({
                url:"{{ url('admin/operator/index/welcomes_manualfilter')}}?page="+page+"&manual_filter_table="+manual_filter+"&manual_filter_tablesm="+manual_filter_tablesm,
                success:function(data){
                 
                    console.log(data);
                    $('#myTable tbody').html('');
                    $('#myTable tbody').html(data);
                }
                });
            }
            $(document).ready(function() {
              $("#manual_filter_table").change(function() {
                $('#manual_filter_tablesm').val('');
                var manual_filter_tablesm = $('#manual_filter_tablesm').val();
                manual_filter = $("#manual_filter_table").val();
                 var page = $('#hidden_page').val();
                 $('#manual_filter_table1 option').prop('selected', function() {
                    return this.defaultSelected;
                });
                 $('#manual_filter_table2 option').prop('selected', function() {
                    return this.defaultSelected;
                });
                welcome_fetch_data(page, manual_filter, manual_filter_tablesm);
              })
            });
        $(document).ready(function() {
              $("#manual_filter_table1").change(function() {
                $('#manual_filter_tablesm').val('');
                var manual_filter_tablesm = $('#manual_filter_tablesm').val();
                manual_filter = $("#manual_filter_table1").val();
                 var page = $('#hidden_page').val();
                 $('#manual_filter_table option').prop('selected', function() {
                    return this.defaultSelected;
                });
                 $('#manual_filter_table2 option').prop('selected', function() {
                    return this.defaultSelected;
                });
                welcome_fetch_data(page, manual_filter, manual_filter_tablesm);
              })
            });
        $(document).ready(function() {
              $("#manual_filter_table2").change(function() {
                $('#manual_filter_tablesm').val('');
                var manual_filter_tablesm = $('#manual_filter_tablesm').val();
                manual_filter = $("#manual_filter_table2").val();
                 var page = $('#hidden_page').val();
                 $('#manual_filter_table option').prop('selected', function() {
                    return this.defaultSelected;
                });
                 $('#manual_filter_table1 option').prop('selected', function() {
                    return this.defaultSelected;
                });
                welcome_fetch_data(page, manual_filter, manual_filter_tablesm);
              })
            });
            $(document).on('keyup', '#manual_filter_tablesm', function(){
              
            var manual_filter_tablesm = $('#manual_filter_tablesm').val();
            manual_filter = $("#manual_filter_table").val();
            var page = $('#hidden_page').val();
            $('#manual_filter_table option').prop('selected', function() {
                    return this.defaultSelected;
                });
            $('#manual_filter_table1 option').prop('selected', function() {
                    return this.defaultSelected;
                });
            $('#manual_filter_table2 option').prop('selected', function() {
                    return this.defaultSelected;
                });
                welcome_fetch_data(page, manual_filter, manual_filter_tablesm);
           });
		   $(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
