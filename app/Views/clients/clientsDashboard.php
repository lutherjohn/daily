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
                     
                    foreach($totalConnection as $k){ $TotalConnectionRequestSent =  $k['totalConnection']; }
                    foreach($totalLinkedInConnections as $i){ $linkedinConnections =  $i['totalLinkedInConnections']; }
                    foreach($totalclicks as $click){ $clicks =  $click['clicks']; }
                ?>
            </p>
        </div>
        <div class="row">
            <div class="col-sm">
                <label for="lblDateRange">Choose: Date Range</label>
                <input type="text" name="daterange" value="01/01/2021 - 01/15/2018" />

            </div>            
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
        <div class="row">
            <div class="col-sm-12">
                <p>Daily Activity</p>
                <table class="table">
                    <thead>
                        <th>Date</th>
                        <th>Connection Request Sent</th>
                        <th>LinkedIn Connection Request</th>
                        <th>Clicks</th>
                    </thead>
                    <?php 
                        if($leadGens == null){

                    ?>
                    <tr>
                            <td colspan="4">No data</td>
                    </tr>

                    <?php
                        }else{
                            foreach($leadGens as $leadGen){
                    ?>
                    <tr>
                        <td><?php echo $leadGen["date"]; ?></td>
                        <td><?php echo $leadGen["connectionRequestSent"]; ?></td>
                        <td><?php echo $leadGen["totalLinkedInConnections"]; ?></td>
                        <td><?php echo $leadGen["clicks"]; ?></td>
                    </tr>
                    <?php
                            }
                        }
                    ?>
                    
                </table>
            </div>
        </div>   
    </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
$(function() {
  $('input[name="daterange"]').daterangepicker({

    opens: 'left'

  }, function(start, end, label) {

    console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));

  });
});
</script>