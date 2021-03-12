<div class="container">
    <div class="main-body">
    <br>
    <div class="row gutters-sm">
      <div class="col-md-4 mb-3">
        <div class="card">
          <div class="card-body">
            <div class="d-flex flex-column align-items-center text-center">
              <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
              <div class="mt-3">
                <h4><?php echo $user; ?></h4>
                <p class="text-secondary mb-1"><?php echo $userProfiles["clientsBussinessName"]?></p>
                <p class="text-muted font-size-sm"><?php echo $userProfiles["clientsDateStarted"]?></p>
                <!-- <button class="btn btn-primary">Follow</button>
                <button class="btn btn-outline-primary">Message</button> -->
              </div>
            </div>
          </div>
        </div>              
      </div>
      <div class="col-md-8">
        <div class="card mb-3">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Full Name</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <?php echo $userProfiles["clientsFirstname"] ."  " . $userProfiles["clientsLastname"]; ?>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Email</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <?php echo $userProfiles["clientsEmailAddress"]?>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Business Name</h6>
              </div>
              <div class="col-sm-9 text-secondary">
              <?php echo $userProfiles["clientsBussinessName"]?>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Campaign Goals</h6>
              </div>
              <div class="col-sm-9 text-secondary">
              <?php echo $userProfiles["clientsCampaignGoals"]?>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Date Started</h6>
              </div>
              <div class="col-sm-9 text-secondary">
              <?php echo $userProfiles["clientsDateStarted"]?>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Joint Venture</h6>
              </div>
              <div class="col-sm-9 text-secondary">
              <?php echo $userProfiles["clientsJointVenture"]?>
              </div>
            </div>
          </div>
        </div>
          <div class="col-sm-6">
              <button class="btn btn-primary" onclick="redirectToChangePassword()">Change Password</button>
              <button class="btn btn-warning" onclick="redirectTo()" >Edit Profile</button>
          </div>
        </div>
      </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="loadChangePasswordModal" tabindex="-1" aria-labelledby="loadChangePasswordLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loadClientsLabel">Change Password</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <section>
            <div class="container">
            <div class ="row">
                <form action="" method="post" class="row g-3">                    
                    <div class="col-md-4">
                        <label for="inputcurrentPassword" class="form-label">Current Password</label>
                        <input type="text" name="currentPassword" class="form-control" id="inputcurrentPassword">
                    </div>
                    <div class="col-md-4">
                        <label for="inputnewPassword" class="form-label">New Password</label>
                        <input type="text" name="newPassword" class="form-control" id="inputnewPassword">
                    </div>
                    <div class="col-md-4">
                        <label for="inputretypePassword" class="form-label">Re-type Password</label>
                        <input type="text" name="retypePassword" class="form-control" id="inputretypePassword" placeholder="">
                    </div>
                    
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary" >Update Password</button>
                    </div>
                    </form>                                         
                </div>      
            </div>            
        </section>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">
//adminChangePassword
function redirectToChangePassword(){

  var url = '<?php echo base_url() .'/admin/adminChangePassword/' .$accounts['accountId']; ?>' ;

    window.location.href=url;

}

function redirectTo(){

    var url = '<?php echo base_url() .'/admin/editClients/' .$userProfiles['clientsId']; ?>' ;

    window.location.href=url;


}
</script>