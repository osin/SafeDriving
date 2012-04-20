<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <title><?php if(is_home()) { bloginfo('name'); } else { wp_title(' | ',true,'right'); bloginfo('name'); } ?></title>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    <script type="text/javascript">
        $().ready(function() {
           if ($.browser.webkit) {
              $("body").css({
                'position' : 'absolute',
                'top' : '0',
                'left' : '0',
                'bottom' : '0',
                'right' : '10px',
                'overflow-y' : 'scroll',
                'overflow-x' : 'hidden'
              })
            }
        });
    </script>
    <?php wp_head(); ?>
  </head>
  <body>


    <div id="header" class="fl">
      <div id="logo"></div>
      <div id="menu">
        <ul>
          <li><a href="./wp-login.php">Connexion / Inscription</a></li>
          <li><a href="../public/">Je suis élève</a></li>
          <li><a href="../public/offer.php">Consulter nos offres</a></li>
          <li><a href="../public/center.php">Voir nos centres</a></li>
          <li><a href="../public/vehicle.php">Parc de vehicules</a></li>
        </ul>
      </div>
    </div>


    <div id="content" class="fl">