# projet_annuel


### Prerequisites

...

## Accéder à une page 
```
localhost/lenomdelapage.sonextension

exemple : localhost/index.php
```
## Accéder à PhpMyAdmin
http://localhost:8888/

## Start-up

...

## Made with

...

## Versions

**version:** 1.0

## Author
* **YVARS Clement** _alias_ [@clement-Yvars](https://github.com/clement-Yvars)
* **Yalicheff Sebastien** _alias_ [@syalicheff](https://github.com/syalicheff)
* **Girard Quentin** _alias_ [@Karnaa07](https://github.com/Karnaa07)

## Design pattern

```
SE METTRE SUR LA BRANCHE DEVELOPPEMENT
Singleton : Nous avons utilisé un singleton pour instancier un user . Nous avons utilisé ce singleton car un user est instancié a chaque fonction pour verifier son token (voir Core/Crud.class.php).

Observeur : Nous avons utilisé l'observeur afin de prévenir l'admin qu'une page a ete crée(voir Model/User.class.php , Model/Page.class.php , Controller/Page.class.php )

Query Builder : Nous l'avons utilisé pour simplifier les requetes sql (voir Core/MysqlBuilder.class.php et QueryBuilder.class.php).

Template Method : Nous l'avons utilisé pour regrouper le code similaire des differents crud . (voir CrudAbstract.class.php)

```
