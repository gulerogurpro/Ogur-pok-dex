<?php
require_once __DIR__ . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
try{
    $dns = "mysql:host={$_ENV['DB_HOST']};port={$_ENV['DB_PORT]};dbname={$_ENV['DB_NAME']}";
    
    $options = [
    PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => false,
    PDO::MYSQL_ATTR_SSL_CA => true,
    ];
    $utilisateur ='4Dsan2vPYqrkJA8.root';

    $motDePasse = 'CWMvl7A1O3VTl8pA';

    $connection = new PDO($dns,$utilisateur,$motDePasse,$options);

} catch (Exeption $e) {

    echo "Connection à la BDD impossible : {$e->getMessage()}";

    die();

}

// Prépare la requête

$select = $connection->query("SELECT * FROM pokemon;");

// Envoie la requête à la BDD

$pokemons = $select->fetchAll(PDO::FETCH_OBJ); 

// echo "<pre>";
// print_r($pokemons);
// echo "</pre>";
// Affiche les données en HTML

foreach ($pokemons as $pokemon) {

    echo "<h1> {$pokemon->pokemon_id},{$pokemon->pokemon_nom} </h1>";
}
?>