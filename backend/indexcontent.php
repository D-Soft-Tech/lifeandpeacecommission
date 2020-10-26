<div class="row">
    <div class="col-md-6 col-xl-4">
        <div class="card mb-3 widget-content bg-midnight-bloom">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">
                        Books
                        <span class="badge badge-pill badge-light">6</span>
                    </div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-white"><span>$1896</span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="card mb-3 widget-content bg-arielle-smile">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">Donations</div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-white"><span>$ 568</span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="card mb-3 widget-content bg-grow-early">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">
                        Tithes 
                        <span class="badge badge-pill badge-light">$6000</span>
                    </div>
                    <div class="widget-subheading">
                        <div class="widget-content-left">
                            <div class="widget-heading">
                                Offerings 
                                <span class="badge badge-pill badge-light">$6000</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-white"><span>$1200</span></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-md-12">
        <div class="mb-3 card">
            <div class="card-header">
                <div class="card-title">
                    <form method="POST">
                        <div class="row">
                            <div class="col-6 mr-0 pr-0">
                                <select id="month" name="month" class="form-control-sm form-control">
                                    <option value="1">1<sup>st</sup> Half</option>
                                    <option value="2">2<sup>nd</sup> Half</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-9 pl-0 ml-0 pr-2">
                                        <select id="year" name="year" class="form-control-sm form-control">
                                            <?php
                                                for ($now= "2020"; $now <= date("Y"); $now++) { 
                                                    echo '<option value="'.$now.'">' . $now . '</option>';
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-3 pl-0">
                                        <button type="submit" 
                                            name="submitSearchBooksSalesReport" value="submitSearchBooksSalesReport" 
                                            class="btn btn-transition btn btn-sm btn-outline-success">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tabs-eg-77">
                        <div class="card mb-3 widget-chart widget-chart2 text-left w-100">
                            <div class="widget-chat-wrapper-outer">
                                <div id="booksSalesReport" class="p-3" style="width: 100%; height:50vh;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">

    <div class="col-md-12">
        <div class="alert alert-success fade show">
            <div class="row card-body">
                <div class="text-center col-12">
                    <h5 class="card-title text-center lead">Focus for the month</h5>
                </div>
                <div class="col-xs-12 px-2">
                    <p class="mb-0 text-justify">All Bootstrap 4 helper classes 
                    available in the official Bootstrap documentation are also available 
                    in ArchitectUI Framework: Spacing, resets, 
                    typography utilities, 
                    sizing and others.
                    All Bootstrap 4 helper classes 
                    available in the official Bootstrap documentation are also available 
                    in ArchitectUI Framework: Spacing, resets, 
                    typography utilities, 
                    sizing and others.
                    All Bootstrap 4 helper classes 
                    available in the official Bootstrap documentation are also available 
                    in ArchitectUI Framework: Spacing, resets, 
                    typography utilities, 
                    sizing and others.
                    </p>
                    <br />
                </div>
                <div class="col-12 px-5">
                    <button class="btn btn-outline-focus btn-block btn-small">Edit</button>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-6 col-xs-12">
        <div class="card mb-3 widget-content">
            <div class="widget-content-outer">
                <div class="widget-content-wrapper">
                    <div class="widget-content-left">
                        <div class="widget-heading">Trending Quote</div>
                        <div class="widget-subheading">
                            Posted by <span id="author">Pastor Tosin</span> On <span id="date_posted">22nd of May</span>
                        </div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-success">
                            60 Likes
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-6 col-xs-12">
        <div class="card mb-3 widget-content">
            <div class="widget-content-outer">
                <div class="widget-content-wrapper">
                    <div class="widget-content-left">
                        <div class="widget-heading">Top Audio Download</div>
                        <div class="widget-subheading">Spirituality and Diversity</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-warning">3k downloads</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-header">
                Recent Testimonies
            </div>
            <div class="table-responsive">
                <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">Name</th>
                            <th class="text-center">email</th>
                            <th class="text-center">City</th>
                            <th class="text-center">Subject</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="widget-content p-0">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left flex2">
                                            <div class="widget-heading text-center">John Doe</div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">johndoe@gmail.com</td>
                            <td class="text-center">Madrid</td>
                            <td class="text-center">
                                <div class="widget-content p-0">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left flex2">
                                            <div class="widget-heading">Delivered via prophetic instructions</div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="widget-content p-0">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left flex2">
                                            <div class="widget-heading text-center">John Doe</div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">johndoe@gmail.com</td>
                            <td class="text-center">Madrid</td>
                            <td class="text-center">
                                <div class="widget-content p-0">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left flex2">
                                            <div class="widget-heading">Delivered via prophetic instructions</div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="widget-content p-0">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left flex2">
                                            <div class="widget-heading text-center">John Doe</div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">johndoe@gmail.com</td>
                            <td class="text-center">Madrid</td>
                            <td class="text-center">
                                <div class="widget-content p-0">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left flex2">
                                            <div class="widget-heading">Delivered via prophetic instructions</div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="widget-content p-0">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left flex2">
                                            <div class="widget-heading text-center">John Doe</div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">johndoe@gmail.com</td>
                            <td class="text-center">Madrid</td>
                            <td class="text-center">
                                <div class="widget-content p-0">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left flex2">
                                            <div class="widget-heading">Delivered via prophetic instructions</div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="widget-content p-0">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left flex2">
                                            <div class="widget-heading text-center">John Doe</div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">johndoe@gmail.com</td>
                            <td class="text-center">Madrid</td>
                            <td class="text-center">
                                <div class="widget-content p-0">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left flex2">
                                            <div class="widget-heading">Delivered via prophetic instructions</div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="d-block text-center card-footer">
                <button class="btn-wide btn btn-success block">See All</button>
            </div>
        </div>
    </div>
</div>
<div class="alert alert-primary fade show" role="alert">
    <h5>Donations Target Informations</h5>
</div>
<div class="row">
    <?php foreach($donationsProgress as $donationsProgress) : ?>
        <div class="col-md-6 col-lg-3">
            <div class="card-shadow-danger mb-3 widget-chart widget-chart2 text-left card">
                <div class="widget-content">
                    <div class="widget-content-outer">
                        <div class="widget-content-wrapper">
                            <div class="widget-content-left pr-2 fsize-1">
                                <div class="widget-numbers mt-0 fsize-3"><?php percent($donationsProgress['amount'], $donationsProgress['target']); ?>%</div>
                            </div>
                            <div class="widget-content-right w-100">
                                <div class="progress-bar-xs progress">
                                    <?php
                                        progressBar($donationsProgress['amount'], $donationsProgress['target']);
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content-left fsize-1">
                            <div class="text-muted opacity-6"><?= $donationsProgress['title']; ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>