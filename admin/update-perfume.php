<?php include 'assets/head.php'; ?>
<?php include 'assets/sidebar.php'; ?>
<?php
$perfume_ID = $_GET['perfumeID'];
include "database-admin/database.php";

$sqlresult = mysqli_query($conn, "select * from `perfume_tbl` WHERE perfume_id = $perfume_ID ");
$row = mysqli_fetch_array($sqlresult);

?>

<div class="content-wrapper d-flex flex-column text-white" style="background-color: #fff5;box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
    <div class="container-fluid p-5">
        <div class="row">
            <div class="col-lg-6">
                <div class="image">
                    <?php echo '
                                <img class="image-block w-100 image-fluid" src="data:image/jpeg;base64,' . base64_encode($row['image']) . '"/>'  ?>
                </div>
            </div>
            <div class="col-lg-6">
                <form action="validation.php" method="post" enctype="multipart/form-data">
                    <div class="col p-3 m-3" style="background-color: #0009; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
                        <h1>PERFUME ID: <?php echo $row[0] ?></h1>
                        <input type="hidden" class="form-control" name="perfumeID" value="<?php echo $row[0] ?>">
                        <h1>NAME: <?php echo $row[1] ?></h1>
                        <hr>
                        <center>
                            <h1>UPDATE INFORMATION:</h1>
                        </center>
                        <hr>
                        <label for="update_name">perfume name:</label>
                        <input type="text" class="form-control" id="update_name" name="update_name" value="<?php echo $row[1] ?>">
                        <hr>
                        <label for="update_name">perfume description:</label>
                        <input type="text" class="form-control" id="update_name" name="update_desc" value="<?php echo $row[5] ?>">
                        <hr>
                    </div>




                    <div class="col p-3 m-3" style="background-color: #0009; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
                        <label class="form-label" for="form3Example1n">AVAILABILITY</label>
                        <select class="form-select form-control" name="p_avail">
                            <option selected value="<?php echo $row[2] ?>">SELECTED:<?php echo $row[2] ?></option>
                            <option value="ON">ON</option>
                            <option value="OFF">OFF</option>
                        </select>
                    </div>


                    <div class="col p-3 m-3" style="background-color: #0009; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
                        <label class="form-label" for="form3Example1n">GENDER</label>
                        <select class="form-select form-control" name="p_gender">
                            <option selected value="<?php echo $row[4] ?>">SELECTED:<?php echo $row[4] ?></option>
                            <option value="for HIM">for HIM (MEN)</option>
                            <option value="for HER">for HER(WOMEN)</option>
                            <option value="for EVERYONE">for EVERYONE(UNISEX)</option>
                        </select>
                    </div>

                    <hr>

                    <div class="col p-3 m-3" style="background-color: #0009; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
                        <h2>Upload a perfume logo</h2>
                        <p> The logo should be in JPG or PNG format<br>
                            The logo should be no larger than 2MB in size<br>
                            The logo should be at least 200 pixels wide by 200 pixels tall<br></p>
                        <hr>
                        <div class="form-outline mb-4">
                            <div class="file-upload">
                                <div class="file-upload-placeholder">
                                    <input class="file-upload-input" type='file' name="image1" id="image1" onchange="readURL(this);" accept="image/*" />
                                    <div class="drag-text">
                                        <h3>SELECT A PERFUME IMAGE</h3>
                                    </div>
                                </div>

                                <div class="file-upload-preview">
                                    <img class="file-upload-image" src="#" alt="your image" />
                                    <div class="file-upload-remove">
                                        <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <input type="submit" class="btn btn-default form-control" name="update_perfume">
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