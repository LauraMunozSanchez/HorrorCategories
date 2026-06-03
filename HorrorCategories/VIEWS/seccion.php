<?php
// 1. Leer el archivo JSON de las secciones del NAV
$jsonData = file_get_contents(__DIR__ . '/../BACKEND/JSON/secciones.json');
$todas_secciones = json_decode($jsonData, true);

// 2. Detectar qué sección se pide en la URL (?tipo=arte, ?tipo=videojuegos, etc.)
// Si no se especifica ninguna, ponemos 'cine_literatura' por defecto
$seccion_tipo = isset($_GET['tipo']) ? $_GET['tipo'] : 'cine_literatura';

// 3. Validar que la sección exista en el JSON
if (!array_key_exists($seccion_tipo, $todas_secciones)) {
    die("Sección no encontrada.");
}

// 4. Obtener los datos de la sección activa
$seccion_actual = $todas_secciones[$seccion_tipo];
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
    <title><?php echo htmlspecialchars($seccion_actual['titulo_seccion']); ?></title>
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="./categorias/inicioCat.php" title="Acceder a categorías">CATEGORÍAS</a></li>
                <li><a href="./seccion.php?tipo=cine_literatura" title="Acceder a cine y literatura">CINE Y
                        LITERATURA</a></li>
                <li id="logo"><a id="linkLogo" href="./index.html" title="Volver a la portada"><img
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
        <h1 id="titulo"><?php echo htmlspecialchars($seccion_actual['titulo_seccion']); ?></h1>

        <section>
            <?php foreach ($seccion_actual['items'] as $item): ?>
                <div>
                    <a href="<?php echo htmlspecialchars($item['enlace']); ?>">
                        <img src="<?php echo htmlspecialchars($item['imagen']); ?>" alt="<?php echo htmlspecialchars($item['alt']); ?>">
                    </a>
                </div>
            <?php endforeach; ?>
        </section>
    </main>

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

</body>

</html>