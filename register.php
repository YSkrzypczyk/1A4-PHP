<?php require "core/functions.php" ?>

<?php include "template/header.php" ?>

<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="row">
			<div class="col-12">
				<h1 class="m-4">S'inscrire</h1>
				<!--
				Gender, Lastname, Firstname
				Birthday, city
				Email
				pwd, pwdConfirm
				cgu
				-->
				<form action="core/registerUser.php" method="POST">
					<div class="row mb-4">
						<div class="col-md-3">
							<label for="gender0" class="form-label">
								M.
							</label>
							<input class="form-check-input" type="radio" id="gender0" name="gender" checked="checked" value="0">


							<label for="gender1" class="form-label">
								Mme.
							</label>
							<input class="form-check-input" type="radio" id="gender1" name="gender" value="1">


							<label for="gender2" class="form-label">
								Autre
							</label>
							<input class="form-check-input" id="gender2" type="radio" name="gender" value="2">
						</div>
						<div class="col-md-5">
							<input class="form-control" type="text" name="lastname" id="lastname" placeholder="Votre nom" required="required">
						</div>
						<div class="col-md-4">
							<input class="form-control" class="form-control" type="text" name="firstname" id="firstname" placeholder="Votre prénom" required="required">
						</div>
					</div>
					<div class="row mb-4">


						<div class="col-md-6">

							<div class="row">
								<div class="col-md-6">
									<label for="birthday" class="form-label">
										Votre date de naissance :
									</label>
								</div>
								<div class="col-md-6">
									<input class="form-control" type="date" id="birthday" name="birthday" placeholder="Votre date de naissance" required="required">
								</div>
							</div>
						
						</div>

						<div class="col-md-6">
							<select name="city"  class="form-select">
								<option value="0">Paris</option>
								<option value="1">Bordeaux</option>
								<option value="2">Marseille</option>
							</select>
						</div>
					</div>
					<div class="row mb-4">
						<div class="col-md-12">
							<input class="form-control" type="email" name="email" placeholder="Votre email" required="required">
							
						</div>
					</div>
					<div class="row mb-4">
						<div class="col-md-6">
							<input class="form-control" type="password" name="pwd" placeholder="Votre mot de passe" required="required">
						</div>
						<div class="col-md-6">
							<input class="form-control" type="password" name="pwdConfirm" placeholder="Confirmation" required="required">
						</div>
						
					</div>
					<div class="row mb-4">
						<div class="col-md-12">

							<input class="form-check-input" type="checkbox" id="cgu" name="cgu" required="required">
							<label class="form-label" for="cgu">
								J'accèpte les CGUs
							</label> 
						</div>
					</div>

					<div class="row">
						<div class="col-md-12 text-center">
							<label>
								<button class="btn btn-primary mb-4">S'inscrire</button>
							</label>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php include "template/footer.php" ?>