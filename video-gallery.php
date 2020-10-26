<?php
  include_once 'header/header2.php';
  include_once 'life/php/db.php';

  $conn = get_DB();

  function truncate($string)
  {
    // strip tags to avoid breaking any html
    $string = strip_tags($string);
    if (strlen($string) > 100) {

        // truncate string
        $stringCut = substr($string, 0, 500);
        $endPoint = strrpos($stringCut, ' ');

        //if the string doesn't contain any space then it will cut without word basis.
        $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
    }
    return $string;
  }

  $limit = 10;
  $page = 1;

  function page()
  {
      global $page;
      if (isset($_GET['page']) && $page <= 1){
          return $_GET['page'];
      }elseif ($page >1){
          return $page;
      }else{
          return 1;
      }
  }

  $page = page();

  if((isset($_POST['submitSearchByRef']) && isset($_POST['searchInput']) && !empty($_POST['searchInput'])) && $_POST['searchInput'] !== 'nothingnothing' OR (isset($_GET['searchInput']) && !empty($_GET['searchInput']) && $_GET['searchInput'] !== 'nothingnothing'))
{   
    function getInput(){
        if(isset($_POST['searchInput']))
        {
            return $_POST['searchInput'];
        }
        elseif(isset($_GET['searchInput'])){
            return $_GET['searchInput'];
        }
    }

    $input = getInput();

    $start = ($page - 1) * $limit;
    $sql = "
                SELECT * FROM message WHERE (sermon_by LIKE '%$input%'
                OR title LIKE '%$input%' OR details LIKE '%$input%'
                OR day LIKE '%$input' OR month LIKE '%$input' OR year LIKE '%$input') && type = 'audio' ORDER BY id LIMIT $start, $limit
            ";

    $result = $conn->prepare($sql);
    $checker = $result->execute();
    $audios = $result->fetchAll();

    $result1 = $conn->prepare("
                                SELECT count(id) AS id FROM message WHERE (sermon_by LIKE '%$input%'
                                OR title LIKE '%$input%' OR details LIKE '%$input%'
                                OR day LIKE '%$input' OR month LIKE '%$input' OR year LIKE '%$input') && type = 'audio'
                            ");
                            
    $check = $result1->execute();

    $custCount = $result1->fetchAll();
    $total = $custCount[0]['id'];
}
else
{   
    $input = 'nothingnothing';
    $start = ($page - 1) * $limit;
    $sql = "
                SELECT * FROM message WHERE type = 'audio' ORDER BY id LIMIT $start, $limit
            ";

    $result = $conn->query($sql);
    $audios = $result->fetchAll();

    $result1 = $conn->prepare("
                                SELECT count(id) AS id FROM message WHERE type = 'audio'
                            ");
                            
    $check = $result1->execute();

    $custCount = $result1->fetchAll();
    $total = $custCount[0]['id'];
}

  function pages()
  {
      global $pages;
      if(isset($_GET['pages']) && $pages === null){
          return $_GET['pages'];
      }elseif ($pages){
          return $pages;
      }else{
          return 5;
      }
  }

  $pages = pages();

  function previous()
  {
      global $pages;
      if($pages <=5){
          return 5;
      }else{
          return $pages - 5;
      }
  }
  $Previous = previous();

  function nextArrow()
  {
      global $pages, $total, $limit;
      $rem = ceil($total % $limit);
      $div = ceil($total / $limit);

      if($pages >= $div){
          if($rem>0){
              return $div + 4;
          }elseif($rem = 0){
              return $div;
          }
      }
      else
      {
          return $pages + 5;
          }
  }
    
  $Next = nextArrow();

?>

<!--SUBPAGE HEAD-->

<div class="subpage-head">
  <div class="container">
    <h3>Video Gallery</h3>
    <p class="lead">A collection of our church related videos</p>
  </div>
</div>
<!-- // END SUBPAGE HEAD --> 

<div class="container">
<div class="row">
    <div class="text-center">
        <nav aria-label="Page navigation">
          <ul class="pagination">
            <li>
                <a href="video-gallery.php?pages=<?= $Previous; ?>&page=<?= $page; ?>&month=<?= $month; ?>&year=<?= $year; ?>&day=<?= $day; ?>" 
                    class="btn btn-transition btn btn-sm btn-outline-primary" aria-label="Previous">
                    <span aria-hidden="true">&laquo; </span>
                </a>
            </li>
            <?php 
                $i = $pages > 5 ? $pages - 4 : 1;
                for($i; $i<= $pages; $i++)
                {
                ?>
                <li><a href="video-gallery.php?page=<?= $i; ?>&pages=<?= $pages; ?>&month=<?= $month; ?>&year=<?= $year; ?>&day=<?= $day; ?>" class="btn btn-transition btn btn-sm btn-outline-primary"><?= $i; ?></a></li>
                <?php 
                }
            ?>
            <li>
                <a href="video-gallery.php?pages=<?= $Next; ?>&page=<?= $page; ?>&month=<?= $month; ?>&year=<?= $year; ?>&day=<?= $day; ?>"
                class="btn btn-transition btn btn-sm btn-outline-primary" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
          </ul>
        </nav>
    </div>
  </div>
  <div class="vertical-links" style="margin-right:5%; margin-left: 5%">
    <form method="POST">
      <div class="form-row">
        <div class="col-xs-1"></div>
        <div class="col-xs-3" style="padding-right: 2px;">
          <select id="day" name="day" class="form-control-sm form-control">
            <option>Day</option>
              <?php
                  for ($i=1; $i <=31; ++$i) { 
                      echo '<option value="'.$i.'">' . $i . '</option>';
                  }
              ?>
          </select>
        </div>
        <div class="col-xs-3" style="padding-right: 2px; padding-left: 2px;">
          <select id="month" name="month" class="form-control-sm form-control">
            <option>Month </option>
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
        <div class="col-xs-3" style="padding-left: 2px;">
          <div class="row">
            <div class="col-xs-9" style="padding-right: 2px;">
                <select id="year" name="year" class="form-control-sm form-control">
                    <option>Year</option>
                    <?php
                        for ($now= "2020"; $now <= date("Y"); $now++) { 
                            echo '<option value="'.$now.'">' . $now . '</option>';
                        }
                    ?>
                </select>
            </div>
            <div class="col-xs-3" style="padding-left: 2px;">
                <button name="filtered_search" value="filtered_search" class="btn btn-transition btn btn-sm btn-outline-success"><i class="fa fa-search"></i></button>
            </div>
          </div>
        </div>
        <div class="col-xs-2"></div>
      </div>
    </form>
    <br /><br />
  </div>
</div>

<!--OUR GALLERY-->
<div class="container has-margin-bottom" style="margin-top: 20px;">
  <div class="row">
    <?php 
      // while($video = $result->fetch())
      // {

      // }
    ?>
    <div class="col-sm-6 has-margin-xs-bottom">
      <div class="embed-responsive embed-responsive-4by3">
      <iframe width="560" height="315" src="https://www.youtube.com/embed/ZUTzJG212Vo?rel=0&modestbranding=1" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
      <h4>Heavens and the earth</h4>
      <p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. </p>
    </div>
    <div class="col-sm-6 has-margin-xs-bottom">
      <div class="embed-responsive embed-responsive-4by3">
        <iframe class="embed-responsive-item" src="http://player.vimeo.com/video/96213451?badge=0&byline=0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
      </div>
      <h4>Prayer and petition</h4>
      <p>Sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. </p>
    </div>
    <div class="col-sm-6 has-margin-xs-bottom">
      <div class="embed-responsive embed-responsive-4by3">
        <iframe class="embed-responsive-item" src="http://www.youtube.com/embed/19NMXAhbgvE?autohide=1&iv_load_policy=3&modestbranding=1&rel=0&showinfo=0" allowfullscreen></iframe>
      </div>
      <h4>Fruit of the Spirit</h4>
      <p>Lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. </p>
    </div>
    <div class="col-sm-6">
      <div class="embed-responsive embed-responsive-4by3">
        <iframe class="embed-responsive-item" src="http://www.youtube.com/embed/ITEW4XLoxZU?autohide=1&iv_load_policy=3&modestbranding=1&rel=0&showinfo=0" allowfullscreen></iframe>
      </div>
      <h4>Do not be afraid; keep going</h4>
      <p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. </p>
    </div>
  </div>
</div>
<!--// END OUR GALLERY --> 

<?php
  include_once 'footer/footer.php';
?>

</body>
</html>
