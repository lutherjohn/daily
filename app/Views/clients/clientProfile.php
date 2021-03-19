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




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">

function redirectToChangePassword(){

    //.$userProfiles['clientsEmailAddress']

    var Seturl = '<?php echo base_url() .'/clients/passwordChangeforClient/'.$accounts['accountId']; ?>';

    window.location.href= Seturl;

}

function redirectTo(){

    var url = '<?php echo base_url() .'/clients/editClients/' .$userProfiles['clientsId']; ?>' ;

    window.location.href=url;


}
</script>