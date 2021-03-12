<section class="container"> 
    <div class="row">
        <h2><?php echo $title; ?></h2>
    </div>

    <div class="mt-4"></div>

    <div class="row">
    <p class="note note-primary">
        <strong>Agent Name:</strong>
        <?php echo $users["agentFirstname"] . " " . $users["agentLastname"]; ?>
        <br />
    </p>
    
    <table class="table">
    <thead>
        <tr>
            <th>Client/s Name</th>
        </tr>
    </thead>
    
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
            <tbody>
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
            </tbody>
            

            <?php
                    }
                }
            ?> 
        </table>
    </div>


    <div class="row">
    <div class="col-md-12">
    <div class="d-flex flex-row-reverse">
        <div class="p-2">
            <button type="button" onclick="redirectTo()" class="btn btn-secondary">Back</button>
        </div>
    </div>  
    
    </div>
        
    </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">
    $( document ).ready(function() {
        
        
    });

    function redirectTo(){

        var url = "<?php echo base_url('admin/agentList'); ?>";
        window.location.href=url;
    }
    
</script>