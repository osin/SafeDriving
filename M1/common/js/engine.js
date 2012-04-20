function CheckForm(){
  //document.getElementById('username').disabled=true;
  if(document.getElementById('form').captcha.value == "") {
  alert('Veuillez répondre à la question anti-robot, svp.');return false;}
}

function updateIndisponibilitie(el){
  $.post('../controllers/updateIndisponibilities.php',
          {
             week:el.name,
             value:el.value
          });
}