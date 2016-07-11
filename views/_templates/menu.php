<!--MENU START-->
<nav>
	<div class="nav-wrapper wrap">
		<a href="home" class="left brand-logo">RM1MVC</a>
		<ul class="right">
			<li><a href="#!">Link1</a></li>
			<li><a href="#!">Link2</a></li>
			<?php if(LOGIN): ?>
				<?php if(isset($_SESSION['user'])):?>
				<li><a class="dropdown-button" href="#" data-activates="profil" data-beloworigin="true" data-constrainwidth="false" data-alignment="right">Mon compte<i class="material-icons right no-margin">arrow_drop_down</i></a></li>
				<ul id="profil" class="dropdown-content">
					<li><a href="profil">Mon profil</a></li>
					<?php if(Session::isAdmin()) : ?>
					<li><a href="admin/home">Administration</a></li>
					<?php endif;?>
					<li class="divider"></li>
					<li><a href="logout">Se déconnecter</a></li>
				</ul>
				<?php else : ?>
				<li><a href="#loginmodal" class="modal-trigger">Login</a></li>
				<?php endif; ?>
			<?php endif; ?>
		</ul>
	</div>
</nav>
<!--MENU END-->