<script type="text/javascript">
  $(document).ready(function(){
    $("#direction-menu").click(function(){
      $("#direction-submenu").slideToggle("fast");
      $(this).addClass("selected").removeClass("unselected");
      $(".unselected").hide();
    });
  });
</script>

<ul>
  <li id="direction-menu">
    <a href="javascript:void(0)" title="Les vehicules du centres">
      Interface de Direction
    </a>
  </li>
  <li>
    <div id="direction-submenu" class="sub-menu unselected" style="display: none;">
      <p><a href="../office/Meeting.php" title="Créer une session de formation">Planifier une session</a></p>
      <p><a href="../office/suscribeMeeting.php" title="Inscrires des etudiants à une formation">Convoquer des élèves</a></p>
      <p><a href="../office/changeCenter.php" title="Migrer un compte">Migrer un compte</a></p>
      <p><a href="../office/suscribe.php" title="Créer un compte">Créer un compte</a></p>
    </div>
  </li>
</ul>