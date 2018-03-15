<!DOCTYPE html>
<html>
 <head>
  <TITLE>Fresno Defect Check - Links</TITLE>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet">
     <link rel="stylesheet" type="text/css" href="stylesheet_ver2.46.css" />

 <script src="http://code.jquery.com/jquery-latest.js"></script>
  <script type="text/javascript" src="jquery.validate.js"></script>
	<style type="text/css">
	label
		{
		
		}
	label.error { 
		
		color: red;
		
		}
</style>
  <script>
  $(document).ready(function(){
    $("#commentForm").validate();
  });
  </script>
  <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-22131555-29']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

 </head>

 <body>
 <?php include("header.php"); ?>
<div class="contact-grid">
    <div class="contact-border"></div>
    <div class="contact-form"><form method="POST" action="https://mailer.artco.com" id="commentForm">
		<input type="hidden" name="sendto[]" value="slarge@wjhattorneys.com">
		<input type="hidden" name="returnto" value="https://www.fresnodefectcheck.com/contact_confirmation.php">
		<input type="hidden" name="subject" value="Fresno Defect Check Contact Web Form">
		<input type="hidden" name="from" value="info@fresnodefect.com">
		<input type="hidden" name="replyto" value="email"> 
		<input type="hidden" name="bodytext" value="Fresno Defect Check Contact Form.">
			<h3>General Inquiries:</h3><p>Please complete the following information and we will provide a response as soon as possible.</p><hr>
			<h4><label for="name">Name:</label></h4>
			<input type="text" name="name" size="30" class="">
			<h4><label for="email">E-mail Address:</label></h4>
			<input type="text" name="email" size="30" class="email">
			<h4>Phone:</h4>
			<input type="text" name="phone" size="30">
			<h4>My home is listed erroneously:</h4>
			<input type="checkbox" name="erroneous" value="yes"> Yes
			<h4>Address of erroneous listing:</h4>
			<input type="text" name="erroneous_listing" size="42">
			<h4>Comment/Question:</h4>
			<textarea rows="4" cols="40" name="comments"></textarea><br><br>
			<input type="submit" name="submit" value="submit" class="button">
		</form>
	</div>
	<div class="donations-info"><h3>Donations:</h3><p>Citizens for Full Disclosure is a non-profit organization and relies soley on donations to keep the website going and the information updated. Donations can be sent to:</p><p style="font-weight: bold;">Citizens for Full Disclosure<br>7265 E. River Park Circle, Suite 310<br>Fresno, CA 93720</p><a href="./search.php"><img src="images/defect_check_arrow.png" alt="Defect Check"></a></div>
</div>
     
<?php include("footer.php"); ?>
 
  
 </body>
</html>
