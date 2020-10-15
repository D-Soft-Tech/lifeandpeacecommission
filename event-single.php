<?php

include_once 'header/header.php';

if(isset($_GET) && !empty($_GET))
{
  $sanitizer = filter_var_array($_GET, FILTER_SANITIZE_STRING);

  $theme = $sanitizer['theme'];
  $details = $sanitizer['details'];
  $from = $sanitizer['from'];
  $ext = $sanitizer['ext'];
}

if(!empty($theme) && !empty($details) && !empty($from))
{
?>
  <div class="subpage-head" style="margin-bottom: 20px;">
  <div class="container">
    <h3><?= $theme; ?></h3>
    <p class="lead"><?= $from; ?></p>
  </div>
</div>

<!-- // END SUBPAGE HEAD -->

<div class="container">
  <div class="row">
    <div class="col-md-9 has-margin-bottom">
      <article class="blog-content">
        <img src="images/event/<?= $theme; ?>.<?= $ext; ?>" alt="<?= $theme; ?>"  
        class="img-responsive has-margin-xs-bottom" />
        <p class="text-justify"><?= $details; ?></p>
      </article>
    </div>
    <!--// col md 9--> 
    
    <!--Sidebar-->
    <div class="col-md-3">
      <div class="highlight-bg has-padding event-details has-margin-xs-bottom">
        <div class="ed-title">
          EVENT DETAILS
        </div>
        <div class="ed-content"> <span class="glyphicon glyphicon-calendar"></span> <?= $from; ?><br>
          </span><?php if(isset($time)){echo '<span class="glyphicon glyphicon-time">'. $time;} ?> <br>
        </div>
      </div>
      <div class="row vertical-links has-margin-xs-bottom">
        <div class="col-md-12 tag-cloud has-margin-bottom"> 
          <a href="blog.php">bulletin</a> 
          <a href="events-programs.php">programs</a>
          <a href="events-programs.php">events</a> 
          <a href="index.php">church</a>
          <a href="charity-doantion.php">donation</a> 
          <a href="image-gallery.php">gallery</a> 
          <a href="#">audio messages</a>
          <a href="#">video messages</a> 
          <a href="about.php">about</a>
          <a href="contact.php">contact</a> 
        </div>
      </div>
  </div>
</div>
</div>

<?php
}
else
{
?>
  <div class="container well" style="margin-bottom: 10%; margin-top: 10%;">
    <h5 class="text-center">
      No Event Here! please click the Events & Program item under pages in the Navigation bar on top
    </h5>
  </div>
<?php
}
?>

<!--SUBPAGE HEAD-->

<?php
  include_once 'footer/footer.php';
?>

</body>
</html>
