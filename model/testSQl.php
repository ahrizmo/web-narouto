<?php
$servername = "pedago01c.univ-avignon.fr";
$username = "uapv2402097";
$password = "9Gbi4K";
$dbname = "etd";

try {
    // Créer la connexion avec PDO
    $conn = new PDO("pgsql:host=$servername;dbname=$dbname", $username, $password);
    // Définir le mode d'erreur à exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Effectuer la requête SQL
    $stmt = $conn->prepare("SELECT nemp FROM emp WHERE idmgr = 7902");
    $stmt->execute();

    if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "nemp: " . $row['nemp'];
    } else {
        echo "Aucun résultat trouvé.";
    }

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$conn = null;  
?>
