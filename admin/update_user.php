<?php include 'assets/head.php'; ?>
<?php include 'assets/sidebar.php'; ?>
<?php
$email = $_GET['email'];
include "database-admin/database.php";

$sqlresult = mysqli_query($conn, "select * from `user` WHERE `email`= '$email'");
$row = mysqli_fetch_array($sqlresult);
if (!$sqlresult) {
    trigger_error(mysqli_error($conn), E_USER_ERROR);
}

?>


<form action="validation.php" method="post" enctype="multipart/form-data">


    <div id="content-wrapper" class="d-flex flex-column text-white" style="background-color: #fff5;box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">


        <div class="container-fluid p-3">
            <div class="col p-5">
                <form action="validation.php" method="post" enctype="multipart/form-data">
                    <div class="row  m-4">
                        <div class="col p-5  m-1" style="background-color: #0009; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
                            <div class="form-outline">
                                <label class="form-label" for="form3Example9">FIRST NAME</label>
                                <input type="text" id="form3Example9" class="form-control form-control-lg" name="firstname" value="<?php echo $row[2] ?>" required />

                            </div>
                            <div class="form-outline">
                                <label class="form-label" for="form3Example9">LAST NAME</label>
                                <input type="text" id="form3Example9" class="form-control form-control-lg" name="lastname" value="<?php echo $row[3] ?>" required />
                            </div>
                        </div>
                        <div class="col p-5 m-1" style="background-color: #0009; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
                            <div class="form-outline">
                                <label class="form-label" for="form3Example9">PASSWORD</label>
                                <input type="text" id="form3Example9" class="form-control form-control-lg" name="password" value="<?php echo $row[1] ?>" required />
                            </div>
                            <div class="form-outline">
                                <label class="form-label" for="form3Example9">EMAIL</label>
                                <input type="text" id="form3Example9" class="form-control form-control-lg" name="email" value="<?php echo $row[4] ?>" readonly />
                            </div>
                        </div>
                    </div>

                    <div class="row m-4">
                        <div class="col p-5" style="background-color: #0009; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
                            <div class="form-outline">
                                <label class="form-label" for="form3Example9">DATE</label>
                                <input type="date" id="form3Example9" class="form-control form-control-lg" name="birtdate" value="<?php echo $row[5] ?>" required />
                            </div>
                            <div class="form-outline">
                                <label class="form-label" for="form3Example9">PHONE</label>
                                <input type="text" id="form3Example9" class="form-control form-control-lg" name="cpnumber" value="<?php echo $row[0] ?>" required />
                            </div>
                            <div class="form-outline">
                                <label class="form-label" for="form3Example9">ADDRESS</label>
                                <input type="text" id="form3Example9" class="form-control form-control-lg" name="address" value="<?php echo $row[7] ?>" required />
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-default form-control" name="user_update">
                </form>
            </div>
        </div>
</form>

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