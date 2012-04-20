<?php
include '../common/inc/init.inc';
Begin('Inscrire un client', true, 'Inscription');
?>
<div class="" style=" width:600px;">
  <form id="form" onsubmit='return CheckForm(); return false' action='' method='post'>
    <p style="padding: 10px 0;">
      <span style="display: inline-block; width: 150px"><b>Identifiant </b></span>
      <input type="text" id="username" name="username" enabled="false" onclick="this.value=''"/><br />
      <span style="display: inline-block; width: 150px"> </span>
      <span style="display: inline-block;">Ce client est inscrit sur le blog</span>
      <input style="position: relative; top: 2px; " type="checkbox" name="wordpressUser"
             onclick="
               if(document.getElementById('username').disabled == true) {
                document.getElementById('username').value='';
                document.getElementById('username').disabled = false;
               }
               else {
                 document.getElementById('username').value='Même identifiant que le blog';
                 document.getElementById('username').disabled = true;
               }
               if(document.getElementById('mail').disabled == true) {
                document.getElementById('mail').value='';
                document.getElementById('mail').disabled = false;
               }
               else {
                 document.getElementById('mail').value='Même E-mail que le blog';
                 document.getElementById('mail').disabled = true;
               }
               "/>

    </p>
    <p style="padding: 10px 0;">
      <span style="display: inline-block; width: 150px"><b>Mot de passe </b></span>
      <input type="password" id="password" name="password"/>
    </p>
    <p style="padding: 10px 0;">
      <span style="display: inline-block; width: 150px"><b>E-mail </b></span>
      <input type="mail" id="mail" name="mail" />
    </p>
    <?php if (count($centers)>0):?>
    <p style="padding: 10px 0;">
      <span style="display: inline-block; width: 150px"><b>Type de compte </b></span>
      <select name="privilege">
        <?php foreach ($privileges as $privilege):?>
        <option value="<?php echo $privilege->id?>"/><?php echo $privilege->label?>
        <?php endforeach;?>
      </select>
    </p>

    <p style="padding: 10px 0;">
      <span style="display: inline-block; width: 150px"><b>Migration du compte</b></span>
      <select name="center">
        <?php foreach ($centers as $center):?>
        <option value="<?php echo $center->id?>"/><?php echo $center->name?>
        <?php endforeach;?>
      </select>
    </p>
    <?php endif;?>

    <p style="padding: 15px 0; margin-top: 15px; border-top: 1px dotted #ccc;">
      <span style="display: inline-block; margin-right: 10px; color: red;"><b>Combien font <?php echo $nb1; ?>+<?php echo $nb2; ?>?</b></span>
      <input class="input" type="text" size="20" name="captcha" style="width: 30px; margin-right: 10px;"/>
      <input type="submit" class="my_button btn-bleu" value="Créer un compte" style="width: 380px;"/>
    </p>

    <div>
      <?php //echo $result ?>
      <input type="hidden" name="vcaptcha" value="<?php echo $captcha_crypted; ?>"/>
    </div>

  </form>
</div>
<?php  Close();?>