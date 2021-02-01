<?php
// Display Response 
if(session()->has('message')){
?>
   <div class="alert <?= session()->getFlashdata('alert-class') ?>">
      <?= session()->getFlashdata('message') ?>
   </div>
<?php
}

?>
<br />
<section>
    <div class="container">
        <div class="row">
            <h1>Agent Page</h1>            
        </div>        
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loadAgentModal">
                    <i class="fas fa-plus-circle"></i> Agent
                </button>
            </div>
            
        </div>

        <div class="row">
            <div class="col-sm">
                <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email Address</th>
                        <th scope="col" colspan="4">Option</th>
                    </tr>
                </thead>
                <tbody>
                    
                        <?php
                            if($agents){
                                foreach($agents as $agent){
                        ?>
                        <tr>
                            <th scope="row">
                                <?php echo $agent['userId']; ?>
                            </th>
                            <td><?php echo $agent['userFirstname'] ." " .$agent['userMiddlename'] . " " . $agent['userLastname']; ?></td>
                            <td><?php echo $agent['userEmailAddress']; ?></td>
                            <td>
                                <a href= "<?php echo "editAgents/" .$agent['userId']; ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Agent" >
                                    <i class="fas fa-user-edit"></i>
                                </a>  
                            </td>
                           <!--  <td>
                                <a href= "<?php //echo "deleteAgents/" .$agent['userId']; ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Agent">
                                    <i class="fas fa-user-times"></i>
                                </a>                                
                            </td> -->
                            <td>
                                <a href= "<?php echo "clientAgentsData/" .$agent['userId']; ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Add Client to Agent">
                                <i class="fas fa-user-friends"></i>
                                </a>                                
                            </td>
                            <td>
                                <a href="<?php echo "getAssignClientsToAgents/" .$agent['userId']; ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="View Agent Details">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                        <?php

                                }
                            }
                        ?>
                        
                    
                </tbody>
                </table>
            </div>
            
        </div> 
        <div class="col-md-6">
            <div id="ph_AssignClientsModal" data-bs-toggle="modal" data-bs-target="#loadAssignAgentModal"></div>
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
                <form action="crudAgents" method="post" class="row g-3">
                    <div class="col-md-4">
                        <label for="inputLastname" class="form-label">Lastname</label>
                        <input type="text" name="lastname" class="form-control" id="inputLastname">
                    </div>
                    <div class="col-md-4">
                        <label for="inputFirstname" class="form-label">Firstname</label>
                        <input type="text" name="firstname" class="form-control" id="inputFirstname">
                    </div>
                    <div class="col-md-4">
                        <label for="inputMiddlename" class="form-label">Middlename</label>
                        <input type="text" name="middlename" class="form-control" id="inputMiddlename" placeholder="">
                    </div>
                    <div class="col-6">
                        <label for="inputemail" class="form-label">Email Address</label>
                        <input type="text" name="email" class="form-control" id="inputemail" placeholder="">
                    </div>
                    <div class="col-6">
                        <label for="inputpassword" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="inputpassword" placeholder="">
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
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

    $( document ).ready(function() {
        $('#loadAgentModal').modal({ backdrop: 'static' , keyboard: false });
    });

   /*  function LoadAssignClients(aId){
        $("#ph_AssignClientsModal").load(<?php echo base_url('agents/clientAgentsData/'); ?> + aId);

    } */
    
</script>