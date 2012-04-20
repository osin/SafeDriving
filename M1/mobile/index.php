<!DOCTYPE html>
<html>
  <head>
    <title>Safe Driving Mobile</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <style type="text/css">
      html { -webkit-text-size-adjust: 130%; -webkit-user-select: none; -webkit-touch-callout: none; }

      body {
        background-color: #d8e1e4;
        font: 13px "Helvetica Neue",Helvetica,Arial,Tahoma,Sans-serif;
        color: #2b3e69;
        margin: 0;
        padding: 0;
        line-height: 18px;
      }

      .text { text-shadow: 0 1px 0px rgba(255, 255, 255, 1); }

      #header {
        background-color: #009bcc; border-bottom: 1px solid #006585; color: #fff; padding: 13px;
        font-size: 20px;
        text-align: center;
        text-shadow: 0 -1px 0px rgba(0,0,0,0.3);
      }

      #content { padding: 20px; }
      input[type=text], input[type=password] {
        font-weight:bold;
        padding: 10px;
        width: 97%;
        font-size: 12px!important;
        -webkit-border-radius: .5em;
        -moz-border-radius: .5em;
        border-radius: .5em;
        background-color: #FFF;
        border: 0;
      }

      .my_button{
        font-size: 13px;
        cursor:pointer;
        font-weight:bold;
        padding: 10px;
        text-decoration: none;
        text-shadow: 0 1px 0px rgba(255, 255, 255, 1);
        margin-right: 5px;
        width: 99%;
        -webkit-border-radius: 2em;
        -moz-border-radius: 2em;
        border-radius: 2em;
      }

      .btn-gris {
        color: #555;
        border: solid 1px #eee;
        background: #e2e1dd;
        background: -webkit-gradient(linear, left top, left bottom, from(#f0f0f0), to(#e2e1dd));
        background: -moz-linear-gradient(top, #f0f0f0, #e2e1dd);
        filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#85c700', endColorstr='#85c700');
      }

      .btn-gris:hover {
        background: #e2e1dd;
        color: #555;
      }


    </style>
  </head>
  <body>
    <div id="header">Safe <strong>Driving</strong></div>

    <div id="wrapper">
      <div id="content">
        <p class="text"><strong>Identifiant</strong></p>
        <input type="text"/>
        <p class="text"><strong>Mot de passe</strong></p>
        <input type="password"/>
        <p><input type="submit" value="Se connecter" class="my_button btn-gris"/></p>

      </div>
    </div>

  </body>


</html>

