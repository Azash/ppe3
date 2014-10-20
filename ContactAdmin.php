<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8" />
<title>Contacter un utilisateur</title>

</head>

<body>

		<br>
		<h2>Contacter un utilisateur</h2>
		<br>

		<form method="post" accept-charset="utf-8" action="envoieMail.php">
		
			<div>
				<label for="nom">Nom</label>
					<div>
					<input type="text" id="nom" name="nom" value="" maxlength="50">
					</div>
			</div>
			<br/>
			<div>
				<label for="nom">Prénom</label>
					<div>
					<input type="text" id="nom" name="nom" value="" maxlength="50">
					</div>
			</div>

			<br>

			<div>
			<label for="mail">Email</label>
				<div>
					<input type="email" class="form-control" id="mail" name="mail" value="" maxlength="50">
				</div>
			</div>

			<div class="clearfix"></div>
			<br>

			<div class="form-group">
				<label for="sujet">Sujet</label>
				<div>
					<input type="text" class="form-control" id="sujet" name="sujet" value="" maxlength="100">
				</div>
			</div>

			<div class="clearfix"></div>
			<br>

			<div class="form-group">
				<label for="message">Message</label>
				<div>
					<textarea type="text" id="message" name="message" style="width: 350px;"></textarea>
				</div>
			</div>

			<p>
				<input type="submit" value="Envoyer">
			</p>

			<div style="clear: both;"></div>
		</form>
	</div>


	</div>