<div class="row">
    <div class="col-xs-12 col-md-8">
        <div class="card mb-3 widget-content bg-premium-dark">
            <div class="widget-content-wrapper row text-white">
                <div class="col-md-12 widget-content-left">
                    <div class="widget-heading"><h5 class="font-weight-bold">USERS</h5></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-4"></div>
</div>

<div class="row">
    <div class="col-md-12">
        <?= $alertMsg; ?>
    </div>
</div>

<div class="row ml-5">
    <div class="col-md-3">
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <li>
                    <a href="users.php?pages=<?= $Previous; ?>&page=<?= $page; ?>&searchInput=<?= $input; ?>" 
                        class="btn btn-transition btn btn-sm btn-outline-primary" aria-label="Previous">
                        <span aria-hidden="true">&laquo; </span>
                    </a>
                </li>
                <?php 
                    $i = $pages > 5 ? $pages - 4 : 1;
                    for($i; $i<= $pages; $i++)
                    {
                    ?>
                    <li><a href="users.php?page=<?= $i; ?>&pages=<?= $pages; ?>&searchInput=<?= $input; ?>" class="btn btn-transition btn btn-sm btn-outline-primary"><?= $i; ?></a></li>
                    <?php 
                    }
                    ?>
                <li>
                    <a href="users.php?pages=<?= $Next; ?>&page=<?= $page; ?>&searchInput=<?= $input; ?>"
                    class="btn btn-transition btn btn-sm btn-outline-primary" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    
    <div class="mb-3 mt-0 col-md-6 search-wrapper  active">
        <div class="input-holder">
            <form action="" method="post">
                <input type="text" class="search-input" name="searchInput" placeholder="Search by anything">
                <button type="submit" name="submitSearchByRef" value="submit" class="search-icon"><span></span></button>
            </form>
        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="main-card mb-3 card">
        <div class="table-responsive">
            <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                <thead>
                    <th class="text-center">U id</th>
                    <th class="text-center">username</th>
                    <th class="text-center">Full Name</th>
                    <th class="text-center">Phone</th>
                    <th class="text-center">Password</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Address</th>
                    <th class="text-center"></th>
                </thead>
                <tbody>
                    
                    <?php 
                        foreach($users as $users) :
                    ?>
                    <tr>
                        <td>
                            <div class="widget-content p-0">
                                <div class="widget-content-wrapper">
                                    <div class="widget-content-left flex2">
                                        <div class="widget-heading text-center"><?php $id = $users['user_id']; echo $id; ?></div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="text-center"><?= $users['username']; ?></td>
                        <td>
                            <div class="widget-content p-0">
                                <div class="widget-content-wrapper">
                                    <div class="widget-content-left flex2">
                                        <div class="widget-heading text-center"><?= $users['full_name']; ?></div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="text-center"><?= $users['phone']; ?></td>
                        <td>
                            <div class="widget-content p-0">
                                <div class="widget-content-wrapper">
                                    <div class="widget-content-left flex2">
                                        <div class="widget-heading text-center"><?= $users['password']; ?></div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="text-center"><?= $users['email']; ?></td>
                        <td>
                            <div class="widget-content p-0">
                                <div class="widget-content-wrapper">
                                    <div class="widget-content-left flex2">
                                        <div class="widget-heading text-center"><?= $users['address']; ?></div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="text-center">
                            <i class="btn btn-sm btn-danger pe-7s-delete-user removeUser"  id="<?= $id; ?>" data-placement='top' data-toggle='tooltip' title='remove user'></i>
                        </td>
                    </tr>
                    <?php
                        endforeach;
                    ?>
                </tbody>
            </table>
        </div>
        <div class="d-block  card-footer">
        </div>
    </div>
</div>