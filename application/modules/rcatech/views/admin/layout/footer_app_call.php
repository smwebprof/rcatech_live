<!-- BEGIN FOOTER -->
<div class="footer">
  <div class="footer-inner">
     2019 &copy; AgriMin Control International.
  </div>
  <div class="footer-tools">
    <span class="go-top">
      <i class="fa fa-angle-up"></i>
    </span>
  </div>
</div>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
    <script src="<?php echo ASSETS_PATH; ?>plugins/respond.min.js"></script>
    <script src="<?php echo ASSETS_PATH; ?>plugins/excanvas.min.js"></script> 
    <![endif]-->
<script src="<?php echo ASSETS_PATH; ?>plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="<?php echo ASSETS_PATH; ?>plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<script src="<?php echo ASSETS_PATH; ?>plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo ASSETS_PATH; ?>plugins/bootstrap/js/bootstrap2-typeahead.min.js" type="text/javascript"></script>
<script src="<?php echo ASSETS_PATH; ?>plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="<?php echo ASSETS_PATH; ?>plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo ASSETS_PATH; ?>plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo ASSETS_PATH; ?>plugins/jquery.cokie.min.js" type="text/javascript"></script>
<!--<script src="<?php echo ASSETS_PATH; ?>plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>-->
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="<?php echo ASSETS_PATH; ?>plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo ASSETS_PATH; ?>plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script type="text/javascript" src="<?php echo ASSETS_PATH; ?>plugins/clockface/js/clockface.js"></script>
<script type="text/javascript" src="<?php echo ASSETS_PATH; ?>plugins/bootstrap-daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="<?php echo ASSETS_PATH; ?>plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="<?php echo ASSETS_PATH; ?>plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script type="text/javascript" src="<?php echo ASSETS_PATH; ?>plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?php echo ASSETS_PATH; ?>plugins/jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo ASSETS_PATH; ?>plugins/bootstrap-select/bootstrap-select.min.js"></script>
<script type="text/javascript" src="<?php echo ASSETS_PATH; ?>plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="<?php echo ASSETS_PATH; ?>plugins/jquery-multi-select/js/jquery.multi-select.js"></script
<script type="text/javascript" src="<?php echo ASSETS_PATH; ?>plugins/data-tables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo ASSETS_PATH; ?>plugins/data-tables/DT_bootstrap.js"></script>
<!-- The basic File Upload plugin -->
<!-- file upload
<script src="<?php echo ASSETS_PATH; ?>plugins/jquery-file-upload/js/vendor/jquery.ui.widget.js"></script>
<script src="<?php echo ASSETS_PATH; ?>plugins/jquery-file-upload/js/jquery.fileupload.js"></script>-->
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo ASSETS_PATH; ?>scripts/core/app.js"></script>
<script src="<?php echo ASSETS_PATH; ?>scripts/custom/components-pickers.js"></script>
<script src="<?php echo ASSETS_PATH; ?>scripts/custom/custom.js"></script>
<script src="<?php echo ASSETS_PATH; ?>scripts/custom/table-advanced.js"></script>
<script src="<?php echo ASSETS_PATH; ?>scripts/custom/components-dropdowns.js"></script>
<!--<script src="<?php echo ASSETS_PATH; ?>scripts/custom/form-fileupload.js"></script>-->
<!-- END PAGE LEVEL SCRIPTS -->
<script>
        jQuery(document).ready(function() {       
           // initiate layout and plugins
           App.init();
           ComponentsPickers.init();
           Custom.init();
           Custom.initAddfileregister();
           ComponentsDropdowns.init();
           Custom.initCallGeneration();
           Custom.initCallSchedule();
           Custom.initCallReSchedule();
           Custom.initCallCancel();
           Custom.initRfiSent();
           Custom.initAddItemmaster();
           Custom.initAddSubtypeItemmaster();
           Custom.initAddManufacturer();
           //FormFileUpload.init();
           TableAdvanced.init();

        });

        
       $("#cargo_row").on("click",function(){
       
        var $tableBody = $('#cargo_details').find("tbody"),
                $trLast = $tableBody.find("tr:last"),
                $trNew = $trLast.clone();
            
            $trLast.after($trNew);
        });

        var commodity_arr = [];

          $('body').on('click', '.rmv',function(){
            //alert("wee");
            //alert($(this).attr("id"));
            $(this).closest('tr').remove();
            //$('#cargo_data_id').val() = $(this).attr("id");
            //$('#cargo_data_id').val($(this).attr("id"));
            //$(input[name="cargo_data_id"]).val($(this).attr("id"));

            commodity_arr.push($(this).attr("id"));
            $('#cargo_data_id').val(commodity_arr);
            //$('#edit_div6').hide();
            //alert(commodity_arr);
          });

        $("#call_nabcb_flag").on("click",function(){
              if ($(this).prop('checked')==true){ 
                  //alert(11);
                  var nabcb_id = 1;
                  //alert(item_val);
                  if(nabcb_id != '')
                  {
                     $.ajax({
                     'url' : '<?php echo BASE_PATH; ?>Callgenerationregister/fetch_getitems',
                     'type': 'post',
                     'data' : { id : nabcb_id},
                     'success' : function(data)
                      {
                        //alert(data);
                        $('#itemmaster').html(data);
                      } 
                   });
                 }
              } else {
                  //alert(222);
                  var nabcb_id = '0';
                  //alert(item_val);
                  if(nabcb_id != '')
                  {
                     $.ajax({
                     'url' : '<?php echo BASE_PATH; ?>Callgenerationregister/fetch_getitems',
                     'type': 'post',
                     'data' : { id : nabcb_id},
                     'success' : function(data)
                      {
                        //alert(data);
                        $('#itemmaster').html(data);
                      } 
                   });
                 }

              }
        
        });  


        $('#clients_name').change(function(){
            var client_id = $('#clients_name').val();
            //alert(client_id);
            if(client_id != '')
             {
               $.ajax({
               'url' : '<?php echo BASE_PATH; ?>Callgenerationregister/fetch_filebyclientid',
               'type': 'post',
               'data' : { id : client_id},
               'success' : function(data)
               {
                 //alert(data);                 
                 $('#file_no').html(data);
               } 
               });
             }


             if(client_id != '')
             {
                $.ajax({
               'url' : '<?php echo BASE_PATH; ?>Callgenerationregister/fetch_clientdetails',
               'type': 'post',
               'data' : { id : client_id},
               'success' : function(data)
               {
                 //alert(data);     
                 $('#file_class').val(data);            
                 //$('#branch_name').html(data);
               } 
               });
             }
        });

        $(".itemmaster").change(
            function() {
                //alert(111);
                var item_val = $('#itemmaster').val();
                //alert(item_val);
                if(item_val != '')
                {
                   $.ajax({
                   'url' : '<?php echo BASE_PATH; ?>Callgenerationregister/fetch_itemsubtype',
                   'type': 'post',
                   'data' : { id : item_val},
                   'success' : function(data)
                    {
                      //alert(data);
                      $('#itemsubtype').html(data);
                    } 
                 });
               }
            }
        );


        $('#call_file_no').change(function(){
            var call_file_no = $('#call_file_no').val();
            $('#file_id').val(call_file_no);
            //alert(call_file_no);
            if(call_file_no != '')
             {
               $.ajax({
               'url' : '<?php echo BASE_PATH; ?>Callscheduleregister/fetch_calldetailsbyfileno',
               'type': 'post',
               'data' : { id : call_file_no},
               'success' : function(data)
               {
                 //alert(data);                 
                 $('#call_no').html(data);
               } 
               });
             }
         });  

        $('#call_no').change(function(){
          var call_no = $('#call_no').val();
          var file_id = $('#file_id').val();
          //alert(file_id);
          if(call_no != '')
          {
            $.ajax({
               'url' : '<?php echo BASE_PATH; ?>Callscheduleregister/fetch_nabcbcalldetailsbyfileno',
               'type': 'post',
               'data' : { id : call_no,file_id : file_id},
               'success' : function(data)
               {
                 //alert(data);                 
                 $('#engineer_data').html(data);
               } 
               });

          }  

        });


        $('#company_country').change(function(){
            var comp_id = $('#company_country').val();

             if(comp_id != '')
             {
               $.ajax({
               'url' : '<?php echo BASE_PATH; ?>addcompanymaster/fetch_states',
               'type': 'post',
               'data' : { country_id : comp_id},
               'success' : function(data)
               {
                 // alert(data);
                 $('#company_state').html(data);
               } 
               });
             }
             
        });

        $('#company_state').change(function(){
            var state_id = $('#company_state').val();
            
             if(state_id != '')
             {
               $.ajax({
               'url' : '<?php echo BASE_PATH; ?>addcompanymaster/fetch_city',
               'type': 'post',
               'data' : { state_id : state_id},
               'success' : function(data)
               {
                 
                 $('#company_city').html(data);
               } 
               });
             } 
        });  
        
    </script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>