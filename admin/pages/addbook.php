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
document.getElementById('inputHeres').innerHTML = "You have successfully added a Book";
$('#modal-success').modal('show');
}else{
document.getElementById('inputHered').innerHTML = data;
$('#modal-error').modal('show');

}
document.getElementById('title').value = "";
document.getElementById('author').value = "";
document.getElementById('cm').value = "";
document.getElementById('an').value = "";
document.getElementById('department').value = "";
document.getElementById('publisher').value = "";
document.getElementById('pop').value = "";
document.getElementById('yop').value = "";
document.getElementById('subject').value = "";
document.getElementById('description').value = "";
}
});
}));
});

</script>                
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <h3>Book Management</h3>
                    <ul>
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>Add Book</li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                <!-- Add New Book Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Add New Book</h3>
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
                        <form class="new-added-form" method="post" id="adding">
                            <div class="row">
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Title *</label>
                                    <input type="text" placeholder="" required="" id="title" name="title" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Author *</label>
                                    <input type="text" placeholder="" required="" id="author" name="author" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Class Mark *</label>
                                    <input type="text" placeholder="" required="" id="cm" name="cm" class="form-control">
                                </div>
                                 <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Accession Number *</label>
                                    <input type="text" placeholder="" required="" id="an" name="an" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Department *</label>
                                    <select class="form-control" name="department" id="department">
                                        <option value="">Please Select Department *</option>
                                        <?php
                                    $fetch = $conn->query("SELECT * FROM department order by name ASC");
                                    $result = $fetch->fetchAll(PDO::FETCH_OBJ);
                                    $count = $fetch->rowCount();
                                    if ($count > 0) {
                                    foreach ($result as $key) {
                                        $ident = $key->id;
                                        $name = $key->name;
                                    ?>
                                    <option value="<?php echo $name ?>"><?php echo $name ?></option>
                                    <?php
                                    }
                                    }
                                    ?>
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Publisher</label>
                                    <input type="text" placeholder="" required="" id="publisher" name="publisher" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Place of Publication *</label>
                                    <input type="text" placeholder="" required="" id="pop" name="pop" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Year of Publication*</label>
                                    <input type="text" placeholder="" required="" id="yop" name="yop" class="form-control">
                                </div>
                                 <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Subject*</label>
                                    <textarea class="form-control" name="subject" id="subject"></textarea>
                                </div>
                                 <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Description*</label>
                                    <textarea class="form-control" name="description" id="description"></textarea>
                                </div>
                                <div class="col-md-3 d-none d-xl-block form-group">
                                   
                                </div>
                                <div class="col-12 form-group mg-t-8">
                                    <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
                                    <button type="reset" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>