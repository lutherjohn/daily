<br />
<section class="content">
    <div class="container-fluid">
        <div class="container">

            <?php 
                echo "Welcome " .$user["clientsFirstname"] ." ". $user["clientsLastname"]; 
            ?>

        </div>
        <div class="row">
            <section class="col-lg-6">
                <div class="container">
                    <div class="col-sm-6">
                        <div class="row">           
                            <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                            <div class="card-header">Agents</div>
                            <div class="card-body">
                                <h5 class="card-title"></h5>
                                <p class="card-text">
                                    <!----count agents here php-->
                                    <?php echo $agents; ?>
                                </p>
                            </div>
                            </div>
                        </div> 
                    </div>      
                </div>           

            </section>

            <section class="col-lg-6">
                <div class="container">
                    <div class="col-sm-6">
                        <div class="row">           
                            <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
                            <div class="card-header">Clients</div>
                            <div class="card-body">
                                <h5 class="card-title"></h5>
                                <p class="card-text">
                                    <!----count clients here php-->
                                    <?php echo $clients; ?>
                                </p>
                            </div>
                            </div>
                        </div> 
                    </div>
                </div>           

            </section>
        
        </div>
    </div>
</section>




