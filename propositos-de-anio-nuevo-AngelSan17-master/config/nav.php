<?php

echo "<nav class=\"navbar navbar-light bg-light\">
          <a class=\"navbar-brand\" href=\"../proposito/index.php\">Propósitos</a>
        
          <span class=\"navbar-text\"><a href=\"../usuario/perfil.php\">
            Usuario: ".$_SESSION["user"]."</a> <a href=\"../logout.php\">Salir</a>
          </span>
      </nav>";

?>
