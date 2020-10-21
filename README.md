# Ejercicio de entrevista técnica

## Contexto

Gran parte de nuestro trabajo es hacer la vida más fácil a nuestros compañeros
que hacen aplicaciones (web o nativas). Para ello creamos APIs obteniendo
datos de terceros o propios.

Para este ejercicio tenemos que ayudar a nuestros compañeros a hacer una
aplicación de búsqueda y listado. 

## Requerimientos

Se deben crear 2 servicios utilizando Symfony 4:
* uno que permita buscar en base una cadena de búsqueda. El campo para filtrar será **food** y los datos a mostrar devolver serían: id, nombre y descripción.
* uno que retorne los datos necesarios para pintar una vista de detalle que indique los anteriores, pero además incluya: imagen, slogan (tagline) y cuando fue fabricada (first_brewed).

Para obtener los datos de las recetas se utilizará la API de [PunkApi].

Los servicios creados deben ser RESTful y tener como formato de salida JSON.
Elige los nombres para los endpoints, propiedades, etc que te parezcan más
adecuados y fáciles de tratar para las aplicaciones.

La solución del ejercicio debe ser enviada en un repositorio de GitHub, GitLab
o Bitbucket con el historial completo de git.

## Criterio de evaluación

* Que los servicios funcionen y devuelvan lo que se espera.
* Uso de buenas prácticas de Symfony 4.
* Programación orienta a objetos.
* Cumplimiento de [PSR-1], [PSR-2] y [PSR-4].
* Uso de [git-flow].
* Puntos extra por uso de DDD y testing.

## Notas sobre el ejercicio

* El ejercicio te llevará unas tres horas.
* Eres libre de hacer las peticiones al API como más te guste. Nosotros
  utilizamos [Guzzle], pero usa lo que prefieras.

[PunkApi]: https://punkapi.com/documentation/v2
[PSR-1]: http://www.php-fig.org/psr/psr-1/
[PSR-2]: http://www.php-fig.org/psr/psr-2/
[PSR-4]: http://www.php-fig.org/psr/psr-4/
[git-flow]: http://nvie.com/posts/a-successful-git-branching-model/
[Guzzle]: https://github.com/guzzle/guzzle
