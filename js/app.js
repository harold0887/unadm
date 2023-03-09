$(function () {
  var pathname = window.location.pathname;
  var ruta = pathname.substring(17, 50);
  console.log(ruta);

  switch (ruta) {
    case "index.php":
      $("#index").addClass("active");
      break;

    case "register.php":
      $("#register").addClass("active");
      break;

    case "welcome.php":
      $("#welcome").addClass("active");
      break;

    case "login.php":
      $("#login").addClass("active");
      break;

      case "consulta.php":
      $("#consulta").addClass("active");
      break;
      case "preinscribir.php":
        $("#preinscribir").addClass("active");
        break;
    default:
      break;
  }
});
