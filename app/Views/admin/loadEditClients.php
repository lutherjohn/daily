
<section>
    <div class="container">
        <div class ="row g-2">
            <div class="col">
                <div class="p-3">
                    <p class="note note-primary">        
                    <?php echo $title; ?> 
                    </p>        
                </div>
            </div>
            <form action="<?php echo base_url('admin/updateClients'); ?>" method="post">
            <div class="row">
                <div class="col-md-6"> 
                    <label for="inputLastname" class="form-label">Lastname</label>
                    <input type="text" name="updateLastname" class="form-control" id="inputLastname" value="<?php echo $clients['clientsLastname']; ?>">             
                    <label for="inputFirstname" class="form-label">Firstname</label>
                    <input type="text" name="updateFirstname" class="form-control" id="inputFirstname" value="<?php echo $clients['clientsFirstname']; ?>">
                </div>     

                <div class="col-md-6"> 
                        <label for="inputLastname" class="form-label">Business Name</label>
                        <input type="text" name="updateBussinessName" class="form-control" id="inputLastname" value="<?php echo $clients['clientsBussinessName']; ?>">             
                        <label for="inputFirstname" class="form-label">Campaign Goals</label>
                        <input type="text" name="updateCampaignGoals" class="form-control" id="inputFirstname" value="<?php echo $clients['clientsCampaignGoals']; ?>">
                    </div>              
                </div>
                <div class="col-md-6">
                    <label for="inputMiddlename" class="form-label">Middlename</label>
                    <input type="text" name="updateMiddlename" class="form-control" id="inputMiddlename" value="<?php echo $clients['clientsMiddlename']; ?>">
                    <label for="inputemail" class="form-label">Email Address</label>
                    <input type="text" name="updateEmail" class="form-control" id="inputemail" value="<?php echo $clients['clientsEmailAddress']; ?>">
                </div>
                <div class="col-md-6">
                    <label for="inputMiddlename" class="form-label">Joint Venture</label>
                    <input type="text" name="updateJointVenture" class="form-control" id="inputMiddlename" value="<?php echo $clients['clientsJointVenture']; ?>">
                </div>
                <br/>
                <div class="col-12">
                    <input type="hidden" name="updateClientId" class="form-control" id="inputupdateUserId" value="<?php echo $clients['clientsId']; ?>">
                    <button type="submit" class="btn btn-info" name="submit">Update Details</button>
                    <button type="button" onclick="redirectTo()" class="btn btn-warning">Cancel</button>
                </div>       
            </form>                                       
        </div>      
    </div>            
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">
    $( document ).ready(function() {
        
        
    });

    function redirectTo(){
        var url = "<?php echo base_url('admin/clientList'); ?>";
        window.location.href=url;
    }
    
</script>