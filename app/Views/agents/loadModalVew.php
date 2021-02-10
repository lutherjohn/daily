<!-- Modal -->
<div class="modal fade" id="loadLeadGenModal" tabindex="-1" role="dialog" aria-labelledby="loadloadLeadGenModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="loadLeadGenModalLabel"><?php  echo $title;?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="modal-body"> 
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
        <div class="modal-footer">
            <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>
        </div>
    </div>
  </div>
</div>