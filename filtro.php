<?php

include 'db.php';

$filtro = $_GET['filtro'];

$sql = "SELECT * FROM clientes WHERE LOWER(nome) LIKE '%$filtro%' OR LOWER(email) LIKE '%$filtro%' LIMIT 10";
$result = $conn->query($sql);

$clientes = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $clientes[] = $row;
    }
}

echo json_encode($clientes);

$conn->close();
