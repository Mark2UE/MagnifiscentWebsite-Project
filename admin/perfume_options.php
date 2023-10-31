<?php include 'assets/head.php'; ?>
<?php include 'assets/sidebar.php'; ?>
<?php

function display()
{
    include "database-admin/database.php";

    $sqlresult = mysqli_query($conn, "select * from `perfume_tbl`");
    while ($row = mysqli_fetch_array($sqlresult)) {
        echo "<tr>";
        echo "<td>$row[0]</td>";
        echo "<td>$row[1]</td>";
        echo "<td>$row[2]</td>";
        echo ' <td><img class="custom-image" src="data:image/jpeg;base64,' . base64_encode($row['image']) . '"/> </td>';
        echo "<td>$row[4]</td>";
        echo "<td><a href='validation.php?deleteID=$row[0]' class='btn btn-warning form-control'>delete</a></td>";
        echo "<td><a href='update-perfume.php?perfumeID=$row[0]' class='btn btn-warning form-control'>update</a></td>";
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
                    <h1 class="display-1">Add a Perfume</h1>


                    <div class="row m-5">

                        <div class="col p-4" style="background-color: #0009; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
                            <h2>Perfume Name</h2>
                            <p>In this section, you are required to provide a name for your perfume or select an appropriate title from the options provided by the admin. This is a crucial step in the creation of your fragrance, as the name will play a significant role in how your product is perceived by potential customers. A well-chosen name can convey the essence of your scent, attract attention, and generate interest in your product.</p>
                            <hr>
                            <label class="form-label" for="floatingInput">PERFUME NAME</label>
                            <input type="text" id="floatingInput" class="form-control" placeholder="Perfume Name" name="p_name" required />

                        </div>
                    </div>

                    <div class="row m-5">
                        <div class="col p-4" style="background-color: #0009; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
                            <h2>Perfume Description</h2>
                            <p>A well-written description should entice the senses and provide a clear picture of the scent, while also highlighting its unique features and benefits.</p>
                            <hr>
                            <label class="form-label" for="form3Example9">CREATE A SHORT DESCRIPTION</label>
                            <input type="text" id="form3Example9" class="form-control form-control-lg" name="s_description" required />

                        </div>
                    </div>
                    <div class="row m-5">

                        <div class="col p-4" style="background-color: #0009; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;"">
                            <h2>Perfume Gender</h2>
                            <p> the idea of gender can play a role in how fragrances are marketed and perceived by consumers. Historically, perfumes have been marketed as either " masculine" or "feminine," with distinct scent profiles associated with each gender. However, there has been a shift towards gender-neutral fragrances that do not adhere to traditional gender norms.</p>
                            <hr>
                            <div class=" form-outline mb-4">
                                <label class="form-label" for="form3Example9">SELECT A GENDER</label>
                                <select class="form-select form-control" name="p_gender">
                                    <option value="for HIM">for HIM (MEN)</option>
                                    <option value="for HER">for HER(WOMEN)</option>
                                    <option value="for EVERYONE">for EVERYONE(UNISEX)</option>
                                </select>
                                <label class="form-label" for="form3Example9"></label>
                            </div>

                        </div>
                    </div>
                    <div class="row m-5">
                        <div class="col p-4" style="background-color: #0009; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
                            <h2>Upload a perfume logo</h2>
                            <p> The logo should be in JPG or PNG format<br>
                                The logo should be no larger than 2MB in size<br>
                                The logo should be at least 200 pixels wide by 200 pixels tall<br></p>
                            <hr>
                            <div class="file-upload">
                                <div class="file-upload-placeholder">
                                    <input class="file-upload-input" type='file' name="image1" id="image1" onchange="readURL(this);" accept="image/*" />
                                    <div class="drag-text">
                                        <h3>SELECT A PERFUME IMAGE</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="file-upload-preview">
                                <img class="file-upload-image" src="#" alt="your image" />
                                <div class="file-upload-remove">
                                    <button type="button" onclick="removeUpload()" class="remove-image  btn btn-default">Remove <span class="image-title">Uploaded Image</span></button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="form-outline mb-4 p-4">
                        <input type="submit" class="btn btn-default form-control form-control-lg" name="c_add" required />
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
                                        <th class="border-top-0">perfume_ID</th>
                                        <th class="border-top-0">Perfume Name</th>
                                        <th class="border-top-0">availability</th>
                                        <th class="border-top-0">Image</th>
                                        <th class="border-top-0">Gender</th>
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