<br />
<section>
    <div class="container">
        <div class="row">
        <p class="note note-primary">
        <strong>Agent Name:
            <?php
                    
                echo $tasks['tasks'];
            ?>        
        </strong> 
        <div id="response">
        </div>            
            <form action="/agents/InserLeadGenDetails" method="post" class="row g-3">
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
                    <input type="hidden" name="getTaskId" class="form-control" value="<?php echo $tasks['taskId']; ?>">
                    <button type="submit" class="btn btn-primary">Submit</button>                         
                </div>
            </form> 
        </div>
    </div>
</section>
