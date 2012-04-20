<?php
include ('./ressources/Twitter.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Bienvenue sur Safe Driving</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Labo-Intranet Supinfo Project"/>
    <meta name="description" content="Labo-Intranet Supinfo Project" />
    <meta author="Osin, Lea, Vince, Steffi, Moy" />
    <link href="./ressources/style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="./ressources/engine.js"></script>
    <script type="text/javascript">
      window.captureEvents(Event.MOUSEDOWN);
      window.onmousedown = hideContent;
    </script>
  </head>

  <body>
    <!-- topPan-->
	<div id="topPan">
      <div id="menu" onmouseover="hide('bodyPan');" onmouseout="hide('bodyPan');">
        <ul>
          <li><span style="padding-left: 15px;">Links</span>
            <ul style="width: 300px; padding: 5px;">
              <li style="width: 292px;"><a href="http://www.steffiandmihanta.com/"><img src="http://www.steffiandmihanta.com/images/ms-icon-red.jpg" width="42" height="42" alt="MS" />Steffi & Mihanta</a></li>
              <li style="width: 292px;"><a href="http://d-ro.ch"><img width="32" height="32"  src="http://d-ro.ch/public/images/favicon.ico" width="42" height="42" alt="D-ROCH"/>D-ro.ch&nbsp;&nbsp;&nbsp;</a></li>
              <li style="width: 292px;"><a href="http://housseinitoumani.com"><img width="32" height="32"  src="https://si0.twimg.com/profile_images/1166886248/Avatar_Osin_bigger.jpg" width="42" height="42" alt="D-ROCH"/>Osin</a></li>
              <li style="width: 292px;"><a href="http://usineadesign.com"><img width="32" height="32"  src="http://a1.twimg.com/profile_images/1257492911/logo-l-usine-a-design-carre_normal.jpg" width="42" height="42" alt="D-ROCH"/>Usine à Design</a></li>
              <li style="width: 292px;"><a href="http://ysance.com"><img width="32" height="32"  src="http://a1.twimg.com/profile_images/973831396/logoHead_bigger.png" width="42" height="42" alt="D-ROCH"/>Ysance</a></li>
            </ul>
          </li>
          <li><span style="padding-left: 75px;"><a href="http://labo-intranet.orchestra.io/load/index.php" title="Acceder au Labo-Intranet">Labo Intranet</a></span></li>
          <li><span style="padding-left: 75px;"><a href="http://safe-driving.orchestra.io/M1/" title="Acceder à Safe Driving">Safe Driving</a></span></li>
        </ul>
      </div>
    </div>
    <!--bobyPan -->
    <!--bobyPan -->
    <div id="bodyPan">
      <!--leftPan -->
      <div id="leftPan">
        <div class="content">
          <h4>Safe-Driving</h4>
          <ul>
            <li>Le projet est la gestion d'une agence d'autoecole</li>
            <li>Développer par Housseini Toumani avec Steffi Rakotozafy, Elkhansaa Lachquar et Vincent Bismuth</li>
            <li>Ils en parlent <a href="http://twitter.com/#!/Osin17">Osin</a>, <a href="http://twitter.com/#!/VBismuth">Vincent</a>, <a href="http://twitter.com/#!/Steffi3rd">Steffi</a>, <a href="http://twitter.com/#!/Lea.zhanglei">Léa</a>
            <li>Projet Supinfo 2011 de M1 !</li></li>
          </ul>
          <p class="more"><a href="./M1/">accéder au Projet</a>&nbsp;</p>
        </div>
        <!--leftPan close -->
      </div>
      <!--rightPan -->

      <div id="rightPan">
        <p class="author"><span class="bigsize">&ldquo;</span>Twitter<span class="bigsize">&quot;</span></p>
        <p class="paddingtop">
          <?php $twitter = new Twitter("osin17"); ?>
          <?php echo $twitter->collectTweets() ?>
        </p>
      </div>
    </div>
    <script type="text/javascript">
      <!--
      bgMax.init(changeBackgroundColor());
      -->
    </script>
  </body>
</html>
