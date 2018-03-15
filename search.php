<?
include("./config.php");
$style = array();
$addr = array();

if($_POST)
	{
	if(strlen($_POST['number']) < 1)
		$style['number'] = "color:red;font-weight:bold;";
	if(strlen($_POST['street']) < 1)
		$style['street'] = "color:red;font-weight:bold;";
	if(strlen($_POST['city']) < 1)
		$style['city'] = "color:red;font-weight:bold;";

	if(count($style) < 1)
		{
		$number = 0;
		$city = clean($_POST['city']);
		$street = clean($_POST['street']);
		$number = clean($_POST['number']);

		$query = "SELECT a.id, a.number, a.direction, a.street, a.city, a.zip, a.type, c.complaint, a.complaintid FROM address a LEFT JOIN complaint c ON (a.complaintid = c.complaintid) WHERE a.number = $number AND a.street like '%$street%' AND a.city = '$city'";
		$qry = mysql_query($query);
		if(mysql_num_rows($qry))
			{
			while($res = mysql_fetch_assoc($qry))
				{
				$complq = mysql_query("SELECT id FROM address WHERE complaintid = '{$res['complaintid']}' AND city = '{$res['city']}'");
				$addr[$res['id']]['number'] = $res['number'];
				$addr[$res['id']]['direction'] = ucwords($res['direction']);
				$addr[$res['id']]['street'] = ucwords($res['street']);
				$addr[$res['id']]['city'] = ucwords($res['city']);
				$addr[$res['id']]['zip'] = $res['zip'];
				$addr[$res['id']]['type'] = ucwords($res['type']);
				$addr[$res['id']]['complaint'] = $res['complaint'];
				$addr[$res['id']]['complaints'] = mysql_num_rows($complq);
				}
			}
		}	
	
	}
	
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Fresno Defect Check Disclaimer</title>
<link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet">
<link href="stylesheet_ver2.46.css" rel="stylesheet" type="text/css" />
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
<div class="body-section">
  <h3 id="search-title">Enter the address of the property in question:</h3>
    <div class="search-black-rule"></div>
  <FORM METHOD="POST" ACTION="<?=$_SERVER['PHP_SELF'];?>">  
  <div class="search-section">
      <div class="search-number" style="<?=$style['number'];?>">
    <h4 class="input-title">Number:</h4><input type="text" name="number" id="number" value="<?=$_POST['number'];?>" size="15" />
  </div>
  <div class="search-direction" style="<?=$style['street'];?>">
    <h4 class="input-title">Direction:</h4><input type="text" name="direction" id="direction" value="<?=$_POST['direction'];?>" size="15" />
  </div>
  <div class="search-street" style="<?=$style['street'];?>">
    <h4 class="input-title">Street Name:</h4><input type="text" name="street" id="street" value="<?=$_POST['street'];?>" size="15" /></div>
  <div class="search-city" style="<?=$style['city'];?>">
    <h4 class="input-title">City:</h4><select name="city" id="city">
		<?
		foreach($cities as $key => $city)
			{
			if($city)
				{
				if($_POST['city'] == $key)
					echo '<option SELECTED value="'.$key.'">'.$city.'</option>';
				else
					echo '<option value="'.$key.'">'.$city.'</option>';
				}
			}
		?>
    </select>  
  </div>
      </div>
<div class="search-black-rule"></div>
<div class="search-button"><INPUT TYPE="submit" VALUE="Search" class="button"/></div>
</FORM>
    </div>    
<?
if(count($addr) > 0)
	{
?>
 <div class="address-record">
  <hr><h4>Address found</h4>
    <p>We have located the address:</p>

	<?
	foreach($addr as $key => $val)
		{
		$address = $val['number'];
		if($val['direction'])
			$address .= " ".$val['direction'];
		if($val['street'])
			$address .= " ".$val['street'];
		if($val['type'])
			$address .= " ".$val['type'];
		if($val['city'])
			$address .= ", ".$val['city'];

		$complaint = $val['complaint'];
		?>
		<ul>		
			<li><strong><?=trim($address);?></strong></li>
		</ul>
		<p>The following action concerning this property was filed:</p>
		<ul>
			<li><strong><?=$complaint;?></strong><br />
			  <br />
			</li>
		</ul>
     <h4>What If My House Is Listed?</h4><p>If your house was part of a construction defect lawsuit, you should seek more information about the case.  One place to look is in the Clerk's office of the Fresno County Superior Court, which is located at 1130 "O" Street, Fresno, CA 93721. The Clerk's office is generally open from 8:30 a.m. to 4:00 p.m., Monday-Friday. If you provide them with the case name and number of the matter in which your house was involved, they can provide you with the file on the case for your review. The Complaint in the file will identify the Plaintiffs' counsel, who you can contact. You can also contact the seller of the home, who should be able to provide you with copies of a Defect List and Cost of Repair as well as a copy of the Settlement Agreement which resolved the case.</p><p>If you are thinking about buying a house which was involved in a construction defect lawsuit, you should be sure to understand the specific nature of the alleged defects, what repairs (if any) were actually performed on the defects, and determine for yourself whether the condition of the house is acceptable before agreeing to purchase it. If you determine that the house was involved in a construction defect litigation and that no repairs of alleged defects were performed, you should determine for yourself whether the price you are thinking of paying includes an appropriate discount for the allegedly defective nature of the home.</p><p>Note: Although the information on this website which identifies the houses that are part of construction defect cases is taken directly from Superior Court records, mistakes can happen. If you believe that your house is listed in error, please contact us using the <a href="contact.php">'Contact' section of the website</a>.</p>
    </div>
		<?
		}
	?>

<?
	}
elseif($_POST)
	{
	?>
  <div class="address-record"><hr><h4>No record found</h4><p>Our database does not have this property listed as having been part of a construction defect lawsuit.  If you are interested in purchasing this property, or if you are a lender considering making a loan secured by this property, you should still make a direct written inquiry to the seller or borrower to verify that the property has not been part of a construction defect lawsuit.</p></div>
	<?
	}
?>
</div>
<?php include("footer.php"); ?>

</body>
</html>
