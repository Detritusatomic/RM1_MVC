<!--PAGE REGISTER START-->
<div class="wrap">
	<div class="row">
		<div class="col s12">
			<h1 class="header center red-text">S'inscrire</h1>
		</div>
	</div>
	<div class="row">
		<div class="col m6 s12 offset-m3">
			<form id="registerform" method="post" action="form/register">
				<div class="input-field col s12">
					<i class="prefix material-icons">email</i>
					<input type="email" id="mail" name="mail" <?php if(isset($VARIABLES['mail']))echo ('value="'.$VARIABLES['mail'].'"');?> required>
					<label id="maillabel" for="mail">Adresse mail</label>
				</div>
				<div class="input-field col s12">
					<i class="prefix material-icons">lock</i>
					<input type="password" id="mdp" name="mdp" required>
					<label for="mdp">Mot de passe</label>
				</div>
				<div class="input-field col s12">
					<i class="prefix material-icons">check</i>
					<input type="password" id="vmdp" name="vmdp" required>
					<label for="vmdp">Verification mot de passe</label>
				</div>
				<div class="input-field center col s12">
					<button type="submit" class="btn red lighten-2 z-depth-0 waves-effect waves-dark">Valider</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!--PAGE REGISTER END-->