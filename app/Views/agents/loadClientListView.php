
<section>
    <div class="container">
    
        <div class="row">
        <div class="mt-4"></div>
            <h1><?php echo $title; ?></h1>
        </div>
        <div class="mt-4"></div>
        <div class="row">
            <table class="table">
                <thead>
                    <th>Name of client</th>
                    <th>Options</th>
                </thead>
                <?php if($clients == null){?>
                    <tr>
                        <td>No data</td>
                    </tr>
                <?php 
                }else{
                    foreach($clients as $client){
                    
                ?>
                    <tr>
                        <td><?php echo $client['clientsLastname'] ." " .$client['clientsFirstname'] ; ?></td>
                        <td>
                            <a href="<?php echo "getClientsToAgent/" .$client['clientsId']; ?>"data-bs-toggle="tooltip" data-bs-placement="top" title="Select Client">
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
    </div>
</section>