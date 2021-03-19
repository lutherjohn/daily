<div class="mt-4"></div>
<div class="container">
    <div class="main-body">  
      <div class="row gutters-sm">
        <div id="successMessage"></div>
        <div id="NotMatchMessage"></div>
        <div id="NewPassMessage"></div>
        <div id="ConfirmPassMessage"></div>
      </div>   
          <div class="row gutters-sm">            
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                <form action="" method="post" accept-charset="utf-8">
                <div class="row">   
                  <div class="row">       
                    <div class="col-sm-3">
                      <h6 class="mb-0">New Password</h6>
                    </div>
                    <div class="col-sm-9">
                        <input type="password" name="newPassword" id="newPassword">
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Confirm Password</h6>
                    </div>
                    <div class="col-sm-9">
                        <input type="password" name="confirmPassword" id="confirmPassword">
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0"></h6>
                    </div>
                    <div class="col-sm-9">
                      <button type="button" class="btn btn-primary" onclick="onSubmit()">Update</button>
                      <button type="button" onclick="redirectTo()" class="btn btn-warning">Cancel</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>              
            </div>
          </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">


    function redirectTo(){

        var url = "<?php echo base_url('clients/clientProfile'); ?>";
        
        window.location.href=url;
    }

    const Seturl = '<?php echo base_url() .'/clients/updatePasswordsforClient/'.$userPasswords['accountId']; ?>';

    function onSubmit(){

      var newPassword = document.getElementById('newPassword').value;
      var confirmPassword = document.getElementById('confirmPassword').value;

      if(newPassword == "" || newPassword == null){

        /* */
        $("#NewPassMessage").append("<div class='alert alert-danger' role='alert'>New Password Field is Empty!!!</div>");
        setTimeout(() => {
            $("#NewPassMessage").empty();            
        }, 2000); 


      }
      else if(confirmPassword == "" || confirmPassword == null){

        $("#ConfirmPassMessage").append("<div class='alert alert-danger' role='alert'>Confirm Password Field is Empty!!!</div>");
        setTimeout(() => {
            $("#ConfirmPassMessage").empty();            
        }, 2000);

      }
      else if(newPassword != confirmPassword){

        $("#NotMatchMessage").append("<div class='alert alert-warning' role='alert'>Password Not Match!!!</div>");
        setTimeout(() => {
            $("#NotMatchMessage").empty();            
        }, 2000);

      }else{

          $.ajax({
              url: Seturl,
              method: "POST",           
              data: {"newPassword":newPassword},
              success: function () {

                $("#successMessage").append("<div class='alert alert-success' role='alert'>Password Successfully Updated</div>");
                setTimeout(() => {
                    $("#successMessage").empty();            
                }, 2000); 

              },
              error: function (xhr, statusText, ex) {

              }
          }); 
      }

    }

    
</script>