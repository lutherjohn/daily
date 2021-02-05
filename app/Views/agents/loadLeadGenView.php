<section>
    <div class="container">
        <div class="row">
            <h1><?php echo $title; ?></h1>
        </div>
        <div class="row">
            <p>
                <?php 
                
                //echo ['clientsId']; 
                var_dump($clients);
                ?>
            </p>

            <table class="table">
                <?php if($tasks == null){?>
                <tr>            
                    <td>No Data</td>
                    <td>Option</td>                  
                </tr>
               <?php 
                    }else{
                    foreach($tasks as $task){
                ?>
                <!----->
            <?php?>
               <tr data-toggle="modal" href="<?php echo base_url('agents/getLeadGenModal/'.$task['taskId']); ?>"  data-target="#loadLeadGenModal" style = "cursor:pointer">
                    <td><?php echo $task["tasks"]; ?></td>
                    <td>
                        <button class="btn btn-primary" 
                                name="getId" id="<?php echo $task['taskId']; ?>" >
                                <i class="fas fa-plus-square"></i>
                        </button>
                        
                    </td>
                </tr>
                <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
                        <script type="text/javascript">
                           $(document).ready(function(){
                              $('body').on('hidden.bs.modal', '.modal', function () {
                                $(this).removeData('bs.modal');
                                $("#" + $(this).attr("id") + " .modal-content").empty();
                                $("#" + $(this).attr("id") + " .modal-content").append("Loading...");
                              });
                            });
                        </script>
            <?php       

                    }
               
                } 
               
               ?>
            </table>
        </div>
    </div>
</section>


<!-- Modal -->
<div class="modal fade" id="loadLeadGenModal" tabindex="-1" aria-labelledby="loadloadLeadGenModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loadLeadGenModalLabel">Add Lead Gen</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>





<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">

    $( document ).ready(function() {

        /* $('#loadAgentModal').modal({ backdrop: 'static' , keyboard: false }); */


    });
    
  /*   var id;
    function getTaskId(id){       
        $('#loadAgentModal').modal('show');

        $('<tr>').appendTo('.content');

        console.log(id);

    }  */

    
</script>