<?php include 'assets/head.php'; ?>
<?php include 'assets/sidebar.php'; ?>
<?php

function display()
{
    include "database-admin/database.php";

    $sqlresult = mysqli_query($conn, "select * from `user`");
    while ($row = mysqli_fetch_array($sqlresult)) {
        echo "<tr>";
        echo "<td>$row[0]</td>";
        echo "<td>$row[1]</td>";
        echo "<td>$row[2]</td>";
        echo "<td>$row[3]</td>";
        echo "<td>$row[4]</td>";

        echo "<td><a href='validation.php?user_delete_email=$row[4]' class='btn btn-warning form-control'>delete</a></td>";
        echo "<td><a href='update_user.php?email=$row[4]' class='btn btn-warning form-control'>update</a></td>";
        echo "</tr>";
    }
}


?>

<section class="p-3" style="background-color: #fff5;box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">

    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist" style="box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
            <button class="nav-link active text-white px-5 fs-3 bi bi-plus-circle-fill" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">&nbsp;Add Perfume</button>
            <button class="nav-link  text-white px-5 fs-3 bi bi-gear" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">&nbsp;Update and Delete</button>
        </div>
    </nav>



    <div class="tab-content" id="nav-tabContent">

        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="container-fluid p-5">
                <form action="validation.php" method="post" enctype="multipart/form-data">
                    <h1 class="display-1">Add User</h1>
                    <div class="row m-5">
                        <div class="col p-4  m-1" style="background-color: #0009; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
                            <h2>Personal Information</h2>
                            <label class="form-label" for="form3Example9">FIRST NAME</label>
                            <input type="text" id="form3Example9" class="form-control" name="firstname" required />
                            <hr>
                            <label class="form-label" for="form3Example9">LAST NAME</label>
                            <input type="text" id="form3Example9" class="form-control" name="lastname" required />
                        </div>



                        <div class="col p-4 m-1" style="background-color: #0009; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
                            <h2>Account Information</h2>

                            <div class="form-outline">
                                <label class="form-label" for="form3Example9">PASSWORD</label>
                                <input type="text" id="form3Example9" class="form-control" name="password" required />

                            </div>
                            <hr>

                            <div class="form-outline">
                                <label class="form-label" for="form3Example9">EMAIL</label>
                                <input type="text" id="form3Example9" class="form-control" name="email" required />

                            </div>
                            <hr>


                        </div>
                    </div>



                    <div class="row m-5">
                        <div class="col-lg-4 p-4 mx-2" style="background-color: #0009; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
                            <div class="row">
                                <div class="col-lg-6 form-outline">
                                    <label class="form-label" for="form3Example9">DATE</label>
                                    <input type="date" id="form3Example9" class="form-control" name="birtdate" required />

                                </div>
                                <div class="col-lg-6 form-outline">
                                    <label class="form-label" for="form3Example9">PHONE</label>
                                    <input type="text" id="form3Example9" class="form-control" name="cpnumber" required />

                                </div>
                            </div>

                        </div>
                        <div class="col p-4  mx-2" style="background-color: #0009; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">


                            <div class="form-outline">
                                <label class="form-label" for="form3Example9">Your Addres</label>
                                <input type="text" id="form3Example9" class="form-control" name="address" required />

                            </div>
                        </div>
                    </div>


                    <div class="form-outline mb-4 p-4">
                        <input type="submit" class="btn btn-default form-control form-control-lg" name="user_add" required />
                    </div>

                </form>




            </div>

        </div>

        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">


            <div id="content-wrapper p-5" class="d-flex flex-column text-white" style="background-color: #0009; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
                <div id="content">

                    <div class="container">
                        <div class="table-responsive">
                            <table class="table no-wrap text-white">
                                <thead>
                                    <tr>
                                        <th class="border-top-0">CP NUMBER</th>
                                        <th class="border-top-0">PASSWORD</th>
                                        <th class="border-top-0">FIRST NAME</th>
                                        <th class="border-top-0">LAST NAME</th>
                                        <th class="border-top-0">EMAIL</th>
                                        <th class="border-top-0">Action</th>
                                        <th class="border-top-0">Action</th>



                                    </tr>
                                </thead>
                                <tbody>
                                    <?php echo display(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>































        </div>

    </div>



</section>



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