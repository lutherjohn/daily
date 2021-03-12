<h1 class="h3 mb-3"><?php echo $title; ?></h1>


<div class="card">
    <div class="card-header">
        <h5 class="card-title">&nbsp;</h5>
        <h6 class="card-subtitle text-muted">&nbsp;</h6>
    </div>
    <div class="card-body">
        <form action="<?php echo base_url('admin/updateClients'); ?>" method="post">
            <div class="row">
                <div class="col-md-6 text-center">
                    <div class="card bg-light py-2 py-md-3 border">
                        <div class="card-body">

                        <div class="form-group row">

                            <label for="inputLastname" class="form-label">Lastname</label>
                            <input type="text" name="updateLastname" class="form-control" id="inputLastname" value="<?php echo $clients['clientsLastname']; ?>">
                            
                        </div>

                        <div class="form-group row">
                            <label for="inputFirstname" class="form-label">Firstname</label>
                            <input type="text" name="updateFirstname" class="form-control" id="inputFirstname" value="<?php echo $clients['clientsFirstname']; ?>">

                        </div>

                        <div class="form-group row">

                            <label for="inputMiddlename" class="form-label">Middlename</label>
                            <input type="text" name="updateMiddlename" class="form-control" id="inputMiddlename" value="<?php echo $clients['clientsMiddlename']; ?>">

                        
                        </div>

                        <div class="form-group row">

                            <label for="inputemail" class="form-label">Email Address</label>
                            <input type="text" name="updateEmail" class="form-control" id="inputemail" value="<?php echo $clients['clientsEmailAddress']; ?>">

                        </div>                                  
                            
                            
                            

                        </div>
                    </div>
                </div>

                <div class="col-md-6 text-center">
                    <div class="card bg-light py-2 py-md-3 border">
                        <div class="card-body">

                            <div class="form-group row">
                                <label for="inputLastname" class="form-label">Business Name</label>
                                <input type="text" name="updateBussinessName" class="form-control" id="inputLastname" value="<?php echo $clients['clientsBussinessName']; ?>">             
                                
                            </div>

                            <div class="form-group row">

                                <label for="inputFirstname" class="form-label">Campaign Goals</label>
                                <input type="text" name="updateCampaignGoals" class="form-control" id="inputFirstname" value="<?php echo $clients['clientsCampaignGoals']; ?>">

                            </div>

                            <div class="form-group row">
                            
                                <label for="inputMiddlename" class="form-label">Joint Venture</label>
                                <input type="text" name="updateJointVenture" class="form-control" id="inputMiddlename" value="<?php echo $clients['clientsJointVenture']; ?>">
                                
                            </div>


                            <div class="mt-4 ml-7 ml-7">
                                <input type="hidden" name="updateClientId" class="form-control" id="inputupdateUserId" value="<?php echo $clients['clientsId']; ?>">
                                <input type="submit" class="btn btn-info" name="submit" value ="Update Details" />
                                <input type="button" class="btn btn-warning" value="Cancel" onclick="redirectTo()" />
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div> 
        </form>
    </div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">

    function redirectTo(){
        var url = "<?php echo base_url('admin/clientList'); ?>";
        window.location.href=url;
    }
    
</script>