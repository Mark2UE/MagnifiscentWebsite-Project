<?php
include "database/database.php";
$query = $_POST['query'];


$sql = "select * from perfume_tbl WHERE availability = 'ON' and perfume_name LIKE '%$query%'";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($result)) {
    echo '
            <div class="col-md-3 col-sm-6">
                <div class="product-grid" style="box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
                    <div class="product-image">
                        <a href="perfume_bottle.php?perfumeID=' . $row[0] . '">
                        <img  class="pic-1" src="data:image/jpeg;base64,' . base64_encode($row['image']) . '"height="100"width="100"/>
                        </a>
                        <ul class="social">
                            <li><a href="view-perfume.php?perfumeID=' . $row[0] . '" data-tip="Quick View"><i class="fa fa-search"></i></a></li>
                            <li><a href="perfume_bottle.php?perfumeID=' . $row[0] . '" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                        <span class="product-new-label">' . $row[4] . '</span>
                       
                    </div>
                    <div class="product-content">
                        <div class="price">' . $row[1] . '
                        </div>
                    </div>
                </div>
            </div>';
}
