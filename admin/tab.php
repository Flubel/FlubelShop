<?php
// Sample data (this would usually come from a database)
$data = [
    ['id' => 3, 'name' => 'Alice'],
    ['id' => 1, 'name' => 'Bob'],
    ['id' => 2, 'name' => 'Charlie'],
    ['id' => 4, 'name' => 'David'],
];

// Check for sort parameters
$sortKey = $_GET['sort'] ?? 'id'; // Default sort by 'id'
$sortOrder = $_GET['order'] ?? 'asc'; // Default order 'asc'

// Sort data
usort($data, function ($a, $b) use ($sortKey, $sortOrder) {
    if ($sortOrder == 'asc') {
        return $a[$sortKey] <=> $b[$sortKey];
    } else {
        return $b[$sortKey] <=> $a[$sortKey];
    }
});
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sortable Table</title>
</head>
<body>

<h2>Sortable Table</h2>

<table border="1">
    <thead>
        <tr>
            <th><a href="?sort=id&order=<?php echo $sortOrder == 'asc' ? 'desc' : 'asc'; ?>">ID</a></th>
            <th><a href="?sort=name&order=<?php echo $sortOrder == 'asc' ? 'desc' : 'asc'; ?>">Name</a></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $row): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo htmlspecialchars($row['name']); ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>
