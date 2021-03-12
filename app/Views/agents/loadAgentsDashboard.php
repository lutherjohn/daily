<section>
    <div class="container">
        <div class="row">
            <h1>
                <?php 
                    /* if($totalConnection == null){

                        $TotalConnectionRequestSent = "No Data";

                    }else{

                        foreach($totalConnection as $k){ $TotalConnectionRequestSent =  $k['totalConnection']; }
                    }
                    
                    if($totalLinkedInConnections == null){

                        $linkedinConnections = "No Data";

                    }else{

                        foreach($totalLinkedInConnections as $i){ $linkedinConnections =  $i['totalLinkedInConnections']; }
                    }
                    
                    if($totalclicks == null){

                        $clicks = "No Data";

                    }else{
                        
                        foreach($totalclicks as $click){ $clicks = $click['clicks']; }
                    } */
                    
                    
                ?>
            </h1>
        </div>
        <div class="row">
        <p class="note note-primary">
            <strong>
                Task: 
                <?php 
                    echo $LeadGen;
                    //var_dump($nameOfDay);
                ?>
            </strong>
        </p>
        <?php 
            /* 
            foreach($nameOfDay as $d){

                echo $d['date'];
            } 
            */
        ?>
        <br>
        <table class="table table-bordered">
            <thead>
                <th>Name</th>
                <th>Week</th>
                <th>Total Connection Request Sent</th>
                <th>Total LinkedIn Connections</th>
                <th>Clicks</th>
            </thead>
            <?php                 

            $NoData = "";
            if($sumOfAlls == null){

                echo $NoData = "No data to Show";
            }else{
                foreach($sumOfAlls as $sumOfAll){
            ?>
                <tr>
                    <td><?php echo $sumOfAll["clientsFirstname"] . " " .$sumOfAll["clientsLastname"];?></td>
                    <td><?php echo $sumOfAll["Weeks"];?></td>
                    <td><?php echo $sumOfAll["totalconnectionRequestSent"];?></td>
                    <td><?php echo $sumOfAll["totalLinkedInConnections"];?></td>
                    <td><?php echo $sumOfAll["totalClicks"];?></td>
                    
                
                </tr>
            <?php
                }
            }
            ?> 
        </table>
        </div>
    </div>
</section>