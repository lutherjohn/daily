<br />
<section>
	<div class="container">
        <div class="row">
            <h5>
            <?php 
                echo "Welcome " .$user; 
            ?> 
            </h5>
        </div>
		<div class="row">
			<div class="col-sm-4">
				<div class="card text-white bg-info mb-3" style="max-width: 18rem;">
					<div class="card-header">Users</div>
					<div class="card-body">
						<h5 class="card-title"></h5>
						<p class="card-text">
							<!----count Users here php-->
							<?php echo $clients; ?>
						</p>
					</div>
				</div>
			</div> 

			<div class="col-sm-4">
				<div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
					<div class="card-header">Clients</div>
					<div class="card-body">
						<h5 class="card-title"></h5>
						<p class="card-text">
						<!----count clients here php-->
						<?php echo $countClients; ?>
						</p>
					</div>
				</div>
			</div>

            <div class="col-sm-4">
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




