<br />
<section>
    <div class="container">
        <div class="row">
            <h1><?php echo $title; ?></h1>
        </div>
        <div class="row">

            <p>
                <?php 
                echo $client['clientsFirstname']; 
                //var_dump($client);
                ?>
            </p>

            <table class="table">
                <thead>            
                    <th>Tasks</th>
                    <th>Option</th>                  
                </thead>

                <?php if($tasks == null){ ?>
                <tr>            
                    <td>No Data</td>
                    <td>Option</td>                  
                </tr>
               <?php 
                    }else{
                    foreach($tasks as $task){
                ?>
                <!--
               
                    --->
            <?php ?>
               <tr style = "cursor:pointer">
                    <td>
                        <?php echo $task["tasks"]; ?>
                        
                    </td>
                    <td>

                        <a href="<?php echo '/agents/getLeadGenByTasksId/' . $task['taskId']; ?>"> Select </a>

                    </td>
                </tr>
              
            <?php       
                        
                    }
               
                } 
               
               ?>
            </table>
            
        </div>
    </div>
    

</section>