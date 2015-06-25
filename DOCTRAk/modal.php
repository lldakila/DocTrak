 <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close btn-danger" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Document Tracker</h4>
              </div>
              <div class="modal-body">
                      <div id="responds">

                         </div>
              </div>
              <div class="modal-footer">
      

              </div>
            </div>
          </div>
        </div>

          <div class="modal fade" id="myModals" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog" style="width: 600px;">
            <div class="modal-content ">
              <div class="modal-header">
                <button type="button" class="close btn-danger" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabels">Document Tracker</h4>
              </div>
              <div class="modal-body">
                      <div id="myModalsBody">

                         </div>
              </div>
              <div class="modal-footer">
  <div id="footerNote">
        </div>

              </div>
            </div>
          </div>
        </div>


    <script type="text/javascript">



function newDocument()
{


    var module='renderNewDoc';
//    document.getElementById("myModalLabels").innerHTML="New Document";
//    myModalsBody.innerHTML="<input type=text>";

    jQuery.ajax({
            type: "POST",
	    url:"<?php echo $PROJECT_ROOT; ?>quickNav.php",
            dataType:"text", // Data type, HTML, json etc.
            data:{module_name:module},
            beforeSend: function() {
              
                   
                   $("#myModalsBody").html('<div id="loadingModal"><img src="<?php echo $PROJECT_ROOT; ?>images/home/ajax-loader.gif" /></div>');
              document.getElementById('footerNote').innerHTML="";

                 
	        },
            ajaxError: function() {
		        $("#myModalsBody").html('<div id="loadingModal"><img src="<?php echo $PROJECT_ROOT; ?>images/home/ajax-loader.gif" /></div>');
	        },
            success:function(response){
                        $("#myModalsBody").html(response);

            },
            error:function (xhr, ajaxOptions, thrownError){
                alert(thrownError);
            }
        });
         $('#myModals').modal('show');
        //$('#myModal').modal('show');
        document.getElementById('myModalLabels').innerHTML='Document';

}


    function receiveDocument()
    {
         var module='renderReceiveDoc';
//    document.getElementById("myModalLabels").innerHTML="New Document";
//    myModalsBody.innerHTML="<input type=text>";

    jQuery.ajax({
            type: "POST",
	    url:"<?php echo $PROJECT_ROOT; ?>quickNav.php",
            dataType:"text", // Data type, HTML, json etc.
            data:{module_name:module},
            beforeSend: function() {

                    document.getElementById('footerNote').innerHTML="";
                   $("#myModalsBody").html('<div id="loadingModal"><img src="<?php echo $PROJECT_ROOT; ?>images/home/ajax-loader.gif" /></div>');
                   document.getElementById('myModalLabels').innerHTML='Receive Document';
                   

	        },
            ajaxError: function() {
		        $("#myModalsBody").html('<div id="loadingModal"><img src="<?php echo $PROJECT_ROOT; ?>images/home/ajax-loader.gif" /></div>');
	        },
            success:function(response){
                        $("#myModalsBody").html(response);

            },
            error:function (xhr, ajaxOptions, thrownError){
                alert(thrownError);
            }
        });
         $('#myModals').modal('show');
        //$('#myModal').modal('show');
        document.getElementById('myModalLabels').innerHTML='Receive Document';
    }

    function releaseDocument()
    {
        var module='renderReleaseDoc';
//    document.getElementById("myModalLabels").innerHTML="New Document";
//    myModalsBody.innerHTML="<input type=text>";

    jQuery.ajax({
            type: "POST",
	    url:"<?php echo $PROJECT_ROOT; ?>quickNav.php",
            dataType:"text", // Data type, HTML, json etc.
            data:{module_name:module},
            beforeSend: function() {

                document.getElementById('footerNote').innerHTML="";
                   $("#myModalsBody").html('<div id="loadingModal"><img src="<?php echo $PROJECT_ROOT; ?>images/home/ajax-loader.gif" /></div>');



	        },
            ajaxError: function() {
		        $("#myModalsBody").html('<div id="loadingModal"><img src="<?php echo $PROJECT_ROOT; ?>images/home/ajax-loader.gif" /></div>');
	        },
            success:function(response){
                        $("#myModalsBody").html(response);

            },
            error:function (xhr, ajaxOptions, thrownError){
                alert(thrownError);
            }
        });
         $('#myModals').modal('show');
        //$('#myModal').modal('show');
        document.getElementById('myModalLabels').innerHTML='Release Document';
    }

    function forpickupDocument()
    {
         var module='renderForpickupDoc';
//    document.getElementById("myModalLabels").innerHTML="New Document";
//    myModalsBody.innerHTML="<input type=text>";
    
    jQuery.ajax({
            type: "POST",
	    url:"<?php echo $PROJECT_ROOT; ?>quickNav.php",
            dataType:"text", // Data type, HTML, json etc.
            data:{module_name:module},
            beforeSend: function() {

                document.getElementById('footerNote').innerHTML="";
                   $("#myModalsBody").html('<div id="loadingModal"><img src="<?php echo $PROJECT_ROOT; ?>images/home/ajax-loader.gif" /></div>');

	        },
            ajaxError: function() {
		        $("#myModalsBody").html('<div id="loadingModal"><img src="<?php echo $PROJECT_ROOT; ?>images/home/ajax-loader.gif" /></div>');
	        },
            success:function(response){
                        $("#myModalsBody").html(response);

            },
            error:function (xhr, ajaxOptions, thrownError){
                alert(thrownError);
            }
        });
         $('#myModals').modal('show');
        //$('#myModal').modal('show');
        document.getElementById('myModalLabels').innerHTML='For Pickup';
    }

    function bacDocument()
    {
        var module='renderBacDoc';
//    document.getElementById("myModalLabels").innerHTML="New Document";
//    myModalsBody.innerHTML="<input type=text>";

    jQuery.ajax({
            type: "POST",
	    url:"<?php echo $PROJECT_ROOT; ?>quickNav.php",
            dataType:"text", // Data type, HTML, json etc.
            data:{module_name:module},
            beforeSend: function() {


                   $("#myModalsBody").html('<div id="loadingModal"><img src="<?php echo $PROJECT_ROOT; ?>images/home/ajax-loader.gif" /></div>');



	        },
            ajaxError: function() {
		        $("#myModalsBody").html('<div id="loadingModal"><img src="<?php echo $PROJECT_ROOT; ?>images/home/ajax-loader.gif" /></div>');
	        },
            success:function(response){
                        $("#myModalsBody").html(response);

            },
            error:function (xhr, ajaxOptions, thrownError){
                alert(thrownError);
            }
        });
         $('#myModals').modal('show');
        //$('#myModal').modal('show');
        document.getElementById('myModalLabels').innerHTML='BAC';
    }
</script>