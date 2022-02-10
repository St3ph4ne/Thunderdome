<?php

namespace Beweb\Td\Dal;


/**
 * Objet permettant d'acceder a une source de données 
 * cet objet foruni une couche d'asbstraction afin de faciliter son utilisation
 */
abstract class DAO {
	protected string $datasource;

	/**
	 * Persiste la donnée dans le ficher json
	 *
	 * @param mixed $data
	 * @return void
	 */
	abstract function persist(mixed $data);
	
	/**
	 * Charge les données json 
	 *
	 * @return array
	 */
	abstract function load(): array;
}
