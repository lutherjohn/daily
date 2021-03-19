
<div class="row mb-2 mb-xl-3">
    <div class="col-auto d-none d-sm-block">
        <h3><strong>Analytics</strong> Dashboard</h3>
    </div>

    <div class="col-auto ml-auto text-right mt-n1">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
                <li class="breadcrumb-item"><a href="#">Admin-DAS</a></li>
                <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
                <li class="breadcrumb-item active" aria-current="page">Analytics</li>
            </ol>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-xl-6 col-xxl-5 d-flex">
        <div class="w-100">
            <div class="row">           
            
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-4">Users</h5>
                            <h1 class="display-5 mt-1 mb-3">
                                <?php echo $clients; ?>
                            </h1>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-4">Clients</h5>
                            <h1 class="display-5 mt-1 mb-3">
                                <?php echo $countClients; ?>
                            </h1>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-4">Agents</h5>
                            <h1 class="display-5 mt-1 mb-3">
                                <?php echo $agents; ?>
                            </h1>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-4">Benchmark</h5>
                            <h1 class="display-5 mt-1 mb-3">64</h1>
                        </div>
                    </div>
                </div> 

                

            </div>

            <div class="mt-6"></div>
            

        </div>
    </div>

    <div class="col-xl-6 col-xxl-7">
        <div class="card flex-fill w-100">
            <div class="card-header">
                <h5 class="card-title mb-0">Recent Movement</h5>
            </div>
            <div class="card-body py-3">
                <table class="table table-hover my-0">
                    <thead>
                        <tr>                            
                            <th>Name</th>
                            <th>Connection Request</th>
                            <th>New Connection Added</th>
                            <th>Link Clicks</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    <?php                 

                    $NoData = "";
                    if($sumOfAlls == null){

                    ?>
                    <tr>

                        <td colspan="4"><?php echo $NoData = "No data to Show"; ?></td>

                    </tr>                       

                    <?php
                    }else{
                        foreach($sumOfAlls as $sumOfAll){
                    ?>
                        <tr>
                            <td><?php echo $sumOfAll["clientsFirstname"] . " " .$sumOfAll["clientsLastname"];?></td>
                            <td><?php echo $sumOfAll["totalconnectionRequestSent"];?></td>
                            <td><?php echo $sumOfAll["totalLinkedInConnections"];?></td>
                            <td><?php echo $sumOfAll["totalClicks"];?></td>
                            
                        
                        </tr>
                    <?php
                        }
                    }
                    ?> 
                    </tbody>

                </table>
            </div>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-12 d-flex">
        <div class="card flex-fill">
            <div class="card-header">
                <h5 class="card-title mb-0">List of Totals Per Weeks</h5>
            </div>
            <table class="table table-hover my-0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th class="d-none d-xl-table-cell">Weeks</th>
                        <th class="d-none d-xl-table-cell">Date</th>
                        <th>Connection Requests</th>
                        <th class="d-none d-md-table-cell">LinkedIn connections</th>
                        <th>Link Clicks</th>
                    </tr>
                </thead>
                <tbody>

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
                   
                </tbody>
            </table>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-12 d-flex">
        <div class="card flex-fill">
            <div class="card-header">
                <h5 class="card-title mb-0">Filter By Dates: - Daily Activity</h5>
            </div>

            <div class="card-body mb-0">

                <div class="row ">

                    <div class="col-sm-3">
                        <label for="lblDateRange">Choose: Start Date</label>
                        <input type="text" name="date1" id="date1" width="120" />                
                    </div> 
                    <div class="col-sm-3">
                        <label for="lblDateRange">Choose: End Date</label>
                        <input type="text" name="date2"  id="date2" width="120" />
                    </div>

                    <div class="col-sm-4">
                        <input type="button" id="submit" name="submit" width="100" class="btn btn-primary" value="Search" onclick="searchByDate()"/>
                    </div>  

                </div> 

                <div class="mt-5"></div>           


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
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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