<br />
<section class="container">
  <?php echo form_open('admin/addAssignClients');?>
    <div class="p-3">
        <p class="note note-primary">
        <strong>Agent Name:</strong>
            <?php echo $users['agentFirstname']; ?>
            <?php echo $users['agentMiddlename']; ?>
            <?php echo $users['agentLastname']; ?>
        </p>      
    </div>

    <div class="row">   
  
        <div class="col-md-6">
            <div class="form-group">
            <label for="Select2">Select Client/s</label>
                        
                <select name="multiple_assign" size="15"  multiple ="multiple" class="form-control" id="select1">
                <?php 
                    foreach($clients as $client){
                ?>
                    <option value = <?php echo $client['clientsId']; ?> ><?php echo $client['clientsFirstname'] . " " . $client['clientsLastname']; ?></option>

                <?php } ?>        
                </select>          
            </div>
            <div class="d-flex flex-row">
                <div class="p-2">
                    <button type="button" id="add" class="btn btn-success">
                            <i class="fas fa-angle-double-right"></i>
                    </button>    
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <label for="Select2"> Client/s Added</label>
            <input type="hidden" name="users" value="<?php echo $users['agentId']; ?>">
            <select name="multiple_assign2[]" size="15" multiple ="multiple" class="form-control" id="select2">
            </select>                
        
            <div class="d-flex flex-row-reverse">
                <div class="p-2">
                    <button type="button" id="remove" class="btn btn-success">
                            <i class="fas fa-angle-double-left"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <br />
    <br />
    <div class="row">
        <div class="col-md-12">        
            <div class="form-group">
                <div class="d-flex flex-row-reverse">
                    <div class="p-2">
                        
                        <button type="submit"  class="btn btn-primary">
                            Submit
                        </button> 
                        <button type="button" id="clear" class="btn btn-info">
                            clear
                        </button>
                    </div>                    
                </div>                        
            </div>
            
        </div>
    </div>
    <?php echo form_close(); ?>
</section>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">
    $( document ).ready(function() {

        $('#add').click(function(){
            return !$('#select1 option:selected').remove().appendTo('#select2');
        });
        $('#remove').click(function(){
            return !$('#select2 option:selected').remove().appendTo('#select1');
        });

        $('#clear').click(function(){
            return !$('#select2 option:selected').remove().appendTo('#select1');
        });
    });

   
</script>