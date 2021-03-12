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
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Connection Request Sent
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php echo $TotalConnectionRequestSent; ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-compress fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            New Connections Added
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php echo $linkedinConnections; ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-address-card fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Clicks
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php echo $clicks; ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">List of Totals Per Weeks</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                            aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Download as:</div>
                            <a class="dropdown-item" href="#">Excel</a>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
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
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="col-lg-12 mb-4">

            <!-- Illustrations -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Search By Dates:</h6>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                            src="<?php echo base_url() .'assets/img/undraw_posting_photo.svg'; ?>" alt="">
                    </div>
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
                    <div class="mt-3"></div>
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
            </div>
        </div>
    </div>

</div>

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