<?php
$jsonData = file_get_contents(__DIR__ . '/../../BACKEND/JSON/inicio-icat.json');

$datos = json_decode($jsonData, true);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Laura Muñoz Sánchez">

    <link rel="icon" type="image/png" href="../../ASSETS/IMG/favicon.png">
    <link rel="stylesheet" href="../../ASSETS/CSS/nav.css">
    <link rel="stylesheet" href="../../ASSETS/CSS/stay.css">
    <link rel="stylesheet" href="../../ASSETS/CSS/footer.css">
    <link rel="stylesheet" href="../../ASSETS/CSS/categorias/inicio-cat.css">

    <title> ✡ ℍ𝕠𝕣𝕣𝕠𝕣 ℂ𝕒𝕥𝕖𝕘𝕠𝕣𝕚𝕖𝕤 ✡ | ℂ𝕒𝕥𝕖𝕘𝕠𝕣𝕚𝕒𝕤 </title>
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="./inicioCat.php" title="Acceder a categorías">CATEGORÍAS</a></li>
                <li><a href="../seccion.php?id=cineYLiteratura" title="Acceder a cine y literatura">CINE Y LITERATURA</a></li>

                <li id="logo"><a id="linkLogo" href="../inicio.php" title="Volver a la portada"><img src="../../ASSETS/IMG/logoNav.png" alt="Logo de Horror Categories"></a></li>

                <li><a href="../seccion.php?id=arte" title="Acceder a arte">ARTE</a></li>
                <li><a href="../seccion.php?id=videojuegos" title="Acceder a videojuegos">VIDEOJUEGOS</a></li>

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
                        <button type="submit" id="botonBuscar" title="Buscar"><img src="../../ASSETS/IMG/lupaNav.png" alt="Buscar"></button>
                    </form>
                </li>
            </ul>
        </nav>
    </header>

    <main>
        <h1 id="titulo"><?php echo htmlspecialchars($datos['titulo']['tituloCat']); ?></h1>

        <section>
            <!-- Recorre el array catPrincipales, cada elemento se guarda temporalmente en $cat -->
            <!-- Por cada elemento muestra un div con un enlace a la categoría y una imagen -->
            <?php foreach ($datos['catPrincipales'] as $cat) {
                echo '<div>';
                echo '<a href="' . htmlspecialchars($cat['enlace']) . '">';
                echo '<img src="' . htmlspecialchars($cat['imagen']) . '" alt="' . htmlspecialchars($cat['alt']) . '">';
                echo '</a>';
                echo '</div>';
            } ?>
        </section>

        <section>
            <table>
                <caption><?php echo htmlspecialchars($datos['titulo']['tituloExtras']); ?></caption>

                <!-- Recorre el array filas, cada elemento se guarda temporalmente en $fila -->
                <?php foreach ($datos['tablaExtras']['filas'] as $fila) {
                    // Por cada elemento muestra una fila de la tabla, y por cada celda muestra un enlace con una imagen dentro de la celda
                    echo '<tr>';

                    foreach ($fila as $celda) {
                        echo '<td>';
                        echo '<a href="' . htmlspecialchars($celda['enlace']) . '" target="_blank">';
                        echo htmlspecialchars($celda['nombre']);
                        echo '</a>';
                        echo '</td>';
                    }

                    echo '</tr>';
                }
                ?>
            </table>
        </section>

        <a href="#titulo" title="Volver a la parte superior" id="volverArriba">VOLVER ARRIBA</a>
    </main>

    <?php include '../../BACKEND/PHP/footer.php'; ?>
</body>

</html>