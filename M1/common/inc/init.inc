<?php
// <editor-fold defaultstate="collapsed" desc="set global variable">
define("INC_Path", '../common/inc');
define("CTRL_Path", '../controllers');
define("WP_INC_Path", '../blog/wp_includes/');
define("IMG_Path", '../common/images');
define("MODEL_Path", '../common/inc/models');
define("SiteName", 'M1 AutoEcole Project');
define("JS_Path", '../common/js');
define("CSS_Path", '../common/css');
setlocale(LC_ALL, 'fr_FR');
define("modelPrefixOffice", "mp_");
define("modelPrefixWordPress", "wp_");
// </editor-fold>
// <editor-fold defaultstate="collapsed" desc="inclusion des classes de models">
require_once '../common/inc/ActiveRecord.inc';
$connections = array(
    'development' => 'mysql://USER:PASSWORD@HOST/DATABASE?charset="utf8',
);

# must issue a "use" statement in your closure if passing variables
ActiveRecord\Config::initialize(function($cfg) use ($connections) {
          $cfg->set_model_directory('../common/inc/models');
          $cfg->set_connections($connections);
          $cfg->set_date_format("Y-m-d H:i:s");

# A fixer sur production lorsque le projet sera terminé
          $cfg->set_default_connection('development');
        });
// </editor-fold>
// <editor-fold defaultstate="collapsed" desc="création de la session">
session_name('Office');
session_start();
if (isset($_SESSION['user']))
  $user = $_SESSION['user'];
// </editor-fold>
// <editor-fold defaultstate="collapsed" desc="inclusion du controlleur">

$paths = explode('/', $_SERVER['SCRIPT_NAME']);
$script = $paths[count($paths) - 1];
if (is_file(CTRL_Path . '/' . $script)) {
  include CTRL_Path . '/' . $script;
}

// </editor-fold>
// <editor-fold defaultstate="collapsed" desc="Common function">
function Begin($title='Home', $layout=true, $label="Activity") {
  ?>
  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
  <html>
    <head>
      <title><?php print SiteName . " - " . $title ?></title>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

      <?php
      if ($layout) {
        IncludeDirectory(CSS_Path, 'css');
        IncludeDirectory(JS_Path, 'js');
        if (isset($_SESSION['user'])) {
          $user = $_SESSION['user'];
          $privileges = $user->getPrivileges();
        }else
          $user = User::create(array('username' => 'invité'));
      }
      ?>

    </head>
    <body>
      <div id="header" class="fl">
        <div id="logo" onclick="document.location = '../public/hub.php'"></div>
        <div id="menu">
          <?php
          if ($user->username == 'invité'):?>
            <ul>
          <li><a href="./wp-login.php">Connexion / Inscription</a></li>
          <li><a href="../public/">Je suis élève</a></li>
          <li><a href="../public/offer.php">Consulter nos offres</a></li>
          <li><a href="../public/center.php">Voir nos centres</a></li>
          <li><a href="../public/vehicle.php">Parc de vehicules</a></li>
        </ul>
          <?php else :
            if (count($privileges > 0)) {
              foreach ($privileges as $key => $privilege) {
                if ($privilege->label == 'user') {
                  include '../public/hubUserMenu.php';
                }else
                  include '../office/hub' . ucfirst ($privilege->label) . 'Menu.php';
              }
            }
            endif;
          ?>
          <ul>
            <li><a title="Consulter le blog" href="../blog/">Voir notre blog</a></li>
          </ul>
          <?php if ($user->username != 'invité'):?>
          <ul>
            <li><a title="Deconnexion" href="../">Me Déconnecter </a></li>
          </ul>
          <?php endif;?>
        </div>
      </div>
      <div id="content" class="fl" style="width: 83%">
        <div class="posts">
          <div id="userInfo">
            <h1>Bonjour <?php echo ucfirst($user->username); ?> !</h1>
              <?php if ($user->username != 'invité'): ?>
              <p> Vous êtes connecté sur le centre de <?php echo Center::find($user->center_id)->name; ?></p>
              <p> Le responsable de votre centre est  <?php print ucwords(User::find(Center::find($user->center_id)->user_id)->username); ?>
  <?php endif; ?>
          </div>
          <div class="post">
            <h2 class="titre"><?php echo $label; ?></h2>
          <?php }

          function Close() { ?>
          </div>
        </div>
        <!--
        <div id="footer-main">
          <div id="footer">
            <ul>
            <li><a href="../public/offer" title="prestations">Nos prestations</a>|</li>
            <li><a href="../blog/" title="blog">Notre blog</a>|</li>
            <li><a href="mailto:developers@essozi.com">Contactez-l\'équipe</a>|</li>
            <li><a href="www.steffiandmihanta.com/" title="Steffi RAKOTOZAFY">Template Design: Steffi RAKOTOZAFY |</a></li>
            <li><a href="essozi.com" title="essozi.com">Besteam Developpement</a></li>
            </ul>
          </div>
        </div>
        -->
      </div>
    </body>
  </html>
  <?php
}

function IncludeDirectory($Directory, $type='inc') {
  $MyDirectory = opendir($Directory) or die('Erreur');
  while ($Entry = @readdir($MyDirectory)) {
    if (is_dir($Directory . '/' . $Entry) && $Entry != '.' && $Entry != '..' && $Entry != 'lib')
      IncludeDirectory($Directory . '/' . $Entry, $type);
    else {
      if ($Entry != '.' && $Entry != '..') {
        switch ($type) {
          case 'inc':
            if ($Entry != 'init.inc' && $Entry != 'ActiveRecord.inc' && $Entry != 'lib') {
              require_once $Directory . '/' . $Entry;
            }
            break;
          case 'js':
            print "<script type='text/javascript' src='" . $Directory . '/' . $Entry . "'></script>\n";
            break;
          case 'css':
            print "<link rel='stylesheet' type='text/css' media='screen' href='" . $Directory . '/' . $Entry . "' />\n";
            break;
          default:
            break;
        }
      }
    }
  }
  closedir($MyDirectory);
}

// </editor-fold>
?>
