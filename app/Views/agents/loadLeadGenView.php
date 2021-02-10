<section>
    <div class="container">
        <div class="row">
            <h1><?php echo $title; ?></h1>
        </div>
        <div class="row">

            <p>
                <?php 
                //echo $client['clientsFirstname']; 
                var_dump($client);
                ?>
            </p>

            <table class="table">
                <?php if($tasks == null){ ?>
                <tr>            
                    <td>No Data</td>
                    <td>Option</td>                  
                </tr>
               <?php 
                    }else{
                    foreach($tasks as $task){
                ?>
                <!--
               
                    --->
            <?php ?>
               <tr data-bs-toggle="modal" onclick="getId(<?php echo $task['taskId']; ?>)" data-bs-target="#loadLeadGenModal" style = "cursor:pointer">
                    <td>
                        <?php echo $task["tasks"]; ?>
                    </td>
                </tr>
              
            <?php       
                        
                    }
               
                } 
               
               ?>
            </table>
            
        </div>
    </div>
    

</section>


<!-- Modal -->
<div class="modal fade" id="loadLeadGenModal" tabindex="-1" aria-labelledby="loadLeadGenLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loadLeadGenLabel">Add Lead Generation - Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <section>
            <div class="container">
            <div class ="row">
                <?php var_dump($client); ?>
                <div id="response"></div>
                <form action="" method="post" class="row g-3">
                    <div class="col-md-6">
                        <label for="inputDate" class="form-label">Date</label>
                        <input type="text" name="date" class="form-control" id="inputDate" placeholder = "yyyy-MM-dd">
                    </div>
                    <div class="col-md-6">
                        <label for="inputConnectionRequest" class="form-label">Connection Request</label>
                        <input type="text" name="connectionRequest" class="form-control" id="inputConnectionRequest">
                    </div>
                    <div class="col-12">
                        <label for="inputTotalLinkedInConnections" class="form-label">Total LinkedIn Connections</label>
                        <input type="text" name="totalLinkedInConnections" class="form-control" id="inputTotalLinkedInConnections" placeholder="LinkedIn Connections">
                    </div>
                    <div class="col-12">
                        <label for="inputClicks" class="form-label">Clicks</label>
                        <input type="text" name="clicks" class="form-control" id="inputClicks" placeholder="">
                        <input type="hidden" name="getTaskId" class="form-control" id="getTaskId" value="<?php echo 4;?>">
                        <input type="hidden" name="getClientId" class="form-control" id="getClientId" value="<?php echo 5;?>">
                    </div>
                    <div class="col-12">
                        <button type="button" onclick="saveLeadGenDetails()" class="btn btn-primary">Submit</button>                         
                    </div>
                    </form> 
                                                             
                </div>      
            </div>            
        </section>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    $('table tr').each(function (a, b) {
        $(b).click(function () {
            $('table tr').css('background', '#ffffff');
            $(this).css('background', 'lightgray');
        });
    });


    var id = 0;
    function getId(id){
        $('#loadLeadGenModal').modal('show'); 
        console.log( id );      

    }
    /**/ 
    var getClientId = 0;
    function saveLeadGenDetails(){ 
        getClientId = id;

        //$('#getTaskId').text(getClientId);

        var url = "<?php echo base_url() . "/agents/InserLeadGenDetails" ;?>";
        $.ajax({
            url: url,
            data: $('form').serialize(),
            type: "POST",
            success: function () {
                $('#response').html('<div class="alert alert-success" role="alert">Added SuccessFully!!!</div>'); 
                setTimeout(function(){  
                    $('#response').fadeOut("slow"),
                    window.location.reload();  
                }, 2500);  
            },
            error: function (xhr, statusText, ex) {
                //error code here...
            }
        }); 

        console.log(getClientId);

    } 
    


</script>