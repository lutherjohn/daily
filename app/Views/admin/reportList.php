<br/>


<section>
    <div class="container px-4">
        <table class="table table-bordered">
                <tr>
                    <th>Task</th>
                    <th colspan="2">option</th>
                </tr>
                
                <?php
                    if($tasks == null){
                ?>
                <tr>
                    <td>No Data</td>
                </tr>
                <?php

                    }else{
                        foreach($tasks as $task){
                ?>
                <tr>
                    <td>
                        <?php echo $task['tasks']; ?>
                    </td>
                    <td>
                        <a href= "<?php echo "viewTasksById/" .$task['taskId']; ?>" >
                            <i class="fas fa-eye"></i>
                        </a>   
                    </td>
                </tr>
                <?php
                        }
                    }
                ?>          


            </table>
    </div>
</section>
<section> 
    <div class="container px-4">
        <div class="row gx-5">
            <div class="col">
                <div class="p-3"><h2><?php echo $title;?></h2></div>
            </div>
            <div class="col">
                <div class="p-3">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loadLeadGenModal">
                        <i class="fas fa-plus-circle"></i> Lead Generation List
                    </button>
                </div>
            </div>
        </div>    
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
</section>


<!-- Modal -->
<div class="modal fade" id="loadLeadGenModal" tabindex="-1" aria-labelledby="loadLeadGenLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loadLeadGenLabel">Add Lead Generation - Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <section>
            <div class="container">
            <div class ="row">
                <form action="crudLeadGen" method="post" class="row g-3">
                    <div class="col-md-6">
                        <label for="inputDate" class="form-label">Date</label>
                        <input type="text" name="date" class="form-control" id="inputDate" placeholder = "yyyy-MM-dd">
                    </div>
                    <div class="col-md-6">
                        <label for="inputConnectionRequest" class="form-label">Connection Request</label>
                        <input type="text" name="connectionRequest" class="form-control" id="inputConnectionRequest">
                    </div>
                    <div class="col-12">
                        <label for="inputTotalLinkedInConnections" class="form-label">Total LinkedIn Connections</label>
                        <input type="text" name="totalLinkedInConnections" class="form-control" id="inputTotalLinkedInConnections" placeholder="LinkedIn Connections">
                    </div>
                    <div class="col-12">
                        <label for="inputClicks" class="form-label">Clicks</label>
                        <input type="text" name="clicks" class="form-control" id="inputClicks" placeholder="">
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </form>                                         
                </div>      
            </div>            
        </section>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

