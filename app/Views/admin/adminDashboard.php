<br />
<section>
	<div class="container">
        <div class="row">
            <h5>
            <?php 
                echo "Welcome " .$user; 

				$NoData = "";
				if($sumOfAlls == null){

					echo $NoData = "No data to Show";
				}else{
					foreach($sumOfAlls as $sumOfAll){

						$totalconnectionRequestSent = $sumOfAll["totalconnectionRequestSent"];
						$totalLinkedInConnections = $sumOfAll["totalLinkedInConnections"];
						$totalClicks = $sumOfAll["totalClicks"];
					}
				}
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
        <br/>	
        <div class="row">
            <div class="col-sm-12">
                <span>Filter By Clients: &nbsp; </span>
                <select name="filterByClient" id="filterByClient" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" onchange="getSelectOption()">
                <option value="#">Select Client</option>
                <?php
                    foreach($clientsAdmin as $client){
                ?>
                    <option value="<?php echo $client["clientsId"];?>"><?php echo $client["clientsFirstname"] ." ". $client["clientsLastname"];?></option>
                <?php
                    }
                
                ?>                
                
                </select>

            
            </div>
        
        </div>
		<br/>
        <!-- --> 
        <?php ?>
            <div class="row">
            <div class="col-sm-4">
                <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                    <div class="card-header">Total Connection Requests</div>
                    <div class="card-body">
                        <h5 class="card-title">&nbsp;</h5>
                        <p class="card-text">
                            <div id="connectionRequest">                            
                                <?php 
                                    echo $totalconnectionRequestSent;
                                    //json_decode($arrayData, true);
                                    //echo $arrayData["Peter"];                               
                                ?>
                            </div>                            
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
                    <div class="card-header">Total LinkedIn connections</div>
                    <div class="card-body">
                        <h5 class="card-title">&nbsp;</h5>
                        <p class="card-text">

                            <div id="linkedInConnections">                            
                                <?php echo $totalLinkedInConnections; ?>
                            </div>
                           
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                    <div class="card-header">Total Link Clicks</div>
                    <div class="card-body">
                        <h5 class="card-title">&nbsp;</h5>
                        <p class="card-text">                            
                            <div id="linkClicks">                            
                                <?php echo $totalClicks; ?>
                            </div>
                        </p>
                    </div>
                </div>
            </div>
        </div>  
       
		<div class="row">

		</div>
		<div class="row">
		<caption>List of Totals Per Weeks</caption>
            <table class="table">
            
                <thead class="table-dark">
                    <th>Name</th>
					<th>Weeks</th>
					<th>Date</th>
                    <th>Connection Requests</th>
                    <th>LinkedIn connections</th>
                    <th>Link Clicks</th>
                </thead>
                
                <?php 
                
                foreach($kpis as $kpi){
				//clientsFirstname,clientsLastname
                ?>
                <tr>
					<td><?php echo $kpi['clientsFirstname'] ." , " . $kpi["clientsLastname"];?></td>
					<td><?php echo $kpi['Weeks'];?></td>
					<td><?php echo $kpi['date'];?></td>
                    <td><?php echo $kpi['conreq'];?></td>
                    <td><?php echo $kpi['linkedIn'];?></td>
					<td><?php echo $kpi['clickLinks'];?></td>
                </tr>
                <?php

                }
                
                ?>                
            </table>
		</div>	
		<br>
		<hr>
		
		<div class="row">
		<h5>Filter By Dates:</h5>
            <div class="col-sm-4">
                <label for="lblDateRange">Choose: Start Date</label>
                <input type="text" name="date1" id="date1" width="150" />                
            </div> 

            <div class="col-sm-4">
                <label for="lblDateRange">Choose: End Date</label>
                <input type="text" name="date2"  id="date2" width="150" />
            </div>

            <div class="col-sm-4">
                <input type="button" id="submit" name="submit" width="100" class="btn btn-primary" value="Search" onclick="searchByDate()"/>
            </div>             
        </div>  
        <br />
        <div class="row">
            <div class="col-sm-12">
                <p>Daily Activity</p>
                <table class="table" id="table">
                    <thead>
                        <th>#</th>
                        <th>Date</th>
                        <th>Connection Request Sent</th>
                        <th>LinkedIn Connection Request</th>
                        <th>Clicks</th>
                    </thead>
                    <tbody>

                    </tbody>                    
                </table>
            </div>
        </div>   
	</div> 
</section>
<script type="text/javascript">
    $('#date1').datepicker({
        format:"yyyy/mm/dd",
        autoclose:true,
        todayHighlight:true
    });

    $('#date2').datepicker({
        format:"yyyy/mm/dd",
        autoclose:true,
        todayHighlight:true
    });
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">

$("#date1").val("");
$("#date2").val("");

function searchByDate(){
    var x = 1;
    var startDate = $("#date1").val();
    var endDate = $("#date2").val();

    if(startDate ==="" && endDate === ""){        

        $("#table").append("<tr><td colspan='5'>No Start Date and End Date</td></tr>");
        setTimeout(() => {
            $("#table tbody").empty();            
        }, 1500);

    }    
    else{

        $.ajax({
            url: "<?php echo base_url("admin/searchtaskByDate");?>",
            method: "POST",           
            data: {"date1":startDate ,"date2":endDate},
            cache : false, 
            dataType:"json",
            success: function (data) {

                $.each(data,function(key,value){

                    $('#table').append("<tr><th>"+(x++)+"</th><td>"+value.date+"</td><td>"+value.connectionRequestSent+"</td><td>"+value.totalLinkedInConnections+"</td><td>"+value.clicks+"</td></tr>"); 

                });
            
                
            },
            error: function (xhr, statusText, ex) {

            }
        }); 

    }

    
}

function getSelectOption(){

    var optionValue = document.getElementById("filterByClient");
    var dataOutput = optionValue.value;

    document.getElementById(connectionRequest).innerHTML = "";
    //$("#connectionRequest").empty();   
    console.log(dataOutput);
}
</script>



