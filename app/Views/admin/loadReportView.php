<br/>
<section> 
    <div class="container px-4">
        <div class="row gx-5">
            <div class="col">
                <div class="p-3"><h2><?php echo $title; ?></h2></div>
            </div>
        </div>    
        <br>
        <p class="note note-primary">
        <strong>
            Task Name: <?php echo $tasksName["tasks"];?>
        </strong> 
        </p>
        <table class="table">
            <tr>
                <th>Name</th>
                <th>Date</th>
                <th>Connection Request</th>
                <th>Total LinkedIn Connectiuons</th>
                <th>Clicks</th>
            </tr>

            

            <?php
                if($tasks == null){
            ?>
            <tr>
                <td colspan="5">No Data</td>
            </tr>
            <?php

                }else{
                    foreach($tasks as $task){
            ?>
             <tr>
                <td>
                <?php echo $task['agentFirstname']; ?> &nbsp; 
                <?php echo $task['agentMiddlename']; ?> &nbsp; 
                <?php echo $task['agentLastname']; ?> 	
                </td>
                <td><?php echo $task['date']; ?></td>
                <td><?php echo $task['connectionRequestSent']; ?></td>
                <td><?php echo $task['totalLinkedInConnections']; ?></td>
                <td><?php echo $task['clicks']; ?></td> 
                              
            </tr>
           
            <?php
                }
            }

            ?>
           

            <?php
               

            ?>

        </table> 

      
          
        
    </div>
</section>
