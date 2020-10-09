<!-- Bootstrap core JavaScript
================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<script src="../../js/jquery.js"></script> 
<script src="../../js/bootstrap.min.js"></script> 
<script src="../../js/owl.carousel.min.js"></script> 
<script src="../../js/ketchup.all.js"></script> 
<script src="../../js/fancybox.js"></script>
<script src="../../assets/fontawesomeForWeb/js/all.js"></script>
<script src="../../forala/js/froala_editor.pkgd.min.js"></script>

<!--============== SUBSCRIBE FORM =================--> 

<script>

$(function(){
 var shrinkHeader = 300;
  $(window).scroll(function() {
    var scroll = getCurrentScroll();
      if ( scroll >= shrinkHeader ) {
           $('.navbar').addClass('shrink');
        }
        else {
            $('.navbar').removeClass('shrink');
        }
  });
function getCurrentScroll() {
    return window.pageYOffset || document.documentElement.scrollTop;
    }
});

</script> 

<!--============== SUBSCRIBE FORM =================--> 

<script>
$(document).ready(function() {
	$('#subscribeForm').ketchup().submit(function() {
		if ($(this).ketchup('isValid')) {
			var action = $(this).attr('action');
			$.ajax({
				url: action,
				type: 'POST',
				data: {
					email: $('#address').val()
				},
				success: function(data){
					$('#result').php(data);
				},
				error: function() {
					$('#result').php('Sorry, an error occurred.');
				}
			});
		}
		return false;
	});

});
</script>