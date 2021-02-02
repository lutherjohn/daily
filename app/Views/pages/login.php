<div class="container">
    <div class="row">
        <div class="col-12 col-sm8- offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white from-wrapper">
            <div class="container">
            <h3>Log In - <?php echo $title; ?></h3>
            <hr>
            <?php if (session()->get('success')):?>
                <div class="alert alert-success" role="alert">
                    <?php session()->get('success'); ?>
                </div>
            <?php endif; ?>
            <form class= "" action="/pages/loginValidation" method="post">
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="text" class="form-control" name="email" id="email" value="<?php set_value('clientsEmailAddress'); ?>">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" value="">
                </div>
                <?php if(isset($validation)):?>
                    <div class="col-12">
                        <div class="alert alert-danger" role="alert">
                            <?php $validation->listErrors();  ?>
                        </div>
                    </div>                    
                <?php endif; ?>
                <br>
                <div class="row">
                    <div class="col-12 col-md-4">
                        <button type="submit" class="btn btn-primary"> Log In</button>
                    </div>
                </div>
            
            </form>
            </div>
        </div>
    </div>
</div>