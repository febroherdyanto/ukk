<center><div id="clockDisplay" class="clockStyle" style="text-decoration:none"></div></center>

<script type="text/javascript" language="javascript">
function renderTime(){
	var currentTime = new Date();
	var h = currentTime.getHours();
	var m = currentTime.getMinutes();
	var s = currentTime.getSeconds();
	if (h == 0){
		h = 24;
	}
	if (h < 10){
		h = "0" + h;
	}
	if (m < 10){
		m = "0" + m;
	}
	if (s < 10){
		s = "0" + s;
	}
	var myClock = document.getElementById('clockDisplay');
	myClock.textContent = h + ":" + m + ":" + s + " WIB";
	setTimeout('renderTime()',1000);
}
renderTime();	
</script>

<style>
@charset "utf-8";
/*CSS Document*/
.clockStyle{
	color:#000000;
	font-family:"Arial Narrow";
	font-size:16px;
	font-weight:bold;
	letter-spacing:2px;
	display:inline;
}
</style>
