include 'database.php';
$artikelen = $db->query("SELECT naam, beschrijving, prijs, voorraad FROM artikelen");

?>

<!DOCTYPE html>
<html>
<head>
    <title>Artikelen Overzicht</title>
</head>
<body>
    <h1>Artikelen Overzicht</h1>
    <input type="text" placeholder="Zoek artikel">
    <table>
        <tr>
            <th>Naam</th>
            <th>Beschrijving</th>
            <th>Prijs</th>
            <th>Voorraad</th>
        </tr>
        <?php foreach ($artikelen as $artikel): ?>
            <tr>
                <td><?= htmlspecialchars($artikel['naam']) ?></td>
                <td><?= htmlspecialchars($artikel['beschrijving']) ?></td>
                <td><?= htmlspecialchars($artikel['prijs']) ?></td>
                <td><?= htmlspecialchars($artikel['voorraad']) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>