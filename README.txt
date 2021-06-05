Endpoint: http://localhost/PHPMailer/Backend/endpoints/crearPelicula.php

Desc: Inserta los datos ingresados en la base de datos y notifica al profesor mediante un email a "rodrigoalbano@anima.edu.uy". La ID es auto-generada y el estado siempre es 1.

Body (JSON):
{
    "Nombre" : "Name",
    "Img" : "Img link"
} 
---------------------------------------------------------------------------------------------------------------
Endpoint: http://localhost/PHPMailer/Backend/endpoints/movieSearch.php

Desc: Realiza una busqueda en la base de datos (Filtrando por ID) y devuelve todos los valores del registro. En caso de que no se encuentre ninguno, se le informa en la response.

Body (JSON):
{
    "idPelicula" : "<ID>"
}
---------------------------------------------------------------------------------------------------------------
Endpoint: http://localhost/PHPMailer/Backend/endpoints/visualizarPeliculas.php

Desc: Devuelve todos los registros de la base de datos (en un array de objetos).

Body (JSON): N/A
---------------------------------------------------------------------------------------------------------------

Kevin Mora Pais