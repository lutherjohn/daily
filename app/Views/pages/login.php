<div class="login-logo">
    <b>Daily Activity System</b>LTE
  </div>
  <div class="card">
    <div class="card-body login-card-body">
            <?php
            // Display Response 
            if(session()->has('message')){
            ?>
            <div class="alert <?= session()->getFlashdata('alert-class') ?>">
                <?= session()->getFlashdata('message') ?>
            </div>
            <?php
            }

            ?>
            <p class="login-box-msg">Sign in to start your session</p>
            <form class= "" action="/pages/loginValidation" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="email" id="email" value="<?php set_value('accountEmail'); ?>" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                    </div>
                </div>
                </div>

                <br>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                        <input type="checkbox" id="remember">
                        <label for="remember">
                            Remember Me
                        </label>
                        </div>
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary"> Log In</button>
                    </div>
                </div>            
            </form>
    </div>
</div>
