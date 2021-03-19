<div class="mt-4"></div>

<div class="card">
    <div class="card-header">
        <h5 class="card-title"><?php echo $title; ?></h5>
        <h6 class="card-subtitle text-muted">&nbsp;</h6>
    </div>
    <div class="card-body">
        <form name="form" id="form">
            <div class="row">
                <div class="col-md-6 text-center">
                    <div class="card bg-light py-2 py-md-3 border">
                        <div class="card-body">

                        <div class="form-group row">
                            <label for="inputLastname" class="col-form-label text-sm-right">Lastname</label>
                            <input type="text" name="updateAgentLastname" class="form-control" id="inputLastname" value="<?php echo $users['agentLastname']; ?>">
						</div>

                        <div class="form-group row">

                            <label for="inputFirstname" class="form-label">Firstname</label>
                            <input type="text" name="updateAgentFirstname" class="form-control" id="inputFirstname" value="<?php echo $users['agentFirstname']; ?>">

                        </div>

                        <div class="form-group row">

                            <label for="inputMiddlename" class="form-label">Middlename</label>
                            <input type="text" name="updateAgentMiddlename" class="form-control" id="inputMiddlename" value="<?php echo $users['agentMiddlename']; ?>">
                        </div>

                        <div class="form-group row">
                            <label for="inputemail" class="form-label">Email Address</label>
                            <input type="text" name="updateAgentEmail" class="form-control" id="inputemail" value="<?php echo $users['agentEmailAddress']; ?>">
                        </div>
                        <div class="mt-4"></div>
                        <input type="hidden" name="updateAgentId" class="form-control" id="inputupdateUserId" value="<?php echo $users['agentId']; ?>">
                        <input type="hidden" name="updateAccountId" class="form-control" id="inputupdateAccountId" value="<?php //echo $accounts['accountId']; ?>">
                        <button type="button" class="btn btn-info" onclick="onSubmit()">Update Details</button>
                        <button type="button" onclick="redirectTo()" class="btn btn-warning">Cancel</button>    
                        </div>
                    </div>
                </div>
            </div> 
        </form>
        <div id="Message"></div>
    </div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">

    function redirectTo(){

        var url = "<?php echo base_url('agents/agentsProfile'); ?>";
        
        window.location.href=url;
    }
</script>

<script type="text/javascript">
   
    function onSubmit(){

        var Seturl = '<?php echo base_url() . '/agents/updateAgentDetails'?>';  
        $.ajax({
            url: Seturl,
            method: "POST",           
            data:$("#form").serialize(),
            success: function (data) {

                $("#Message").append("<div class='alert alert-success' role='alert'>Details Successfully Updated</div>");
                setTimeout(() => {
                    $("#Message").empty();            
                }, 2000); 

            },
            error: function (xhr, statusText, ex) {

                $("#Message").append("<div class='alert alert-warning' role='alert'>Details was not Successfully Updated</div>");
                setTimeout(() => {
                    $("#Message").empty();            
                }, 2000); 


            }
        });     

    }


</script>