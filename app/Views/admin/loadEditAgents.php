<h1 class="h3 mb-3"><?php echo $title; ?></h1>

<div class="card">
    <div class="card-header">
        <h5 class="card-title">&nbsp;</h5>
        <h6 class="card-subtitle text-muted">&nbsp;</h6>
    </div>
    <div class="card-body">
        <?php echo form_open ('admin/updateAgents'); ?>
            <div class="row">
                <div class="col-md-6 text-center">
                    <div class="card bg-light py-2 py-md-3 border">
                        <div class="card-body">

                        <div class="form-group row">
                            <label for="inputLastname" class="col-form-label text-sm-right">Lastname</label>
                            <input type="text" name="updateLastname" class="form-control" id="inputLastname" value="<?php echo $users['agentLastname']; ?>">
						</div>

                        <div class="form-group row">

                            <label for="inputFirstname" class="form-label">Firstname</label>
                            <input type="text" name="updateFirstname" class="form-control" id="inputFirstname" value="<?php echo $users['agentFirstname']; ?>">

                        </div>

                        <div class="form-group row">

                            <label for="inputMiddlename" class="form-label">Middlename</label>
                            <input type="text" name="updateMiddlename" class="form-control" id="inputMiddlename" value="<?php echo $users['agentMiddlename']; ?>">

                        </div>

                        <div class="form-group row">

                            <label for="inputemail" class="form-label">Email Address</label>
                            <input type="text" name="updateEmail" class="form-control" id="inputemail" value="<?php echo $users['agentEmailAddress']; ?>">
                        </div>

                        <div class="form-group row">

                        
                        </div>                
                        

                        
                        
                        <div class="mt-4"></div>
                        <input type="hidden" name="updateUserId" class="form-control" id="inputupdateUserId" value="<?php echo $users['agentId']; ?>">
                        <button type="submit" class="btn btn-info" name="submit">Update Details</button>
                        <button type="button" onclick="redirectTo()" class="btn btn-warning">Cancel</button>    
                        </div>
                    </div>
                </div>
            </div> 
        <?php echo form_close(); ?>  
    </div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">

    function redirectTo(){
        var url = "<?php echo base_url('admin/agentList'); ?>";
        window.location.href=url;
    }
    
</script>