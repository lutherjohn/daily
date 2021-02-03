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
<br/>
<section> 
    <div class="container px-4">
        <div class="row">
            <h1>Client Page</h1>            
        </div> 

        <div class="row">
            <div class="col-sm">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loadClientsModal">
                    <i class="fas fa-plus-circle"></i> Client 
                </button>
            </div>
            
        </div>
        <?php
        
            if($clients == null){
        ?>
            <p>No Data</p>

        <?php

            }else{
                
        ?>
            <table class="table">
                <tr>
                    <th scope="col">#</th>
                    <th>Lastname</th>
                    <th>Middlename</th>
                    <th>Firstname</th>
                    <th>Email Address</th>
                    <th colspan="2">Option</th>
                </tr>


                <?php 
                
                    foreach($clients as $client){
                    
                ?>
                <tr>
                    <td scope="row">
                        <?php echo $client['clientsId'];?>
                    </td>
                    <td><?php echo $client['clientsLastname'];?></td>
                    <td><?php echo $client['clientsMiddlename'];?></td>
                    <td><?php echo $client['clientsFirstname']; ?></td>
                    <td><?php echo $client['clientsEmailAddress'];?></td>
                    <td> 
                        <a href= "<?php echo "editClients/" .$client['clientsId']; ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Client" > 
                            <i class="fas fa-user-edit"></i>
                        </a>
                    </td>
                    <!-- <td>
                        <a href="#">
                            <i class="fas fa-user-times"></i>
                        </a>                        
                    </td> -->
                </tr>

                <?php
                    }
                ?>


            </table>


        <?php
            }
        ?>  
    </div>
</section>






<!-- Modal -->
<div class="modal fade" id="loadClientsModal" tabindex="-1" aria-labelledby="loadClientsLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loadClientsLabel">Add Client</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <section>
            <div class="container">
            <div class ="row">
                <form action="crudClients" method="post" class="row g-3">
                    
                    <div class="col-md-4">
                        <label for="inputFirstname" class="form-label">Firstname</label>
                        <input type="text" name="firstname" class="form-control" id="inputFirstname">
                    </div>
                    <div class="col-md-4">
                        <label for="inputMiddlename" class="form-label">Middlename</label>
                        <input type="text" name="middlename" class="form-control" id="inputMiddlename" placeholder="">
                    </div>
                    <div class="col-md-4">
                        <label for="inputLastname" class="form-label">Lastname</label>
                        <input type="text" name="lastname" class="form-control" id="inputLastname">
                    </div>
                    <div class="col-md-6">
                        <label for="inputbusinessName" class="form-label">Business Name</label>
                        <input type="text" name="businessName" class="form-control" id="inputbusinessName">
                    </div>
                    <div class="col-md-6">
                        <label for="inputcampaignGoal" class="form-label">Campaign Goal</label>
                        <input type="text" name="campaignGoal" class="form-control" id="inputcampaignGoal">
                    </div>
                    <div class="col-md-6">
                        <label for="inputJointventure" class="form-label">Joint Venture</label>
                        <input type="text" name="jointVenture" class="form-control" id="inputjointVenture" placeholder="">
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
                        <label for="inputaccessLevels" class="form-label">Access Levels</label>
                        <br>
                        <select name="userRules" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                            <option value="#"> Choose User Levels</option>
                            <?php foreach($accessLevels as $accessLevel): ?>

                                <option value="<?php echo $accessLevel['accesslevelsId']; ?>"><?php echo $accessLevel['accessLevels']; ?></option>


                            <?php endforeach;?>

                        </select>
                        
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
        $('#loadClientsModal').modal({ backdrop: 'static' , keyboard: false });
    });
    
</script>