<?php
// 1. Cargar y decodificar el archivo JSON de datos
$jsonData = file_get_contents(__DIR__ . '/../BACKEND/JSON/cineYLiteratura.json');
$datos = json_decode($jsonData, true);

// 2. Detectar la categoría solicitada por URL (Ej: contenido.php?cat=paranormal)
// Si no viene ninguna o no existe en el JSON, asignamos 'killer' por defecto
$cat_actual = isset($_GET['id']) ? strtolower($_GET['id']) : 'killer';

if (!array_key_exists($cat_actual, $datos['categorias'])) {
    $cat_actual = 'killer';
}

// 3. Extraer los datos específicos de la categoría activa
$info_pagina = $datos['categorias'][$cat_actual];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Página de contenido dinámico de Horror Categories.">
    <meta name="author" content="Laura Muñoz Sánchez">

    <link rel="icon" type="image/png" href="../ASSETS/IMG/favicon.png">
    <link rel="stylesheet" href="../ASSETS/CSS/nav.css">
    <link rel="stylesheet" href="../ASSETS/CSS/stay.css">
    <link rel="stylesheet" href="../ASSETS/CSS/footer.css">
    <link rel="stylesheet" href="../ASSETS/CSS/categorias/contenido.css">

    <title>✡ Horror Categories ✡ | <?php echo htmlspecialchars($info_pagina['titulo']); ?></title>
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="./categorias/inicioCat.php" title="Acceder a categorías">CATEGORÍAS</a></li>
                <li><a href="./seccion.php?tipo=cine_literatura" title="Acceder a cine y literatura">CINE Y LITERATURA</a></li>
                <li id="logo"><a id="linkLogo" href="./index.html" title="Volver a la portada"><img src="../ASSETS/IMG/logoNav.png" alt="Logo de Horror Categories"></a></li>
                <li><a href="./seccion.php?tipo=arte" title="Acceder a arte">ARTE</a></li>
                <li><a href="./seccion.php?tipo=videojuegos" title="Acceder a videojuegos">VIDEOJUEGOS</a></li>

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
                        <button type="submit" id="botonBuscar" title="Buscar"><img src="../ASSETS/IMG/lupaNav.png" alt="Buscar"></button>
                    </form>
                </li>
            </ul>
        </nav>
    </header>

    <main>
        <h1 class="titulo" id="arriba"><?php echo $info_pagina['titulo']; ?></h1>
        <p class="LoPar"><?php echo $info_pagina['descripcion']; ?></p>

        <section class="grid">
            <?php foreach ($info_pagina['cine'] as $pelicula): ?>
                <a>
                    <div class="card">
                        <iframe
                            width="580"
                            height="239"
                            src="<?php echo $pelicula['video_src']; ?>"
                            title="<?php echo $pelicula['titulo']; ?>"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen>
                        </iframe>
                        <h2><?php echo $pelicula['titulo']; ?></h2>
                        <p><?php echo $pelicula['texto']; ?></p>
                    </div>
                </a>
            <?php endforeach; ?>
        </section>

        <section class="grid">
            <?php foreach ($info_pagina['literatura'] as $libro): ?>
                <a href="<?php echo $libro['enlace']; ?>" target="_blank">
                    <div class="card">
                        <img src="<?php echo $libro['imagen']; ?>" alt="<?php echo $libro['alt']; ?>" />
                        <h2><?php echo $libro['titulo']; ?></h2>
                        <p><?php echo $libro['texto']; ?></p>
                    </div>
                </a>
            <?php endforeach; ?>
        </section>

        <a id="volverArriba" href="#arriba">VOLVER ARRIBA</a>

        <a id="volverArriba" href="./seccion.php">VOLVER ATRÁS</a>
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