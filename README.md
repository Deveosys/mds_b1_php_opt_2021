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
