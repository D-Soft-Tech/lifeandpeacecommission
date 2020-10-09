<?php
  include_once 'header/header.php';
?>

<!--SUBPAGE HEAD-->

<div class="subpage-head has-margin-bottom">
  <div class="container">
    <h3>Event Calendar</h3>
    <p class="lead">Event calendar integrated with Google Calendar</p>
  </div>
</div>

<!-- // END SUBPAGE HEAD --> 

<!-- EVENT CALENDAR -->
<div class="container has-margin-bottom">
  <div class="row">
    <div class="col-sm-12 has-margin-xs-bottom">
      <div id="loading" class="text-center">loading...</div>
      <!--EVENT CALENDAR WILL LOAD HERE DYNAMICALLY-->
      <div class="event-cal-wrap" id="event-calendar"> </div>
    </div>
  </div>
</div>
<!--// END EVENT CALENDAR --> 

<?php
  include_once 'footer/footer.php';
?>

<!--============== EVENT CALENDAR =================--> 

<script>

	$(document).ready(function() {
	
		$('#event-calendar').fullCalendar({
		
			// Change the Google Calendar Feed URL inside Quotes
			events: 'https://www.google.com/calendar/feeds/6au3emlgjfair5hjhiegs48tcg%40group.calendar.google.com/public/basic',
			
			eventClick: function(event) {
				// opens events in a popup window
				window.open(event.url, 'gcalevent', 'width=700,height=600');
				return false;
			},
			
			loading: function(bool) {
				$('#loading').toggle(bool);
			}
			
		});
		
	});

</script>
</body>
</html>
