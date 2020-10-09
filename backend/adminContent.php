<div class="row">
    <div class="col-xs-12 col-md-8">
        <div class="row alert alert-success fade show" role="alert">
            <div class="">
                <h4 class="fsize-2 font-weight-bold">Adminstrators</h4>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-4">
        <!-- This column was left empty intentionally -->
    </div>
</div>

<div class="ml-5">
    <nav aria-label="Page navigation">
        <ul class="pagination">
            <li>
                <a href="admin.php?pages=<?= $Previous; ?>&page=<?= $page; ?>" 
                    class="btn btn-transition btn btn-sm btn-outline-primary" aria-label="Previous">
                    <span aria-hidden="true">&laquo; </span>
                </a>
            </li>
            <?php 
                $i = $pages > 5 ? $pages - 4 : 1;
                for($i; $i<= $pages; $i++)
                {
                ?>
                <li><a href="admin.php?page=<?= $i; ?>&pages=<?= $pages; ?>" class="btn btn-transition btn btn-sm btn-outline-primary"><?= $i; ?></a></li>
                <?php 
                }
                ?>
            <li>
                <a href="admin.php?pages=<?= $Next; ?>&page=<?= $page; ?>"
                class="btn btn-transition btn btn-sm btn-outline-primary" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</div>

<?php foreach($admins as $admins) :  ?>
    <div class="row mb-3" id="<?= $admins['admin_id']; ?>">
        <div class="col-xs-12 col-md-8">
            <div class="main-card card">
                <div class="card-body">
                    <h4 class="card-title text-info font-weight-bold"><?= $admins['admin_name'];?></h4>
                    <h6>Username: <?= $admins['admin_user']; ?></h6>
                    <h6>Password: <?= $admins['admin_password']; ?></h6>
                    <div>
                        <button type="button" id="<?= $admins['admin_id']; ?>" class="mt-2 ml-5 btn-transition btn btn-sm btn-outline-danger removeAdmin">
                            Remove
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-4">
            <!-- This column was left empty intentionally -->
        </div>
    </div>
<?php endforeach; ?>