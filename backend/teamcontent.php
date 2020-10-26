<?php

    require_once ('team_class.php');

    if (isset($_POST['saveTeamMember'])) 
    {
        if (isset($_FILES) && isset($_POST))
        {  
            $full_name = $_POST['name'];
            $title = $_POST['title'];
            $role = $_POST['role'];
            $facebook = $_POST['facebook'];
            $twitter = $_POST['tweeter'];
            $about = $_POST['about'];

            $name = strtolower($_FILES['teamPicture']['name']);

            $splitted = explode(".", $name);
            $ext = end($splitted);

            $path = "../images/team/".$full_name.".".$ext;

            $passport_obj = new Passport($about, $name, $ext, $path, $full_name, $title, $role, $facebook, $twitter);
            $passport_obj->Upload();
        }
    }
?>

<div class="row">
    <div class="col-xs-12 col-md-8">
        <div class="card mb-2 widget-content bg-premium-dark">
            <div class="row widget-content-wrapper text-white">
                <div class="col-6 widget-content-left shadow">
                    <div class="widget-heading"><h5 class="font-weight-bold">Team</h5></div>
                </div>
                <div class="col-6">
                    <button class="ml-2 mr-5 btn-transition btn btn-sm btn-outline-warning" data-toggle="modal" data-target="#addTeam">
                        Add Team Members
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-4"></div>
</div>

<div class="ml-5">
    <nav aria-label="Page navigation">
        <ul class="pagination">
            <li>
                <a href="team.php?pages=<?= $Previous; ?>&page=<?= $page; ?>" 
                    class="btn btn-transition btn btn-sm btn-outline-primary" aria-label="Previous">
                    <span aria-hidden="true">&laquo; </span>
                </a>
            </li>
            <?php 
                $i = $pages > 5 ? $pages - 4 : 1;
                for($i; $i<= $pages; $i++)
                {
                ?>
                <li><a href="team.php?page=<?= $i; ?>&pages=<?= $pages; ?>" class="btn btn-transition btn btn-sm btn-outline-primary"><?= $i; ?></a></li>
                <?php 
                }
                ?>
            <li>
                <a href="team.php?pages=<?= $Next; ?>&page=<?= $page; ?>"
                class="btn btn-transition btn btn-sm btn-outline-primary" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</div>


<!-- each comments -->
<?php foreach($teams as $teams) :  ?>
    <div class="col-xs-12 col-md-4" id="<?= $teams['id']; ?>">
        <div class="main-card mb-3 card">
            <div class="card-header pl-0 pr-0 image-top justify-content-center" style="height: 250px;">
                <img src="../images/team/<?= $teams['full_name'];?>.<?= $teams['ext']; ?>" alt="<?= $teams['full_name']; ?>" class="image-responsive" style="height: 250px;">
            </div>
            <div class="card-body mb-0 pb-0">
                <h5 class="card-title">
                <?= $teams['title']; ?> &nbsp; <?= $teams['full_name']; ?>
                </h5>
                <h6><span class="card-title">Role: &nbsp; </span><?= $teams['roles']; ?></h6>
                <p>
                    <i class="fab fa-facebook"></i><a class="btn btn-link" href="http://<?= $teams['facebook']; ?>"><?= $teams['facebook']; ?></a> <br />
                    <i class="fab fa-twitter"></i><a class="btn btn-link" href="http://<?= $teams['tweeter']; ?>"><?= $teams['tweeter']; ?></a>
                </p>
            </div>
            <div class="card-footer">
                <button type="button" id="<?= $teams['id']; ?>" name="<?= $teams['full_name']; ?>" value="<?= $teams['ext']; ?>" class="ml-2 mr-5 btn btn-transition btn-outline-danger removeTeam">
                    Remove Team Member
                </button>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<div class="modal fade bd-example-modal-lg mt-2" id="addTeam" role="dialog" aria-labelledby="myLargeModalLabel" data-backdrop="false" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg mt-5 mb-5">
        <div class="modal-content">
        <div class="modal-header text-info">
            <h5 class="modal-title">
                Add Team member
            </h5>
            <button type="button" class="close" data-dismiss="modal">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="title">Title</label>
                        <input type="text" placeholder="Pastor/Deacon/Deaconess etc" class="form-control" name="title" id="title" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="role">Role</label>
                        <input type="text" class="form-control" name="role" id="role" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="about">About <small class="text-danger">(About the person in less than 50 <em><b>words</b></em>)</small></label>
                        <textarea name="about" class="fr-view" id="about" cols="30" rows="10"></textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-xs-12 col-md-6">
                        <label for="facebook">Facebook Link</label>
                        <input type="text" class="form-control" name="facebook" id="facebook" required>
                    </div>
                    <div class="form-group col-xs-12 col-md-6">
                        <label for="tweeter">Twitter Link</label>
                        <input type="text" class="form-control" name="tweeter" id="tweeter" Placeholder="(optional)">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="book">
                            Upload Picture of Team member
                        </label>
                        <input type="file" class="form-control" id="book" name="teamPicture">
                    </div>
                </div>
                <button type="submit" name="saveTeamMember" value="saveTeamMember" class="btn btn-primary block btm-sm btn-block mt-1">Save</button>
            </form>
        </div>
    </div>
</div>