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
               <tr>
                    <td><?php echo $task["tasks"]; ?></td>
                    <td>
                        <button class="btn btn-primary" 
                                name="getId" id="<?php echo $task['taskId']; ?>" 
                                onclick="getTaskId(<?php echo $task['taskId']; ?>)"
                                style = "cursor:pointer"
                        >

                        </button>
                        
                    </td>

               <?php 
                    }
               
                } 
               
               ?>
            </table>
        </div>
    </div>
</section>


<!-- Modal -->
<div class="modal fade" id="loadAgentModal" tabindex="-1" aria-labelledby="loadAgentLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loadAgentLabel">Add Agent</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <section>
            <div class="container">
            <div class ="row">
                <div class="modal-content">
                </div>                          
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

    $( document ).ready(function() {

        /* $('#loadAgentModal').modal({ backdrop: 'static' , keyboard: false }); */


    });
    
    var id;
    function getTaskId(id){       
        $('#loadAgentModal').modal('show');
        //$("#" + $(this).attr("id") + " .modal-content").append(id);
        /* $('#loadAgentModal').on('show.bs.modal', function (e) {
            show: 'true'
        }); */

        console.log(id);

    } 
    $('#loadAgentModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('New message to ' + recipient)
        modal.find('.modal-body input').val(recipient)
    });
    
</script>