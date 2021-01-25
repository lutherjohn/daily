
<section>
    <div class="container">
    <div class ="row">
    <div class="col">
        <div class="p-3 bg-light"><h2>Update Agent Details</h2></div>
    </div>
            <?php echo form_open ('agents/updateAgents'); ?>
                <div class="col-md-4">                
                    <label for="inputLastname" class="form-label">Lastname</label>
                    <input type="text" name="updateLastname" class="form-control" id="inputLastname" value="<?php echo $users['userLastname']; ?>">
                </div>
                <div class="col-md-4">
                    <label for="inputFirstname" class="form-label">Firstname</label>
                    <input type="text" name="updateFirstname" class="form-control" id="inputFirstname" value="<?php echo $users['userFirstname']; ?>">
                </div>
                <div class="col-md-4">
                    <label for="inputMiddlename" class="form-label">Middlename</label>
                    <input type="text" name="updateMiddlename" class="form-control" id="inputMiddlename" value="<?php echo $users['userMiddlename']; ?>">
                </div>
                <div class="col-3">
                    <label for="inputemail" class="form-label">Email Address</label>
                    <input type="text" name="updateEmail" class="form-control" id="inputemail" value="<?php echo $users['userEmailAddress']; ?>">
                </div>
                <div class="col-12">
                    <input type="hidden" name="updateUserId" class="form-control" id="inputupdateUserId" value="<?php echo $users['userId']; ?>">
                    <button type="submit" class="btn btn-info" name="submit">Update Details</button>
                </div>
            <?php echo form_close(); ?>                                       
        </div>      
    </div>            
</section>