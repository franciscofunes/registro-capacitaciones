<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- JQuery CSS -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <link rel="stylesheet" href="css/site.css">

    <title>Grupo Dehl - <?php echo $title ?></title>
  </head>
  <body>
    <div id="#topheader" class="container">
      <nav class="navbar fixed-top navbar-expand-lg navbar-dark "style="background-color:#8FD169;">
        <a class="navbar-brand" href="index.php" style="color:black;">GRUPO DEHL</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav" id="navbarNav">
            <a  class="nav-link"  href="index.php">Inicio <span class="sr-only">(current)</span></a>
            <a  class="nav-link"  href="viewrecords.php">Registros</a>
            <a  class="nav-link" target="_blank" href="https://www.grupodehl.com/curso">Capacitaciones</a>
            <a  class="nav-link" target="_blank" href="https://www.grupodehl.com/servicios">Servicios</a>
            <a  class="nav-link" target="_blank" href="https://www.grupodehl.com/cotizador-online">Cotizador</a>
            <a id="btn1" class="nav-link" target="_blank" href="https://www.grupodehl.com/contacto">Contacto</a>
          </div>
        </div>
      </nav>
    </div> 
  </body>  
</html>
<script src="
https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
</script>
<script>
        $(".nav-link").click(function() {
              
            // Select all list items
            var listItems = $(".nav-link");
            console.log(listItems);
              
            // Remove 'active' tag for all list items
            for (let i = 0; i < listItems.length; i++) {
                listItems[i].classList.remove("active");
            }
              
            // Add 'active' tag for currently selected item
            this.classList.add("active");
        });      
    </script>
<br/>