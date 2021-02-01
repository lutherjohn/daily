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
