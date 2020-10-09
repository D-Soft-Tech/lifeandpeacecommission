<?php

    require_once ('gallery_class.php');

    if (isset($_POST['submit'])) 
    {
        if (isset($_FILES) && isset($_POST))
        {  
            $title = $_POST['title'];

            $name = strtolower($_FILES['photo']['name']);

            $day = date("l"); $month = date("F"); $year = date("Y");

            $splitted = explode(".", $name);
            $ext = end($splitted);

            $path = "../images/gallery/".$title.".".$ext;

            $passport_obj = new Passport($name, $ext, $path, $title, $day, $month, $year);
            $passport_obj->Upload();
        }
    }
?>

<div class="row mb-0">
    <div class="col-xs-12 col-md-8">
        <div class="alert alert-success fade show" role="alert">
            <div class="row">
                <div class="col-6">
                    <h4 class="fsize-2 font-weight-bold">Image Gallery</h4>
                </div>
                <div class="col-6">
                    <button class="ml-2 mr-5 btn-transition btn btn-sm btn-outline-success" data-toggle="modal" data-target="#addGallery">
                        Upload New Image
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-4">
        <!-- This column was left empty intentionally -->
    </div>
    
    <div class="col-xs-12 col-md-8">
        <div class="row">
            <div class="col-12 ml-1">
                Showing records for <span class="font-weight-bold"><?php $nowShowing = $month. ", ". $year; echo $nowShowing; ?></span>.
            </div>
            <div class="col-xs-12 col-md-6">
                <br />
                <nav aria-label="Page navigation">
                    <ul class="pagination ml-5 mb-0">
                        <li>
                            <a href="image.php?pages=<?= $Previous; ?>&page=<?= $page; ?>&month=<?= $month; ?>&year=<?= $year; ?>" 
                                class="btn btn-transition btn btn-sm btn-outline-primary" aria-label="Previous">
                                <span aria-hidden="true">&laquo; </span>
                            </a>
                        </li>
                        <?php 
                            $i = $pages > 5 ? $pages - 4 : 1;
                            for($i; $i<= $pages; $i++)
                            {
                            ?>
                            <li><a href="image.php?page=<?= $i; ?>&pages=<?= $pages; ?>&month=<?= $month; ?>&year=<?= $year; ?>" class="btn btn-transition btn btn-sm btn-outline-primary"><?= $i; ?></a></li>
                            <?php 
                            }
                            ?>
                        <li>
                            <a href="image.php?pages=<?= $Next; ?>&page=<?= $page; ?>&month=<?= $month; ?>&year=<?= $year; ?>"
                            class="btn btn-transition btn btn-sm btn-outline-primary" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            
            <div class="col-xs-12 col-md-6">
                <span class="font-weight-bold">Search By</span>
                <form method="POST">
                    <div class="form-row">
                        <div class="col-6">
                            <select id="month" name="month" class="form-control-sm form-control">
                                <option>Month</option>
                                <option value="January">January</option>
                                <option value="February">February</option>
                                <option value="March">March</option>
                                <option value="April">April</option>
                                <option value="May">May</option>
                                <option value="June">June</option>
                                <option value="July">July</option>
                                <option value="August">August</option>
                                <option value="September">September</option>
                                <option value="October">October</option>
                                <option value="November">November</option>
                                <option value="December">December</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <div class="row">
                                <div class="col-9 pr-2">
                                    <select id="year" name="year" class="form-control-sm form-control">
                                        <option>Year</option>
                                        <?php
                                            for ($now= "2020"; $now <= date("Y"); $now++) { 
                                                echo '<option value="'.$now.'">' . $now . '</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-3 pl-0">
                                    <button type="submit" name="filtered_search" value="filtered_search" class="btn btn-transition btn btn-sm btn-outline-success"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <hr class="bg-success my-2" />
    </div>
    <div class="col-xs-12 col-md-4">
        <!-- This div was left empty intentionally -->
    </div>
</div>

<?php foreach($gallery as $gallery) :  ?>
    <div class="row  my-4 mx-3" id="<?= $gallery['id']; ?>">
        <div class="card col-xs-12 col-md-10">
            <div class="card-body mb-1">
                <img src="../images/gallery/<?= $gallery['title'];?>.<?= $gallery['ext']; ?>" class="mb-3 image-responsive" style="height: 400px; width: 100%;" alt="<?= $gallery['title']; ?>">
                <h6 class="card-title mb-1"><?= $gallery['title'];?></h6>
            </div>
            <div class="card-footer mt-1">
                <button type="button" id="<?= $gallery['id']; ?>" name="<?= $gallery['title']; ?>" value="<?= $gallery['ext']; ?>" class="ml-2 mr-5 btn btn-transition btn-outline-danger btn-block deleteGallery">
                    Delete
                </button>
            </div>
        </div>
        <div class="col-xs-12 col-md-2"><br /></div>
    </div>
<?php endforeach; ?>


<div class="modal fade bd-example-modal-lg mt-5" id="addGallery" role="dialog" aria-labelledby="myLargeModalLabel" data-backdrop="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header text-info">
            <h5 class="modal-title">
                Upload new photo
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="title">Name / Description</label>
                        <input type="text" name="title" class="form-control" id="title">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-12">
                        <label for="photo">
                            Upload Image
                        </label>
                        <input type="file" name="photo" class="form-control" id="photo">
                    </div>
                </div>
                <button type="submit" name="submit" value="submit" class="btn btn-primary btm-sm btn-block">Upload</button>
            </form>
        </div>
    </div>
</div>