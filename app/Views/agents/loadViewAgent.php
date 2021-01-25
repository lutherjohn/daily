<br/>
<section> 
    <div class="container px-4">
        <div class="row gx-5">
            <div class="col">
                <div class="p-3"><h2>Lead Generation List</h2></div>
            </div>
        </div>    
        <br>
        <p class="note note-primary">
        <strong>Agent Name:</strong> 
        
        <table class="table">
            <tr>
                <th>Name</th>
                <th>Date</th>
                <th>Connection Request</th>
                <th>Total LinkedIn Connectiuons</th>
                <th>Clicks</th>
            </tr>

            <?php
                foreach($agents as $agent){

            ?>
            <tr>
                <td>
                <?php echo $agent['userFirstname']; ?> &nbsp; 
                <?php echo $agent['userMiddlename']; ?> &nbsp; 
                <?php echo $agent['userLastname']; ?> 	
                </td>
                <td><?php echo $agent['date']; ?></td>
                <td><?php echo $agent['connectionRequestSent']; ?></td>
                <td><?php echo $agent['totalLinkedInConnections']; ?></td>
                <td><?php echo $agent['clicks']; ?></td>

                
            </tr>

            <?php
                }

            ?>

        </table>
      
        
        

      
          
        </p>
    </div>
</section>
