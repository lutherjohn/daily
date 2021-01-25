
<section>
    <div class="container">
    <div class ="row">
    <div class="col">
        <div class="p-3 bg-light"><h2>Update Client Details</h2></div>
    </div>
            <?php echo form_open ('clients/updateClients'); ?>
                <div class="col-md-4">                
                    <label for="inputLastname" class="form-label">Lastname</label>
                    <input type="text" name="updateLastname" class="form-control" id="inputLastname" value="<?php echo $clients['clientsLastname']; ?>">
                </div>
                <div class="col-md-4">
                    <label for="inputFirstname" class="form-label">Firstname</label>
                    <input type="text" name="updateFirstname" class="form-control" id="inputFirstname" value="<?php echo $clients['clientsFirstname']; ?>">
                </div>
                <div class="col-md-4">
                    <label for="inputMiddlename" class="form-label">Middlename</label>
                    <input type="text" name="updateMiddlename" class="form-control" id="inputMiddlename" value="<?php echo $clients['clientsMiddlename']; ?>">
                </div>
                <div class="col-3">
                    <label for="inputemail" class="form-label">Email Address</label>
                    <input type="text" name="updateEmail" class="form-control" id="inputemail" value="<?php echo $clients['clientsEmailAddress']; ?>">
                </div>
                <div class="col-12">
                    <input type="hidden" name="updateClientId" class="form-control" id="inputupdateUserId" value="<?php echo $clients['clientsId']; ?>">
                    <button type="submit" class="btn btn-info" name="submit">Update Details</button>
                </div>
            <?php echo form_close(); ?>                                       
        </div>      
    </div>            
</section>