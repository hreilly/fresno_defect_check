<?
$fail = false;
if(strtolower($_POST['submit']) == "continue" && $_POST['checkbox'])
	{
	session_start();
	$_SESSION['disclaimer'] = true;
	header("Location: search.php");
	exit();
	}
else 
	$fail = true;
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="stylesheet_ver2.46.css">
    <title>CITIZENS FOR FULL DISCLOSURE Disclaimer</title>

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

<body><?php include("header.php"); ?>
<div class="body-section">
<?
if($fail)
	{
	?>
	<p style="color:red;font-weight:bold;">You must read and accept the disclaimer and terms and conditions below to continue.</p>
	<?
	}
?>
  <p>All information provided by CITIZENS FOR FULL DISCLOSURE through this Internet service is provided &quot;as is&quot;, with no warranties, express or implied, including the implied warranty of fitness for a particular purpose. CITIZENS FOR FULL DISCLOSURE, furthermore, does not guarantee or warrant the correctness, completeness, relevance  or utility for any general or specific purpose of the data made available through the access of this site. In no event shall CITIZENS FOR FULL DISCLOSURE be liable for any damages, of any nature whatsoever, arising out of the use of, or the inablity to use this Internet service.  <br />
    <br />
    The information contained within this database is based upon documents actually filed with the FRESNO COUNTY SUPERIOR COURT CLERK's office. <!--; (d) judgments and/or liens entered by operation of law on behalf of governmental or of necessity, subject to change. --> <br />
  <br />
    CITIZENS FOR FULL DISCLOSURE makes no warranty of any kind with respect to the information contained herein. Further, the information obtained through this Internet service is not for official use.  <br />
  <br />
    This site provides links to material created or maintained by other organizations for which CITIZENS FOR FULL DISCLOSURE provides no warranties, express or implied, as to the accuracy or source of any such information or the content of any file or data which the user might choose to download from such third-party site.  <br />
  <br />
    Unless expressly provided to the contrary, communications through the Internet site by E-mail or otherwise shall in no event constitute filing with, or legal notice to CITIZENS FOR FULL DISCLOSURE or to any of its officers, directors, agents or representatives.  Any commercial use of data obtained through the use of this site is strictly prohibited. </p>
<form method="POST" action="<?=$_SERVER['PHP_SELF'];?>">
	<p>
    <label>
      <input type="checkbox" name="checkbox" id="checkbox" value="1"/>	  
    </label>
	<?
	if($fail)
		echo 'I have read this disclaimer and accept the terms and conditions';
	else
		echo "I have read this disclaimer and accept the terms and conditions";
	?>
	</p>
  <p>
      <INPUT TYPE="submit" name="submit" VALUE="Continue" class="button"/>
  </p>
</form>
</div><?php include("footer.php"); ?>

</body>
</html>
