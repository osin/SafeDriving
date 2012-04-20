<?php
include_once '../common/inc/init.inc';
if (!$user->isAuthorized('direction'))
  header("location:/M1/");

$result = "Si vous possedez un compte sur le blog veuillez entrer les mêmes identifiant que sur le blog";
$wp_user = 0;
$privileges = Privilege::all();
$centers = Center::find('all');
if (isset($_POST['captcha']) && isset($_POST['vcaptcha'])) {
  if (md5($_POST['captcha']) == $_POST['vcaptcha']) {
    if (isset($_POST['wordpressUser'])) {
      $wp_user = WP_User::find_by_user_email($_POST['mail']);
      if ($wp_user != null) {
        $user = User::create(array('username' => $wp_user->user_login, 'password' => sha1($_POST['password']), 'email' => strtolower($_POST['mail']), 'created_at' => Date('Y-m-d H:i:s', time()), 'wordpress_id' => $wp_user->id, 'center_id' => $_POST['center']));
        $setPrivileges = UserPrivilege::create(array('user_id' => $user->id, 'privilege_id' => $_POST['privilege']));
        $result = 'compte crée, les informations provenant du blog comme votre email ont été ajoutées';
      }else
        $result= " le compte n'existe pas";
    }else {
      $user = User::create(array('username' => strtolower($_POST['username']), 'password' => sha1($_POST['password']), 'email' => strtolower($_POST['mail']), 'created_at' => Date('Y-m-d H:i:s', time()), 'wordpress_id' => 0, 'center_id' => $_POST['center']));
      $setPrivileges = UserPrivilege::create(array('user_id' => $user->id, 'privilege_id' => $_POST['privilege']));
      $result = 'compte crée. Si vous souhaitez adherer au blog il faudra également créer un compte';
    }
  } else {
    $result = 'erreur captcha';
  }
}
$nb1 = rand(1, 5);
$nb2 = rand(1, 5);
$somme = $nb1 + $nb2;
$captcha_crypted = md5($somme)
?>