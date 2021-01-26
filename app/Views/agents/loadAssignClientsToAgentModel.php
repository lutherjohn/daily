
<br>
<section class="container">
    <div class="row gx-5">
    
    <p class="note note-primary">
    <strong>Agent Name:</strong>
    <?php echo $users["userFirstname"] . " " . $users["userLastname"]; ?>
    </p>
  
    <table class="table">
    <tr>
        <th>Client/s Name</th>
    </tr>
            <?php 
                if($clients == null){

            ?>
            <tr>
                <td>No data</td>
            </tr>
            <?php
                }else{
                    foreach($clients as $client){

            ?>
            <tr>
                <td>
                    <?php 
                        echo $client['clientsFirstname'] ;
                    ?>
                    &nbsp;
                    <?php 
                        echo $client['clientsMiddlename'] ;
                    ?>
                    &nbsp;
                    <?php 
                        echo $client['clientsLastname'] ;
                    ?>
                    
                </td>      
            </tr>

            <?php
                    }
                }
            ?> 
        </table>
    </div>
</section>