<section>
    <div class="container">
        <div class="row">
            <h1>
                Welcome: &nbsp; 
                <?php 
                    echo $agent; 
                    foreach($totalConnection as $k){ $TotalConnectionRequestSent =  $k['totalConnection']; }
                    foreach($totalLinkedInConnections as $i){ $linkedinConnections =  $i['totalLinkedInConnections']; }
                    foreach($totalclicks as $click){ $clicks =  $click['clicks']; }
                ?>
            </h1>
        </div>
        <div class="row">
        <p class="note note-primary">
            <strong>
                Task: 
                <?php 
                    echo "Lead Generator Daily Activity";
                    //var_dump($leadGens);
                ?>
            </strong>
        </p>
        <br>
        <table class="table table-bordered">
            <thead>
                <th>Date</th>
                <th>Total Connection Request Sent</th>
                <th>Total LinkedIn Connections</th>
                <th>Clicks</th>
            </thead>
            <?php
            
                foreach($tasks as $task){
            ?>
            <tr>
                <td><?php echo $task['date'];?></td>
                <td><?php echo $task['connectionRequestSent'];?></td>
                <td><?php echo $task['totalLinkedInConnections'];?></td>
                <td><?php echo $task['clicks'];?></td>
            </tr>
            <?php

                }
            ?>
            
            <tr>
                <td>
                
                </td>
                <td>
                    <?php echo $TotalConnectionRequestSent; ?>
                </td>
                <td>
                    <?php echo $linkedinConnections; ?>
                </td>
                <td>
                    <?php echo $clicks; ?>
                </td>
            </tr>
        </table>
        </div>
    </div>
</section>