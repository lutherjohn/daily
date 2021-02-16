
<section>
    <div class="container">
        <div class="row">
            <p>
                <?php echo $title; ?>
            </p>
            <br />
            <p>
                <?php 
                    echo "Welcome " .$user["clientsFirstname"] ." ". $user["clientsLastname"]; 
                ?>
            </p>
        </div>
        <div class="row">
            <div class="col-sm">
                <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email Address</th>
                        <th scope="col" colspan="4">Option</th>
                    </tr>
                </thead>
              
                </table>
            </div>
            
        </div>      
    </div>
</section>