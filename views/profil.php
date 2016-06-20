<!--PAGE PROFIL START-->
<?php $session=Session::getInstance();?>
<div class="wrap">
    <div class="row">
		<div class="col s12">
			<div class="card no-margin-t">
				<div class="red lighten-3 padding-m-h padding-xs-v filler">
				<?php if ($session->__get('user')->prenom !='') : ?>
					<h3 class="white-text hide-on-med-and-down center">La page de <?=$session->__get('user')->prenom; ?></h3>
					<h4 class="white-text hide-on-large-only hide-on-small-only center">La page de <?=$session->__get('user')->prenom; ?></h4>
				<?php endif; ?>
					<a href="#edit-profil-modal" class="btn-floating btn-large white waves-dark waves-effect right modal-trigger"><i class="material-icons red-text text-lighten-2">edit</i></a>
				</div>
				<div class="card-content">
					<div class="row">
						<div class="col l2 m6 offset-m3 s12 center">
							<img src="<?php if($session->__get('user')->avatar!='')echo $session->__get('user')->avatar;else echo'img/avatar/default.png';?>" alt="profile image" class="circle z-depth-2 responsive-img">
						</div>          
						<div class="col l5 m6">                  
							<h4 class="grey-text text-darken-3 no-margin-b">
								<?php
								if($session->__get('user')->nom !='')
									echo $session->__get('user')->nom.' '.$session->__get('user')->prenom; 
								else echo 'Nom Prénom';
								?>
							</h4>
							<p class="grey-text text-darken-2">Pseudo : <?=$session->__get('user')->pseudo?></p>                        
							<p class="grey-text text-darken-2">Adresse mail : <?=$session->__get('user')->mail?></p>                       
						</div> 
					</div> 
				</div> 
			</div>
		</div>
	</div>
</div>
<!--PAGE PROFIL END-->
<!--MODAL EDIT PROFIL START-->
<div id="edit-profil-modal" class="modal">
	<div class="modal-content">
		<div class="row">
			<div class="col s12">
				<h4 class="center">Modifier votre profil</h4><br/>
				<form id="editprofilform" method="post" action="form/editProfil" enctype="multipart/form-data">
					<div class="input-field">
						<input type="text" id="nom" name="nom" value="<?=$session->__get('user')->nom?>">
						<label for="nom">Nom</label>
					</div><br/>
					<div class="input-field">
						<input type="text" id="prenom" name="prenom" value="<?=$session->__get('user')->prenom?>">
						<label for="prenom">Prénom</label>
					</div><br/>
					<div class="input-field">
						<input type="text" id="pseudo" name="pseudo" value="<?=$session->__get('user')->pseudo?>">
						<label for="pseudo">Pseudo</label>
					</div><br/>
					<div class="file-field input-field">
						<div class="row vcenter">
							<div class="col l2 s12">
								<img src="<?php if($session->__get('user')->avatar!='')echo $session->__get('user')->avatar;else echo'img/avatar/default.png';?>" alt="profile image" class="circle z-depth-2 responsive-img">
							</div>
							<div class="col l2 s6 center">
								<div class="btn red">
									<span>Avatar</span>
									<input type="file" name="avatar">
								</div>
							</div>
							<div class="col l8 s6">
								<div class="file-path-wrapper">
									<input type="text" class="file-path validate">
								</div>
							</div>
						</div>
						<div class="input-field">
							<button type="submit" class="btn red lighten-2 z-depth-0 waves-effect waves-dark">Valider</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!--MODAL EDIT PROFIL END-->