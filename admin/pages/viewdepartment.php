<script type="text/javascript">
$(document).ready(function(e) {
$("#adding").on('submit' ,(function(e) {
e .preventDefault();
$("#message").empty();
$('#loaders').show();
$ .ajax({
url : "control.php" , //Url to which the request issend
type : "POST" , //Type of request to be send,called as method
data : new FormData(this), //Data sent to server, a set of key/value pairs(i.e.form fields and values)
contentType : false, //The content type used when sending data to the server.
cache : false , //To unable request pages to be cached
processData : false, //To send DOMDocument or non processed data file it is set to false
beforeSend : function(){
            $('#loading').show();
        },
success: function(data) //A function to be called if request succeeds
{
$('#loaders').hide();
if (data == 'success') {
document.getElementById('inputHeres').innerHTML = "You have successfully added a department";
$('#modal-success').modal('show');
document.getElementById('departmentname').value = "";
}else{
document.getElementById('inputHered').innerHTML = data;
$('#modal-error').modal('show');
document.getElementById('departmentname').value = "";
}

}
});
}));
});

</script>                
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <h3>Department</h3>
                    <ul>
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>View Department</li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                <!-- Add New Book Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>View Department</h3>
                            </div>
                           <div class="dropdown">
                                <a class="dropdown-toggle" href="#" role="button" 
                                data-toggle="dropdown" aria-expanded="false">...</a>
        
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
                                    <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                                </div>
                            </div>
                        </div>
                       <div class="table-responsive">
                            <table class="table display data-table text-nowrap">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $fetch = $conn->query("SELECT * FROM department ORDER BY id ASC");
                                $result = $fetch->fetchAll(PDO::FETCH_OBJ);
                                $count = $fetch->rowCount();
                                $sn = 1;
                                if ($count > 0) {
                                    foreach ($result as $key) {
                                        $id = $key->id;
                                        $name = $key->name;
                                ?>

                                    <tr>
                                        <td><?php echo "$sn"; ?></td>
                                        <td><?php echo "$name"; ?></td>
                                        <td><i class="fas fa-trash" title="delete"></i></td>
                                    </tr>
                                <?php

                                        $sn++;
                                    }
                                }
                                ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>