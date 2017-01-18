<h2>Inscription</h2>
<form method="POST" id="register-form">

	<div>
		<label for="username">Username</label>
		<input type="text" name="username" id="username" value="<?= $user->getUsername();?>">
		<?php $validator->showErrors("username"); ?>
	</div>

	<div>
		<label for="email">Email</label>
		<input type="email" name="email" id="email" value="<?= $user->getEmail();?>">
		<?php $validator->showErrors("email"); ?>
	</div>

	<div>
		<label for="password">Password</label>
		<input type="password" name="password" id="password" value="">
		<?php $validator->showErrors("password"); ?>
	</div>

	<div>
		<label for="password_bis">Password again</label>
		<input type="password" name="password_bis" id="password_bis" value="">
		<?php $validator->showErrors("password_bis"); ?>
	</div>

	<div>
		<button type="submit">Register!</button>
	</div>

</form>