<?php

    require_once ('event_class.php');

    if (isset($_POST['submitAddWeeklyEvent'])) 
    {
        if (isset($_FILES) && isset($_POST))
        {  
            $theme = $_POST['theme'];
            $anchor = $_POST['anchor'];
            $phone = $_POST['phone'];
            $details = $_POST['details'];

            $day = $_POST['dayOfTheWeek'];

            $hour = $_POST['hour'];
            $minutes = $_POST['minutes'];
            $amOrPm = $_POST['amOrPm'];

            $time = $hour. " : ". $minutes . " ". $amOrPm;

            $name = strtolower($_FILES['eventPicture']['name']);

            $splitted = explode(".", $name);
            $ext = end($splitted);

            $path = "../images/event/weeklyProgram/".$theme.".".$ext;

            $weeklyProgram = new weeklyProgram($name, $ext, $path, $theme, $anchor, $phone, $details, $day, $time);
            $weeklyProgram->Upload();
        }
    }
?>

<div class="row">
    <div class="col-xs-12 col-md-8">
        <div class="card mb-2 widget-content bg-premium-dark">
            <div class="row widget-content-wrapper text-white">
                <div class="col-6 widget-content-left shadow">
                    <div class="widget-heading"><h5 class="font-weight-bold">Weekly Events</h5></div>
                </div>
                <div class="col-6">
                    <button class="ml-2 mr-5 btn-transition btn btn-sm btn-outline-warning" data-toggle="modal" data-target="#addEvent2">
                        Add Weekly Program
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
                <a href="weeklyProgram.php?pages=<?= $Previous; ?>&page=<?= $page; ?>" 
                    class="btn btn-transition btn btn-sm btn-outline-primary" aria-label="Previous">
                    <span aria-hidden="true">&laquo; </span>
                </a>
            </li>
            <?php 
                $i = $pages > 5 ? $pages - 4 : 1;
                for($i; $i<= $pages; $i++)
                {
                ?>
                <li><a href="weeklyProgram.php?page=<?= $i; ?>&pages=<?= $pages; ?>" class="btn btn-transition btn btn-sm btn-outline-primary"><?= $i; ?></a></li>
                <?php 
                }
                ?>
            <li>
                <a href="weeklyProgram.php?pages=<?= $Next; ?>&page=<?= $page; ?>"
                class="btn btn-transition btn btn-sm btn-outline-primary" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</div>


<!-- each comments -->
<?php foreach($events as $events) :  ?>
    <div class="row  my-4 mx-3" id="<?= $events['meeting_id']; ?>">
        <div class="card card-body col-xs-12 col-md-8">
            <img src="../images/event/weeklyProgram/<?= $events['title'];?>.<?= $events['ext']; ?>" class="mb-3 image-responsive" style="height: 300px; width: 100%;" alt="<?= $events['title']; ?>">
            <h4 class="card-title">Theme: &nbsp;<?= $events['title'];?></h4>
            <h5 class="card-title">Anchor: &nbsp;<?= $events['anchor'];?></h5>
            <p><span class="card-title">Day &amp; Time</span>: &nbsp;
                <?= $events['meeting_day']; ?> &nbsp;<?= $events['meeting_time']; ?>
            </p>
            <button type="button" id="<?= $events['meeting_id']; ?>" name="<?= $events['title']; ?>" value="<?= $events['ext']; ?>" class="ml-2 mr-5 btn btn-transition btn-outline-danger removeEvent">
                Remove Event
            </button>
        </div>
        <div class="col-xs-12 col-md-4"><br /></div>
    </div>
<?php endforeach; ?>

<div class="modal fade bd-example-modal-lg mt-2" id="addEvent2" role="dialog" aria-labelledby="myLargeModalLabel" data-backdrop="false">
    <div class="modal-dialog modal-lg mt-5 mb-5">
        <div class="modal-content">
        <div class="modal-header text-info">
            <h5 class="modal-title">
                Add weekly Event
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="theme">Theme</label>
                        <input type="text" class="form-control" name="theme" id="theme" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" name="anchor" placeholder="Coordinator" id="anchor" required>
                    </div>
                    <div class="form-group col-xs-12 col-md-6">
                        <input type="telephone" class="form-control" name="phone" id="phone" Placeholder="Phone of the coordinator">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="details">Details</label>
                        <textarea class="form-control fr-view" name="details" id="details"></textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-xs-12">
                        Day & Time
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-xs-6 col-md-3" style="padding-right: 2px;">
                        <select id="month" name="dayOfTheWeek" class="form-control-sm form-control">
                            <option value="Monday">Monday</option>
                            <option value="Tuesday">Tuesday</option>
                            <option value="Wednesday">Wednesday</option>
                            <option value="Thursday">Thursday</option>
                            <option value="Friday">Friday</option>
                            <option value="Saturday">Saturday</option>
                            <option value="Sunday">Sunday</option>
                        </select>
                    </div>
                    <div class="form-group col-xs-6 col-md-3">
                        <select id="hour" name="hour" class="form-control-sm form-control">
                            <?php
                                for ($i= 1; $i <= 12; ++$i) { 
                                    if($i < 10)
                                    {
                                        echo '<option value="0'.$i.'">0' . $i . '</option>';
                                    }
                                    else
                                    {
                                        echo '<option value="'.$i.'">' . $i . '</option>';
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-xs-6 col-md-3">
                        <select id="minutes" name="minutes" class="form-control-sm form-control">
                            <?php
                                $j = 0;
                                while($j <= 60) { 
                                    if($j<10)
                                    {
                                        echo '<option value="0'.$j.'">0' . $j . '</option>';
                                    }
                                    else
                                    {
                                        echo '<option value="'.$j.'">' . $j . '</option>';
                                    }
                                    $j = 5 + $j;
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-xs-6 col-md-3">
                        <select id="month" name="amOrPm" class="form-control-sm form-control">
                            <option value="am">am</option>
                            <option value="pm">pm</option>
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="eventPicture">
                            Poster for the Event
                        </label>
                        <input type="file" class="form-control" name="eventPicture" id="eventPicture">
                    </div>
                </div>
                <button type="submit" name="submitAddWeeklyEvent" value="submit" class="btn btn-primary block btm-sm btn-block mt-1">Save</button>
            </form>
        </div>
    </div>
</div>