<?php

include 'database.php';
$artikelen = $db->query("SELECT id, naam, beschrijving, prijs, voorraad FROM artikelen");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $verkooporderId = $_POST['verkooporder_id'];
    $artikelId = $_POST['artikel_id'];
    $aantal = $_POST['aantal'];
    
    $stmt = $db->prepare("INSERT INTO verkooporder_artikel (verkooporder_id, artikel_id, aantal) VALUES (?, ?, ?)");
    $stmt->execute([$verkooporderId, $artikelId, $aantal]);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Verkooporder Aanmaken</title>
</head>
<body>
    <h1>Verkooporder Aanmaken</h1>
    <form method="post">
        <input type="hidden" name="verkooporder_id" value="1"> <!-- Statisch voor nu -->
        <table>
            <tr>
                <th>Selecteer</th>
                <th>Naam</th>
                <th>Beschrijving</th>
                <th>Prijs</th>
                <th>Voorraad</th>
                <th>Aantal</th>
            </tr>
            <?php foreach ($artikelen as $artikel): ?>
                <tr>
                    <td><input type="radio" name="artikel_id" value="<?= htmlspecialchars($artikel['id']) ?>"></td>
                    <td><?= htmlspecialchars($artikel['naam']) ?></td>
                    <td><?= htmlspecialchars($artikel['beschrijving']) ?></td>
                    <td><?= htmlspecialchars($artikel['prijs']) ?></td>
                    <td><?= htmlspecialchars($artikel['voorraad']) ?></td>
                    <td><input type="number" name="aantal" min="1" max="<?= htmlspecialchars($artikel['voorraad']) ?>"></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <button type="submit">Voeg toe aan Verkooporder</button>
    </form>
</body>
</html>