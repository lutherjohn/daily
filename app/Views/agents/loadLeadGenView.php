<div class="mt-4"></div>

<section>
    <div class="container">
        <div class="row">
            <h1><?php echo $title; ?></h1>
        </div>


            <p class="note note-primary">
                <label for="client">Agent Name:</label>
                <?php 
                    echo $agentName['agentFirstname'] ." ". $agentName['agentLastname']; 
                ?>

                &nbsp;

                <label for="client">Client Name:</label>
                <?php 
                    echo $client['clientsFirstname'] ." ". $client['clientsLastname']; 
                ?>
            </p>
            <?php echo form_open(); ?> 
            <input type="hidden" name="getClientId" id="getClientId" value ="<?php echo $client['clientsId'];?>">
            <input type="hidden" name="getAgentId" id="getAgentId" value ="<?php echo $agentName['agentId'] ;?>">
            <table class="table">
                <thead>            
                    <th>Tasks</th>
                    <th>Option</th>                  
                </thead>

                <?php if($tasks == null){ ?>
                <tr>            
                    <td>No Data</td>
                    <td>Option</td>                  
                </tr>
               <?php 
                    }else{
                    foreach($tasks as $task){
                ?>
               <tr style = "cursor:pointer">
                    <td>
                        <?php echo $task["tasks"]; ?>
                        
                    </td>
                    <td>                 
                        <button type="button" onclick="saveLeadGenDetails(<?php echo $task['taskId'] ;?>)" class="btn btn-primary"> Select </button>
                    </td>
                </tr>
              
            <?php       
                        
                    }
               
                } 
               
               ?>
            </table>
            <?php echo form_close(); ?>
  
    </div>
    

</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
      /**/ 

    function saveLeadGenDetails(getTaskId){ 

        var url = "<?php echo base_url() . "/agents/InsertTaskById/" ;?>" + getTaskId;
        var relocate = "<?php echo base_url(). '/agents/getLeadGenByTasksId/'; ?>" + getTaskId;
        $.ajax({
            url: url,
            data: $('form').serialize(),
            type: "POST",
            success: function () {

                window.location.href= relocate;

            },
            error: function (xhr, statusText, ex) {
                //var responseModel = JSON.parse(xhr.responseText);
                //alert(responseModel.StatusText);
            }
        }); 
    } 

    
    
</script>