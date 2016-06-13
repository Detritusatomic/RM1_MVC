<!--MODAL LOGIN START-->
<div id="loginmodal" class="modal red lighten-3 white-text">
	<div class="modal-content">
		<div class="row">
			<div class="col s12">
				<h4 class="center">Login</h4><br/>
				<form id="loginform" method="post" action="form/login">
					<div class="input-field">
						<i class="prefix material-icons">email</i>
						<input type="text" id="logs" name="logs" required>
						<label for="logs" id="logslabel">Adresse mail ou pseudo</label>
					</div><br/>
					<div class="input-field">
						<i class="prefix material-icons">lock</i>
						<input type="password" id="mdp" name="mdp" required>
						<label for="mdp">Mot de passe</label>
					</div>
					<div class="input-field center">
						<button type="submit" class="btn white red-text text-lighten-2 z-depth-0 waves-effect waves-dark">se connecter</button>
					</div>
				</form>
			</div>
		</div>
		<div class="row">
			<div class="col s12">
				<p>Vous n'avez pas de compte ? <a href="register">Inscrivez-vous</a>.</p>
			</div>
		</div>
	</div>
</div>
<!--MODAL LOGIN END-->