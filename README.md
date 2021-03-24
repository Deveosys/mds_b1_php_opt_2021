# PHP Back approfondi

## Programmation Orientée Objet (POO)

La POO est une façon de concevoir et d'organiser son code.
C'est le fait d'utiliser des objets qui intéragissent entre eux pour concevoir une application.

L'intérêt est une structure générale du code plus claire, modulable et plus facile à maintenir, notamment en équipe.

Les objets offrent un excellent moyen de représenter le modèle données.

## Objets

__L'objet est un type de variable.__
Une variable qui contient elle-même des variables et des fonctions.

Un objet représente une entité (une table, une voiture, un utilisateur, un post sur un blog etc...) avec ses caractéristiques et ses capacités.

Par exemple un objet représentant un Produit pourraient avoir comme caractéristiques : 
- Un nom
- Un prix
- Une quantité

Et comme capacités : 
- Donner son prix hors taxe
- Décrémenter sa quantité 

On accède à celles-ci via une flèche sans le $ devant : 

```php
$product->name; // accès à la proprité "name" de l'objet $product
$product->getPriceTtc(); // accès à la méthode "getPriceTtc" de l'objet $product
```

Ces caractéristiques et capacités sont définies par une Classe.

*Attention : PHP permet de créer des propriétés à la volée (qui ne sont pas définies par la classe), mais c'est très déconseillé car on perd l'intérêt de la POO et rend l'utillisation des objet non prédictible.*

## Class 

__La classe est la définition d'un objet.__

C'est elle qui définit les caractéristiques et les capacités des objets qui seront créés à partir de celle-ci.

Dans une classe, les caractéristiques sont des variables qu'on appelle __Propriétés__.
Les capacités sont des fonctions qu'on appelle __Méthodes__.

Par convention on écrit une classe par fichier (ex : le fichier Product.php contient uniquement la classe Product).

Le nom d'une classe commence par une majuscule.

```php
class Personnage
{
    // Déclaration des propriétés et méthodes ici.
}
```

## Instance et Instanciation

L'instanciation est le fait de créer un objet (une instance) à partir d'un modèle (la Classe).

Pour créer une instance de classe (instanciation) et obtenir un objet, on utilise le mot-clé `new` suivi du nom de la classe et de parenthèses : 
```php
$user = new User();
```

Les instances d'une même classes sont indépendantes les unes des autres.
```php
$user1 = new User();
$user2 = new User();
```
Ici $user1 et $user2 sont 2 instance de la classe User. `$user1->name` et `$user2->name` peuvent avoir des valeurs différentes.

## $this

Pour accéder aux propriétés et méthodes d'un object depuis ses méthodes, on utilise le mot-clé `$this` 

Exemple : 
On appelle la méthode decreaseStock d'un objet Produit pour enlevé 1 à sa quantité : 
```php
$product->decreaseStock();
....
public function decreaseStock() {
    $this->stock = $this->stock - 1;
}
```

## Constructeur

Pour chaque classe on peut définir un contructeur. C'est une méthode de la classe qui a __obligatoirement__ pour nom `__construct`.

```php
public function __construct() {}
```

Le constructeur peut avoir des paramètre qui doivent être passés lors de l'instanciation d'un objet de cette classe : 

```php
public function __construct(string $name) {
    $this->setName($name);
}

...

$character = new Character("Jean");

```

## La visibilité

La notion de visibilité permet de définir l'accès aux membres de la classe (propriété / méthodes).

`public` : le membre est accessible à l'extérieur de la classe. C'est à dire depuis l'objet.

`private` : le membre n'est accessible seulement à l'intérieur de la classe avec le mot-clé `$this`

Par convention, on préfix les membres privés de classe par un underscore
```php
private $_name;
private $_life = 100;

public $age;
```

## Notion d'encapsulation

Grace à la visibilité, on peut masquer certaines partie de notre code à l'utilisateur. 

Ici l'utilisateur est la personne qui va utiliser notre code, et non la personne qui utilisera l'application.

Il est souvent inutile voire dangereux que l'utilisateur ai accès à notre code. La plupart du temps il n'a pas besoin de savoir comment ça marche exactement, et encore moins de le modifier et risquer des effets de bord.

Par convention on utilise systématiquement des accesseurs pour manipuler les propriétés d'un objet. On parle de `getters` et `setters` : 

```
class Product {
    private $_name;

    ...

    public function setName(string $name): void {
        $this->_name = $name;
    }

    public function getName(): string {
        $this->_name = $name;
    }
}
```

## Les ID

Les objets qui seront stockés plus tard en base de données possèdent toujours un ID unique. C'est une propriété de la classe.

## Header

On peut rediriger l'utilisateur grâce à l'intruction `header`.
C'est pratique par exemple pour rediriger l'utilisateur sur la page login tempts qu'il n'est pas connecté. __Il faut arrêter l'exécution du script qui appelle `header` tout de suite après avec `exit`__

```php
header('Location: login.php');
exit;
```

## Passage par référence

Lorsqu'on passe une variable en paramètre d'une fonction, celle-ci est passé par valeur. C'est à dir qu'on envoie la valeur de la variable dans la fonction mais qu'après léxecution de la fonction, la variable reste inchangée : 

```php
function addOne(int $idParam) {
    $idParam = $idParam + 1;
}

$id = 1; // la valeur de $id est 1

addOne($id); // On passe $id comme paramètre de la fonctionne addOne

// après l'éxécution de addOne, ici la valeur de $id vaut toujours 1
echo $id // => 1
```

Si on déclare l'argument `$idParam` comme recevant une référence avec l'opérateeur `&`, la valeur de la variable passée en paramètre sera modifiée : 

```php
function addOne(int &$idParam) { // Ici notez la présence du &
    $idParam = $idParam + 1;
}

$id = 1; // la valeur de $id est 1

addOne($id); // On passe $id comme paramètre de la fonctionne addOne

// après l'éxécution de addOne, ici la valeur de $id est maintenant 2
echo $id // => 2
```

## Les try catch

Les objets renvoient des erreurs de type `Exception`. Lorsqu'une `Exception` est levée (`throw` en anglais), le programme s'arrête.
Il est possible d'intercepter ces erreurs grâce à l'utilisation de `try / catch` afin de géré nous-même ce qui doit ce passer en fonction de l'erreur.

```php
try {
    // ... notre code ici
} catch (Exception $e) {
    // Lorsqu'une Exception est levée durant l'éxecution du code présent dans le bloock try,
    // le programme s'arrête dans le try et passe dans le catch, avec l'exception qui à été levée en paramètre
    echo 'Exception reçue : '.  $e->getMessage();
}
```

## PDO et les try / catch

Le catch d'exception est très utilise dans l'utilisatin de PDO puisque celui-ci est un objet.
On placera toujours nos instruction relatives à PDO dans un try / catch : 

```php
try {
    $pdo = new PDO($dsn, $user, $password);
    $stmt = $pdo->query("SELECT * FROM movies");
    // ... suite des instructions PDO
} catch (\PDOException $e) {
    echo 'Erreur avec PDO : ' . $e->getMessage();
}
```

## BDD avec PDO : INSERT avec paramètres

Pour passer des paramètres à une requête `ÌNSERT` on utilise la méthode `prepare` de pdo en plaçant autant de `?` que de paramètres qu'on a besoin de passer, puis on __bind__ les paramètres avec la méthode `bindParam` de pdo. __les valeurs des paramètres DOIVENT être stockées dans des variables avant d'être passées à la méthode `bindParam`__.
Ensuite on appelle la méthode `execute` pour éxécuter la reequête en base.


```php
$title = "James Bond";
$tmdbId = 4;
$overview = "Résumé du film";
$image = "image.jpg";

$stmt = $pdo->prepare("INSERT INTO movies (title, tmdb_id, overview, poster) VALUES (?, ?, ?, ?)");
$stmt->bindParam(1, $title);
$stmt->bindParam(2, $tmdbId);
$stmt->bindParam(3, $overview);
$stmt->bindParam(4, $image);
$stmt->execute();
```

## BDD avec PDO : SELECT avec paramètres

Pour passer des paramètres à une requête `SELECT` / `WHERE` on utilise également la méthode `prepare` de pdo en plaçant des `?` après les `=`.
Les paramètres sont passés à la fonction `execute` de pdo dans un tableau, en respectant l'ordre de la requête (ici `tmbd_id` puis `title`).

```php
$stmt = $pdo->prepare("SELECT * FROM movies WHERE tmdb=? AND title=?");

$tmdb = 5678;
$title = "Martine aux fraises";
$parameters = [$tmdb, $title];

$stmt->execute($parameters); 
$movie = $stmt->fetch();
```