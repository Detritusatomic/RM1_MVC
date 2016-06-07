<!--DEBUG START-->
<div id="debug" class="card white padding-m no-margin-b" style="left:0;bottom:0;position:fixed;">
	<h4 class="center">Debugger</h4>
	<div class="row">
		<h5>GET</h5>
		<div class="col s12"><?php var_dump($_GET)?></div>
		<h5>POST</h5>
		<div class="col s12"><?php var_dump($_POST)?></div>
		<h5>SESSION</h5>
		<div class="col s12"><?php var_dump($_SESSION)?></div>
	</div>
</div>
<!--DEBUG END-->