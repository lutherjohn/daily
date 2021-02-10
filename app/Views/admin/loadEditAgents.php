
<section>
    <div class="container">
        <div class ="row">
            <div class="col">
                <div class="p-3">
                    <p class="note note-primary">        
                    <?php echo $title; ?> 
                    </p> 
                </div>
            </div>
            <?php echo form_open ('admin/updateAgents'); ?>
                <div class="col-md-3">                
                    <label for="inputLastname" class="form-label">Lastname</label>
                    <input type="text" name="updateLastname" class="form-control" id="inputLastname" value="<?php echo $users['agentLastname']; ?>">
                </div>
                <div class="col-md-3">
                    <label for="inputFirstname" class="form-label">Firstname</label>
                    <input type="text" name="updateFirstname" class="form-control" id="inputFirstname" value="<?php echo $users['agentFirstname']; ?>">
                </div>
                <div class="col-md-3">
                    <label for="inputMiddlename" class="form-label">Middlename</label>
                    <input type="text" name="updateMiddlename" class="form-control" id="inputMiddlename" value="<?php echo $users['agentMiddlename']; ?>">
                </div>
                <div class="col-3">
                    <label for="inputemail" class="form-label">Email Address</label>
                    <input type="text" name="updateEmail" class="form-control" id="inputemail" value="<?php echo $users['agentEmailAddress']; ?>">
                </div>
                <br/>
                <div class="col-12">
                    <input type="hidden" name="updateUserId" class="form-control" id="inputupdateUserId" value="<?php echo $users['agentId']; ?>">
                    <button type="submit" class="btn btn-info" name="submit">Update Details</button>
                    <button type="button" onclick="redirectTo()" class="btn btn-warning">Cancel</button>
                </div>
            <?php echo form_close(); ?>                                       
        </div>      
    </div>            
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">
    $( document ).ready(function() {
        
        
    });

    function redirectTo(){
        var url = "<?php echo base_url('admin/agentList'); ?>";
        window.location.href=url;
    }
    
</script>