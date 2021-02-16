<section>
    <div class="container">
        <div class="row">
            <h1><?php echo $title; ?></h1>
        </div>
        <div class="row">
       <p>
            <?php echo $agent["agentLastname"] . " , " . $agent["agentFirstname"]; ?>
       </p>
        <br>
        <table class="table table-bordered">
            <tr>
                <td>Date</td>
                <td>Connection Request</td>
                <td>Total LinkedIn Connections</td>
                <td>Clicks</td>
            </tr>
            <?php
                if($users == null){
            ?>
            <tr>
                <td colspan="4">No Data</td>
            </tr>
            <?php

                }else{
                    foreach($users as $user){
            ?>
                <tr>
                        <td><?php echo $user['date'];?></td>
                        <td><?php echo $user['connectionRequestSent'];?></td>
                        <td><?php echo $user['totalLinkedInConnections'];?></td>
                        <td><?php echo $user['clicks'];?></td>
                </tr>
            <?php
                    }

                }
            
            ?>
        </table>
        </div>
    </div>
</section>