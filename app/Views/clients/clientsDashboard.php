<br/>
<section>
    <div class="container">
        <div class="row">
            <br />
            <h5>
                <?php echo "Welcome Client: " . $user; ?>
            </h5>
            <p>
                <?php 
                     
                    if($totalConnection === null){
                        $TotalConnectionRequestSent = "No Data to show";
                    }else{
                        foreach($totalConnection as $k){ $TotalConnectionRequestSent =  $k['totalConnection']; }
                    }
                    if($totalLinkedInConnections == null){
                        $linkedinConnections = "No Data to show";

                    }else{
                        foreach($totalLinkedInConnections as $i){ $linkedinConnections =  $i['totalLinkedInConnections']; }
                    }
                    if($totalclicks == null){
                        $clicks = "No Data to show";
                    }else{
                        foreach($totalclicks as $click){ $clicks =  $click['clicks']; }
                    }
                    
                ?>
                <?php 
                
                //var_dump($kpis);
                ?>
            </p>
        </div>
        
        <br/>
        <div class="row">
            <div class="col-sm-4">
                <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
                    <div class="card-header">Total Connection Sent</div>
                    <div class="card-body">
                        <h5 class="card-title">&nbsp;</h5>
                        <p class="card-text">
                            <?php echo $TotalConnectionRequestSent; ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                    <div class="card-header">Total LinkedIn connections</div>
                    <div class="card-body">
                        <h5 class="card-title">&nbsp;</h5>
                        <p class="card-text">

                            <?php echo $linkedinConnections; ?>
                           
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                    <div class="card-header">Clicks</div>
                    <div class="card-body">
                        <h5 class="card-title">&nbsp;</h5>
                        <p class="card-text">
                            <?php echo $clicks; ?>
                        </p>
                    </div>
                </div>
            </div>
        </div> 

        <br/>
        <!-- 
            <div class="row">
            <div class="col-sm-4">
                <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                    <div class="card-header">Connection Requests</div>
                    <div class="card-body">
                        <h5 class="card-title">&nbsp;</h5>
                        <p class="card-text">

                            <div id="connectionRequest">                            
                                
                            </div>
                            
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
                    <div class="card-header"> New LinkedIn connections Added</div>
                    <div class="card-body">
                        <h5 class="card-title">&nbsp;</h5>
                        <p class="card-text">

                            <div id="linkedInConnections">                            
                                
                            </div>
                           
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                    <div class="card-header">Link Clicks</div>
                    <div class="card-body">
                        <h5 class="card-title">&nbsp;</h5>
                        <p class="card-text">
                            
                            <div id="linkClicks">                            
                                
                            </div>

                        </p>
                    </div>
                </div>
            </div>
        </div>  
        -->
        <hr>
        <div class="row">
        <caption>List of Totals Per Weeks</caption>
            <table class="table">
            
                <thead class="table-dark">
                    <th>Weeks</th>
                    <th>Date</th>
                    <th>Connection Requests</th>
                    <th>LinkedIn connections</th>
                    <th>Link Clicks</th>
                </thead>
                
                <?php 
                foreach($kpis as $kpi){

                ?>
                <tr>
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
        <hr>
        <div class="row">
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
            url: "<?php echo base_url("clients/searchtaskByDate");?>",
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
</script>