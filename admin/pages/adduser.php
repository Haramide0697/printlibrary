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
document.getElementById('inputHeres').innerHTML = "You have successfully added a User";
$('#modal-success').modal('show');
}else{
document.getElementById('inputHered').innerHTML = data;
$('#modal-error').modal('show');

}
document.getElementById('title').value = "";
document.getElementById('author').value = "";
document.getElementById('date').value = "";
document.getElementById('supervisor').value = "";
$('#previewing').attr('src','img/user.jpg');
$("#message").html("<p id='error'>Click to change image<br> (size should be < 10mb)</p>");
}
});
}));


$(function() {
$("#pass").change(function()
{
$("#message").empty(); // Toremove the previous error message
var file = this .files [ 0 ];
var imagefile = file .type ;
var imagesize = file.size ;
var devid = imagesize/1024;
if (devid > 1024) {
$('#previewing').attr('src','../../img/front.png');
$("#message").html("<p id='error'>Please Select an image less than 10MB</p>");
return false ;   
}else{
var match = [ "image/jpeg" , "image/png" , "image/jpg" ];
if(!((imagefile == match [ 0]) ||(imagefile == match[ 1 ]) || (imagefile == match[ 2 ])))
{
$('#previewing').attr('src','../../img/front.png');
$("#message").html("<p id='error'>Please Select A valid Image File</p>" + "<h4>Note</h4>" + "<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
return false ;
}
else
{
var reader = new FileReader();
reader .onload = imageIsLoaded ;
reader .readAsDataURL(this.files [0]);
}
}
});
});
function imageIsLoaded(e) {
$("#pass").css("color" , "green");
$('#image_preview').css("display" , "block");
$('#previewing').attr('src' , e .target .result);
$('#previewing').attr('width' , '30%');
$('#previewing').attr('height' , '30%');
};
});

</script>                
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <h3>User Management</h3>
                    <ul>
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>Add User</li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                <!-- Add New User Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Add New User</h3>
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
                        <form class="new-added-form" method="post" id="adding" enctype ="multipart/form-data">
                            <div id ="image_preview"><label for="pass"><img id ="previewing" src ="../img/user.jpg"/ width="30%"> <div id="message"><br>Click to change Image<br> (size should be < 10mb)</div></label></div>
                            <div style="display:none">
                                <input type="file" required name="pass" id="pass" accept="image/*">
                            </div>
                            
                            <div class="row">
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Name *</label>
                                    <input type="text" placeholder="" required="" id="title" name="uname" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Address *</label>
                                    <input type="text" placeholder="" required="" id="author" name="address" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Phone Number *</label>
                                    <input type="text" placeholder="" required="" id="date" name="pnum" class="form-control">
                                </div>
                                 <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Email *</label>
                                    <input type="email" placeholder="" required="" id="supervisor" name="email" class="form-control">
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