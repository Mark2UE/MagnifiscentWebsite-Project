<?php include 'assets/head.php'; ?>
<?php include 'assets/sidebar.php'; ?>
<?php
$Bottle_ID = $_GET['bottleID'];
include "database-admin/database.php";

$sqlresult = mysqli_query($conn, "select * from `bottle_tbl` WHERE bottle_id = $Bottle_ID");
$row = mysqli_fetch_array($sqlresult);

?>
<form action="validation.php" method="post" enctype="multipart/form-data">
    <div class="content-wrapper d-flex flex-column text-white" style="background-color: #fff5;box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
        <div class="container-fluid p-5">
            <div class="row">
                <div class="col-lg-6">
                    <div class="image">
                        <?php echo '<img class="image-block w-100 image-fluid" src="data:image/jpeg;base64,' . base64_encode($row['image_bottle']) . '"/>'  ?>
                    </div>
                    <div class="col p-3 m-3" style="background-color: #0009; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
                        <h2>Upload a perfume logo</h2>
                        <p> The logo should be in JPG or PNG format<br>
                            The logo should be no larger than 2MB in size<br>
                            The logo should be at least 200 pixels wide by 200 pixels tall<br></p>
                        <hr>

                        <div class="form-outline">
                            <div class="file-upload">
                                <div class="file-upload-placeholder">
                                    <input class="file-upload-input" type='file' name="image_bottle" id="image1" onchange="readURL(this);" accept="image/*" />
                                    <div class="drag-text">
                                        <h3>SELECT A BOTTLE IMAGE</h3>
                                    </div>
                                </div>

                                <div class="file-upload-preview">
                                    <img class="file-upload-image" src="#" alt="your image" />
                                    <div class="file-upload-remove">
                                        <button type="button" onclick="removeUpload()" class="remove-image btn btn-default">Remove <span class="image-title">Uploaded Image</span></button>
                                    </div>
                                </div>

                            </div>
                        </div>


                    </div>
                </div>



                <div class="col-lg-6">

                    <div class="col p-3 m-3" style="background-color: #0009; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
                        <h1>BOTTLE_ID: <?php echo $row[0] ?></h1>
                        <input type="hidden" class="form-control" name="bottleID" value="<?php echo $row[0] ?>">
                        <h1>NAME: <?php echo $row[1] ?></h1>
                        <hr>
                        <center>
                            <h1>UPDATE INFORMATION:</h1>
                        </center>
                        <hr>
                        <label for="update_name">Bottle name:</label>
                        <input type="text" class="form-control" id="update_name" name="bottle_name" value="<?php echo $row[1] ?>">
                        <hr>
                    </div>




                    <div class="col p-3 m-3" style="background-color: #0009; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
                        <label class="form-label" for="form3Example1n">quantity</label>
                        <input type="text" class="form-control" id="update_name" name="update_qty" value="<?php echo $row[3] ?>">
                    </div>


                    <div class="col p-3 m-3" style="background-color: #0009; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
                        <label class="form-label" for="form3Example1n">Size</label>
                        <input type="text" class="form-control" id="update_name" name="update_size" value="<?php echo $row[2] ?>">
                    </div>
                    <div class="col p-3 m-3" style="background-color: #0009; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
                        <label for="update_name">Bottle Price:</label>
                        <input type="text" class="form-control" id="update_name" name="bottle_price" value="<?php echo $row[5] ?>">
                        <hr>

                        <label for="update_name">Bottle description:</label>
                        <textarea type="text" class="form-control" id="update_name" name="bottle_desc" value="<?php echo $row[6] ?>"> <?php echo $row[6] ?></textarea>

                    </div>




                    <input type="submit" class="btn btn-default form-control" name="update_bottle">
</form>
</div>


</div>












</div>


</div>


<script>
    function readURL(input) {
        if (input.files && input.files[0]) { // if input is file, files has content
            var inputFileData = input.files[0]; // shortcut
            var reader = new FileReader(); // FileReader() : init
            reader.onload = function(e) {
                /* FileReader : set up ************** */
                console.log('e', e)
                $('.file-upload-placeholder').hide(); // call for action element : hide
                $('.file-upload-image').attr('src', e.target.result); // image element : set src data.
                $('.file-upload-preview').show(); // image element's container : show
                $('.image-title').html(inputFileData.name); // set image's title
            };
            console.log('input.files[0]', input.files[0])
            reader.readAsDataURL(inputFileData); // reads target inputFileData, launch `.onload` actions
        } else {
            removeUpload();
        }
    }

    function removeUpload() {
        var $clone = $('.file-upload-input').val('').clone(true); // create empty clone
        $('.file-upload-input').replaceWith($clone); // reset input: replaced by empty clone
        $('.file-upload-placeholder').show(); // show placeholder
        $('.file-upload-preview').hide(); // hide preview
    }

    // Style when drag-over
    $('.file-upload-placeholder').bind('dragover', function() {
        $('.file-upload-placeholder').addClass('image-dropping');
    });
    $('.file-upload-placeholder').bind('dragleave', function() {
        $('.file-upload-placeholder').removeClass('image-dropping');
    });
</script>



<?php include 'assets/footer.php'; ?>