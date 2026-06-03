<?php
    // Lee el contenido del archivo JSON
    $jsonData = file_get_contents(__DIR__ . '/../../BACKEND/JSON/inicioCat.json'); 

    // Decodifica el JSON a un array asociativo de PHP
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
                <li><a href="../seccion.php?tipo=cine_literatura" title="Acceder a cine y literatura">CINE Y LITERATURA</a></li>
                <li id="logo"><a id="linkLogo" href="../inicio.php" title="Volver a la portada"><img src="../../ASSETS/IMG/logoNav.png" alt="Logo de Horror Categories"></a></li>
                <li><a href="../seccion.php?tipo=arte" title="Acceder a arte">ARTE</a></li>
                <li><a href="../seccion.php?tipo=videojuegos" title="Acceder a videojuegos">VIDEOJUEGOS</a></li>

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
                            <option value="gore">gore</option>
                        </datalist>
                        <button type="submit" id="botonBuscar" title="Buscar"><img src="../../ASSETS/IMG/lupaNav.png" alt="Buscar"></button>
                    </form>
                </li>
            </ul>
        </nav>
    </header>

    <main>
        <h1 id="titulo"><?php echo htmlspecialchars($datos['titulo']); ?></h1>
        
        <section>
            <?php foreach ($datos['categorias_principales'] as $cat): ?>
                <div>
                    <a href="<?php echo htmlspecialchars($cat['enlace']); ?>">
                        <img src="<?php echo htmlspecialchars($cat['imagen']); ?>" alt="<?php echo htmlspecialchars($cat['alt']); ?>">
                    </a>
                </div>
            <?php endforeach; ?>
        </section>

        <section>
            <table>
                <caption><?php echo htmlspecialchars($datos['tabla_extras']['titulo']); ?></caption>

                <?php foreach ($datos['tabla_extras']['filas'] as $fila): ?>
                    <tr>
                        <?php foreach ($fila as $celda): ?>
                            <td>
                                <a href="<?php echo htmlspecialchars($celda['enlace']); ?>" target="_blank">
                                    <?php echo htmlspecialchars($celda['nombre']); ?>
                                </a>
                            </td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            </table>
        </section>

        <a href="#titulo" title="Volver a la parte superior" id="volverArriba">VOLVER ARRIBA</a>
    </main>

    <footer>
        <div class="footer-content">
            <h3>HORROR CATEGORIES</h3>
            <p>Un recorrido por el miedo en el cine, los videojuegos, el arte y la literatura.</p>
            <p class="footerInfo">Cine • Videojuegos • Arte • Literatura</p>
            <p class="footerLinks">
                <a href="https://github.com/LauHopps" target="_blank">GitHub</a> ·
                <a href="https://joinmastodon.org/es" target="_blank">Mastodon</a> ·
                <a href="mailto:laurams007es@gmail.com">Contacto</a>
            </p>
            <div class="footerBottom">
                <p>© 2026 Horror Categories — Todos los derechos reservados</p>
            </div>
        </div>
    </footer>
</body>
</html>