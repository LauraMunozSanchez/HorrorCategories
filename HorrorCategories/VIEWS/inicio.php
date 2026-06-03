<?php
$jsonData = file_get_contents(__DIR__ . '/../BACKEND/JSON/inicio-icat.json');
// Coge el contenido del archivo JSON ubicado en BACKEND/JSON/inicio.json y lo guarda en la variable $jsonData.
// __DIR__ constante que devuelve el directorio del archivo actual, asi en cada pagina se lee el JSON correcto sin importar la ruta relativa.

$datos = json_decode($jsonData, true);
// convierte una cadena JSON en una estructura de datos que PHP puede utilizar y lo guarda en la variable $datos.
// true hace que el resultado sea un array asociativo en lugar de un objeto.
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
                <li><a href="./seccion.php?id=cineYLiteratura" title="Acceder a cine y literatura">CINE Y LITERATURA</a></li>

                <li id="logo"><a id="linkLogo" href="../index.html" title="Volver a la portada"><img src="../ASSETS/IMG/logoNav.png" alt="Logo de Horror Categories"></a></li>

                <li><a href="./seccion.php?id=arte" title="Acceder a arte">ARTE</a></li>
                <li><a href="./seccion.php?id=videojuegos" title="Acceder a videojuegos">VIDEOJUEGOS</a></li>

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
                <img src="<?php echo $datos['titulo']['imgInterrogacion']; ?>" alt="Signo de interrogación">
            </div>
        </div>

        <section>
            <p class="LoPar"><?php echo $datos['intro']; ?></p>
        </section>

        <section>
            <!-- bloquesContenido es un array que tiene cada uno de los bloques (imagen, texto, texto, imagen)  -->
            <!-- Recorre el array bloquesContenido -->
            <!-- as: para cada elemento del array guardalo temporalmente en la variable $bloque -->
            <?php foreach ($datos['bloquesContenido'] as $bloque) {
                if ($bloque['tipo'] == 'imagen') {
                    echo '<div>';
                    echo '<img src="' . $bloque['src'] . '" alt="' . $bloque['alt'] . '">';
                    echo '</div>';
                } elseif ($bloque['tipo'] == 'texto') {
                    echo '<div>';
                    echo '<p>' . $bloque['contenido'] . '</p>';
                    echo '</div>';
                }
            } ?>
            <!-- Si el tipo es imagen: Se muestra un div con una imagen dentro
                 Si el tipo es texto: Se muestra un div con un párrafo dentro -->
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

    <?php include '../BACKEND/PHP/footer.php'; ?>

</body>

</html>