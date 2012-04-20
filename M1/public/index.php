<?php
session_start();
session_unset();
session_destroy();
?>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Veuillez vous authentifier</title>
    <script type='text/javascript' src='../common/js/jquery-1.4.2.js'></script>
    <script langage="text/javascript">
      $(document).ready(function(){
        if( navigator.userAgent.match(/Android/i) ||
         navigator.userAgent.match(/webOS/i) ||
         navigator.userAgent.match(/iPhone/i) ||
         navigator.userAgent.match(/iPod/i)
         ){
         document.location.href = "../mobile/";
        }
      })
    </script>
  </head>
  <body>
<style type="text/css">

      body {
        font: 13px/1.5 "Helvetica Neue",Helvetica,Arial,Tahoma,Sans-serif;
        color: #333;
        margin: 0; padding: 0;
      }

      .text { text-shadow: 0 1px 0px rgba(255, 255, 255, 1); }

      #content { padding: 20px; }
      input[type=text], input[type=password] {
        font-weight:bold;
        padding: 10px;
        width: 98%;
        font-size: 13px!important;
        -webkit-border-radius: .5em;
        -moz-border-radius: .5em;
        border-radius: .5em;
        background-color: #FFF;
        border: 5px solid #f7f7f7;
        -moz-box-shadow: inset 0 0px 1px rgba(0, 0, 0, 0.3);
      }

      .my_button{
        font-size: 14px;
        cursor:pointer;
        font-weight:bold;
        padding: 10px;
        text-decoration: none;
        text-shadow: 0 -1px 0px rgba(0, 0, 0, 0.2);
        margin-right: 5px;
        width: 99%;
        -webkit-border-radius: 0.5em;
        -moz-border-radius: 0.5em;
        border-radius: 0.5em;
      }

      .btn-bleu {
        color: #fff;
        border: 0;
        background: #e2e1dd;
        background: -webkit-gradient(linear, left top, left bottom, from(#4acaf2), to(#009bcc));
        background: -moz-linear-gradient(top, #4acaf2, #009bcc);
      }

      .btn-bleu:hover {
        background: #009bcc;
        color: #fff;
      }

      .login { width: 300px; margin: 90px auto 0; text-align: left; }
      .error-div { padding: 10px; margin-bottom: 50px; background: #ffdfdf; border-bottom: 1px solid #ee9d9d; font-size: 13px; font-weight:bold; color:red; }
</style>
</head>

<body>
<center>
<?php if (isset($_GET['failed'])) : ?>
  <div class="error-div">Vérifier les informations que vous avez entré</div>
<?php endif; ?>


<form action="../controllers/authenticate.php" id="auth_form" method="post" autocomplete="off">

<div class="login">
  <h1>Safe Driving <img src="../common/images/car.jpg" alt="car" width="70" style="display: inline-block; top: 15px; position: relative; left: 60px;" /></h1>
  <p><input type="text" name="login" id="login" class="text" value="" autocomplete="on" /></p>
  <p><input type="password" name="password" id="password" class="text" autocomplete="off" value=""/></p>
  <p><input type="submit" value="Se connecter" class="my_button btn-bleu"></p>
</div>
</form>


</body>
</html>