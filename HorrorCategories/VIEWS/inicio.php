<?php
    $jsonData = file_get_contents(__DIR__ . '/../BACKEND/JSON/inicio.json'); // Lee el contenido del archivo JSON

    $datos = json_decode($jsonData, true); // Decodifica el JSON a un array asociativo de PHP
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Laura Muñoz Sánchez">

    <link rel="icon" type="image/png" href="../ASSETS/IMG/favicon.png">
    <link rel="stylesheet" href="../ASSETS/CSS/nav.css">
    <link rel="stylesheet" href="../ASSETS/CSS/footer.css">
    <link rel="stylesheet" href="../ASSETS/CSS/inicio.css">

    <title> ✡ ℍ𝕠𝕣𝕣𝕠𝕣 ℂ𝕒𝕥𝕖𝕘𝕠𝕣𝕚𝕖𝕤 ✡ | 𝕀𝕟𝕚𝕔𝕚𝕠 </title>
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="./categorias/inicioCat.php" title="Acceder a categorías">CATEGORÍAS</a></li>
                <li><a href="./seccion.php?tipo=cine_literatura" title="Acceder a cine y literatura">CINE Y
                        LITERATURA</a></li>
                <li id="logo"><a id="linkLogo" href="../index.html" title="Volver a la portada"><img
                            src="../ASSETS/IMG/logoNav.png" alt="Logo de Horror Categories"></a></li>
                <!-- Solo en el inicio redirige a la portada, en las demas paginas redirige al inicio -->
                <li><a href="./seccion.php?tipo=arte" title="Acceder a arte">ARTE</a></li>
                <li><a href="./seccion.php?tipo=videojuegos" title="Acceder a videojuegos">VIDEOJUEGOS</a></li>

                <!-- Barra de búsqueda -->
                <!-- Datalist que simula el comportamiento de un campo de búsqueda con sugerencias -->
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
                        <button type="submit" id="botonBuscar" title="Buscar"><img src="../ASSETS/IMG/lupaNav.png"
                                alt="Buscar"></button>
                    </form>
                </li>
            </ul>
        </nav>
    </header>

    <main>
        <div id="titulo">
            <div>
                <div>
                    <h1><?php echo $datos['titulo']['linea1']; ?></h1>
                </div>
                <div>
                    <h1><?php echo $datos['titulo']['linea2']; ?></h1>
                </div>
            </div>
            <div>
                <img src="<?php echo $datos['titulo']['imagen_interrogacion']; ?>" alt="Signo de interrogación">
            </div>
        </div>

        <section>
            <p class="LoPar"><?php echo $datos['introduccion']; ?></p>
        </section>

        <section>
            <?php foreach ($datos['bloques_contenido'] as $bloque): ?>
                <?php if ($bloque['tipo'] === 'imagen'): ?>
                    <div>
                        <img src="<?php echo $bloque['src']; ?>" alt="<?php echo $bloque['alt']; ?>">
                    </div>
                <?php elseif ($bloque['tipo'] === 'texto'): ?>
                    <div>
                        <p><?php echo $bloque['contenido']; ?></p>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </section>

        <section>
            <p class="LoPar"><?php echo $datos['conclusion']; ?></p>
        </section>

        <!-- Boton que te lleva a las categorias -->
        <section>
            <a href="./categorias/inicioCat.php" title="Acceder a categorías">EXPLORAR CATEGORÍAS</a>
        </section>

        <!-- volver arriba -->
        <a href="#titulo" title="Volver a la parte superior" id="volverArriba">VOLVER ARRIBA</a>
    </main>

    <!-- FOOTER -->
    <footer>
        <div class="footer-content">
            <h3>HORROR CATEGORIES</h3>

            <p>
                Un recorrido por el miedo en el cine, los videojuegos, el arte y la literatura.
            </p>

            <p class="footerInfo">
                Cine • Videojuegos • Arte • Literatura
            </p>

            <p class="footerLinks">
                <a href="https://github.com/LauHopps" target="_blank">GitHub</a> ·
                <a href="https://iris.aeris.synology.me/@Hoppyhopps" target="_blank">Mastodon</a> ·
                <a href="mailto:laurams007es@gmail.com">Contacto</a>
            </p>

            <div class="footerBottom">
                <p>© 2026 Horror Categories — Todos los derechos reservados</p>
            </div>
        </div>
    </footer>
    <!-- ---------------------------------------------------------------------------------------  -->

</body>

</html>