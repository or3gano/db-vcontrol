<html>
<link rel="stylesheet" type="text/css" href="style.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
<script src="http://d3js.org/d3.v3.min.js" charset="utf-8"></script>
<link href='http://fonts.googleapis.com/css?family=Tauri' rel='stylesheet' type='text/css'>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<div  class="loginCon">
	<div class="imgCon">
	<img style="margin-left: 50px; width: 350px;max-height: 200px;" id="loginLogo" src="javascript()">
	</div>
		<hr class="indexHR" >
		<a href="" type="button" style="margin: 5% 30%;" class="btn btn-lg btn-success"></a>
	</div>
	
<script>
var buttonArray = [
	"Click zeh Offiziersbursche button!!!",
	"Beam Me Up Scotty..."
];
var logoArray = [
	"http://www.vectortemplates.com/raster/batman-logo-big.gif",
	"http://img4.wikia.nocookie.net/__cb20090612021344/memoryalpha/en/images/thumb/5/55/Early_2270s_Starfleet.png/148px-Early_2270s_Starfleet.png"
];
var randomNumber = Math.floor(Math.random() * 2);
document.getElementById("loginLogo").src = logoArray[randomNumber];
document.getElementsByTagName("a")[0].innerHTML = buttonArray[randomNumber];
console.log(randomNumber);
</script>
</html>