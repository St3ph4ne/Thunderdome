<?php

namespace Beweb\Td\Dal;


/**
 * Objet permettant d'acceder a une source de données 
 * cet objet foruni une couche d'asbstraction afin de faciliter son utilisation
 */

class DAO
{

  private string $datasource;


  function __construct($datasource)
  {
    $this->datasource = $datasource;
  }
  // data arrive dans la fonction
  function persist(mixed $data)
  {
    // on les encode a json -> qu'on envoie dans data source
    file_put_contents($this->datasource, json_encode($data));
  }
  function load(): mixed
  {
    // on renvoie les datas (chargement de la data)
    return json_encode(file_get_contents($this->datasource), true);
  }
}
