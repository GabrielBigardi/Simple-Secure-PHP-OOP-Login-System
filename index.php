<?php
require_once 'core/init.php';

if(Session::exists('home')){
	//flash
	echo '<p style="background-color:red;">'. Session::flash('home') .'</p>';
}

$user = new User();
if($user->isLoggedIn()){
?>
	<p>Olá <a href="profile.php?user=<?php echo escape($user->data()->username); ?>"><?php echo escape($user->data()->username); ?></a></p>
	
	<ul>
		<li><a href="logout.php">Logout</a></li>
		<li><a href="update.php">Atualizar Detalhes</a></li>
		<li><a href="changepassword.php">Mudar Senha</a></li>
	</ul>
<?php	

	if($user->hasPermission('admin')){
		echo '<p>You are an administrator!</p>';
	}

}else{
	?>
	
	<p>Faça <a href="login.php">login</a> ou <a href="register.php">registro</a> pra usar o site</p>
	
	<?php
}