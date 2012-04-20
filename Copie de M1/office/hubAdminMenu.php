<script type="text/javascript">
  $(document).ready(function(){
    $("#admin-menu").click(function(){
      $("#admin-submenu").slideToggle("fast");
      $(this).addClass("selected").removeClass("unselected");
      $(".unselected").hide();
    });
  });
  $(document).ready(function(){
    $("#admin2-menu").click(function(){
      $("#admin2-submenu").slideToggle("fast");
      $(this).addClass("selected").removeClass("unselected");
      $(".unselected").hide();
    });
  });
  $(document).ready(function(){
    $("#admin3-menu").click(function(){
      $("#admin3-submenu").slideToggle("fast");
      $(this).addClass("selected").removeClass("unselected");
      $(".unselected").hide();
    });
  });
</script>

<ul>
  <li id="admin-menu">
    <a href="javascript:void(0)" title="Les vehicules du centres">
       Vehicules
    </a>
  </li>
  <li>
    <div id="admin-submenu" class="sub-menu unselected" style="display: none;">
      <p><a href="../office/manageVehicle.php" title="Achater ou vendre un vehicule">Gestion  </a></p>
      <p><a href="../office/moveVehicle.php" title="Migrer un compte">Déplacer un véhicule</a></p>
    </div>
  </li>
</ul>

<ul>
  <li id="admin2-menu">
    <a href="javascript:void(0)" title="Les vehicules du centres">
       Centres
    </a>
  </li>
  <li>
    <div id="admin2-submenu" class="sub-menu unselected" style="display: none;">
      <p><a href="../office/createCenter.php" title="Créer un centre">Créer un centre  </a></p>
    </div>
  </li>
</ul>

<ul>
  <li id="admin3-menu">
    <a href="javascript:void(0)" title="Les offres et prestations">
       Offres et prestations
    </a>
  </li>
  <li>
    <div id="admin3-submenu" class="sub-menu unselected" style="display: none;">
      <p><a href="../office/manageOffer.php" title="Gerer les offres publiées sur le site">Gerer les offres  </a></p>
      <p><a href="../office/managePrestation.php" title="Gérer les prestations publiées sur le site">Gerer les prestations</a></p>
    </div>
  </li>
</ul>
