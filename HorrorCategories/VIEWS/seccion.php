<?php
$jsonData = file_get_contents(__DIR__ . '/../BACKEND/JSON/secciones.json');

$allCat = json_decode($jsonData, true);

if (isset($_GET['id'])) {
    $secId = $_GET['id'];
} else {
    $secId = 'cineYLiteratura';
}

    $actualCat = $allCat[$secId];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Laura Muñoz Sánchez">

    <link rel="icon" type="image/png" href="../IMG/favicon.png">
    <link rel="stylesheet" href="../ASSETS/CSS/nav.css">
    <link rel="stylesheet" href="../ASSETS/CSS/stay.css">
    <link rel="stylesheet" href="../ASSETS/CSS/footer.css">
    <link rel="stylesheet" href="../ASSETS/CSS/categorias/inicio-cat.css">
    <title><?php echo htmlspecialchars($actualCat['tituloPagina']); ?></title>
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="./categorias/inicioCat.php" title="Acceder a categorías">CATEGORÍAS</a></li>
                <li><a href="./seccion.php?id=cineYLiteratura" title="Acceder a cine y literatura">CINE Y LITERATURA</a></li>

                <li id="logo"><a id="linkLogo" href="./inicio.php" title="Volver a la portada"><img src="../ASSETS/IMG/logoNav.png" alt="Logo de Horror Categories"></a></li>

                <li><a href="./seccion.php?id=arte" title="Acceder a arte">ARTE</a></li>
                <li><a href="./seccion.php?id=videojuegos" title="Acceder a videojuegos">VIDEOJUEGOS</a></li>

                <li id="search">
                    <form>
                        <input list="busquedas" id="barra" placeholder="Buscar...">
                        <datalist id="busquedas">
                            <option value="categorias">categorias</option>
                            <option value="arte">arte</option>
                            <option value="cine y literatura">cine y literatura</option>
                            <option value="videojuegos">videojuegos</option>
                            <option value="paranormal">paranormal</option>
                            <option value="monster">monster</option>
                            <option value="killer">killer</option>
                            <option value="psychological">psychological</option>
                        </datalist>
                        <button type="submit" id="botonBuscar" title="Buscar"><img src="../ASSETS/IMG/lupaNav.png" alt="Buscar"></button>
                    </form>
                </li>
            </ul>
        </nav>
    </header>
    <main>
        <h1 id="titulo"><?php echo htmlspecialchars($actualCat['tituloSeccion']); ?></h1>

        <section>
            <?php foreach ($actualCat['items'] as $item){
                echo '<div>';
                echo '<a href="' . htmlspecialchars($item['enlace']) . '">';
                echo '<img src="' . htmlspecialchars($item['imagen']) . '" alt="' . htmlspecialchars($item['alt']) . '">';
                echo '</a>';
                echo '</div>';
            } ?>
        </section>
    </main>

    <?php include '../BACKEND/PHP/footer.php'; ?>

</body>

</html>