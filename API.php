4 - a) Agregaría una tabla nueva llamada "User" (Con datos de usuario y un id)
Cuando el mismo vota, guardaría que el usuario voto
dicha encuesta con un boolean "voto" en la tabla de Respuesta. (Con el id de la encuesta y el usuario, sabriamos si el mismo voto no)
Con eso evitariamos que el usuario pueda votar mas de uan vez
Para cumplir los requisitos, haria que la API contenga un controlador de Respuesta y encuesta, con ellos y el modelo de c/u podría hacer 
sin problema las interacciones de los datos.

Cuando el usuario desee interactuar con la respuesta, se podrá realizar, gracias a la API, las acciones que se añadan.
Por ejemplo:

//En APIRespuestaController
function DeleteRespuesta($param = null){
      $id = $param[:ID];
      $data = $this->model->DeleteRespuesta($id);

      if($data == false){
        return $this->json_response("La respuesta no existe", 300);
      }
      else {
      return $this->json_response("Invalid URL", 300);
      }
  }

  Para el filtro de encuestas por titulo, aplicaría en el controlador/modelo una función para 
  pasarle el titulo lograr devolver en un listado las encuestas con ese titulo


b)
'/encuestas', 'GET', 'APIEncuestaController', 'getEncuestas'
'/encuestas/voted', 'GET', 'APIEncuestaController', 'getEncuestasByVote'
'/encuestas/ID', 'GET', 'APIEncuestaController', 'getEncuestasByID'
'/borrar-respuesta/ID, 'DELETE', 'APIRespuestaController', 'deleteRespuesta'
'post-respuesta', 'POST', 'APIRespuestaController', 'postRespuesta'



