<div class="row">
    <div class="col-xs-12 col-md-8">
        <div class="card mb-3 widget-content bg-premium-dark">
            <div class="widget-content-wrapper row text-white">
                <div class="col-md-12 widget-content-left">
                    <div class="widget-heading"><h5 class="font-weight-bold">TRANSACTIONS</h5></div>
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
                    <a href="transactions.php?pages=<?= $Previous; ?>&page=<?= $page; ?>&searchInput=<?= $input; ?>" 
                        class="btn btn-transition btn btn-sm btn-outline-primary" aria-label="Previous">
                        <span aria-hidden="true">&laquo; </span>
                    </a>
                </li>
                <?php 
                    $i = $pages > 5 ? $pages - 4 : 1;
                    for($i; $i<= $pages; ++$i)
                    {
                    ?>
                    <li><a href="transactions.php?page=<?= $i; ?>&pages=<?= $pages; ?>&searchInput=<?= $input; ?>" class="btn btn-transition btn btn-sm btn-outline-primary"><?= $i; ?></a></li>
                    <?php 
                    }
                    ?>
                <li>
                    <a href="transactions.php?pages=<?= $Next; ?>&page=<?= $page; ?>&searchInput=<?= $input; ?>"
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
                    <th class="text-center">Tr id</th>
                    <th class="text-center">username</th>
                    <th class="text-center">Full Name</th>
                    <th class="text-center">Purpose</th>
                    <th class="text-center">Amount</th>
                    <th class="text-center">Ref. No</th>
                    <th class="text-center">Date</th>
                    <th class="text-center">Time</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Action</th>
                </thead>
                <tbody>
                    
                    <?php 
                        foreach($transactions as $transactions) :
                    ?>
                    <tr>
                        <td>
                            <div class="widget-content p-0">
                                <div class="widget-content-wrapper">
                                    <div class="widget-content-left flex2">
                                        <div class="widget-heading text-center"><?php $id = $transactions['id']; echo $id; ?></div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="text-center"><?= $transactions['username']; ?></td>
                        <td>
                            <div class="widget-content p-0">
                                <div class="widget-content-wrapper">
                                    <div class="widget-content-left flex2">
                                        <div class="widget-heading text-center"><?= $transactions['fullname']; ?></div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="text-center"><?= $transactions['purpose']; ?></td>
                        <td>
                            <div class="widget-content p-0">
                                <div class="widget-content-wrapper">
                                    <div class="widget-content-left flex2">
                                        <div class="widget-heading text-center"><?= $transactions['amount']; ?></div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="text-center"><?= $transactions['reference']; ?></td>
                        <td>
                            <div class="widget-content p-0">
                                <div class="widget-content-wrapper">
                                    <div class="widget-content-left flex2">
                                        <div class="widget-heading text-center"><?= $transactions['day']. " ". $transactions['month']. ", ". $transactions['year'] ; ?></div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="text-center"><?= $transactions['transc_time']; ?></td>
                        <td>
                            <div class="widget-content p-0">
                                <div class="widget-content-wrapper">
                                    <div class="widget-content-left flex2">
                                        <div class="widget-heading text-center"><?= $transactions['transc_status']; ?></div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="text-center">
                            <i class="btn btn-sm btn-success pe-7s-check markAsComplete"  id="<?= $id; ?>" data-placement='top' data-toggle='tooltip' title='mark as completed'></i>
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