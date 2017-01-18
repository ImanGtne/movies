<h2>CONNEXION</h2>
<form method="POST" id="register-form">

    <div>
        <label for="login">Username</label>
        <input type="text" name="login" id="login" value="<?= $user->getUsername();?>">
        <?php $validator->showErrors("login"); ?>
    </div>
    <div>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" value="">
        <?php $validator->showErrors("password"); ?>
    </div>
    <div>
        <button type="submit">Connexion</button>
    </div>

</form>