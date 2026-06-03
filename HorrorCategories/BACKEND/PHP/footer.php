<?php
$jsonData = file_get_contents(__DIR__ . '/../JSON/footer.json');
$footerData = json_decode($jsonData, true);
?>

<footer>
    <div class="footer-content">
        <!-- htmlspecialchars: evita inyecciones de código HTML -->
        <h3><?php echo htmlspecialchars($footerData['titulo']); ?></h3>

        <p>
            <?php echo htmlspecialchars($footerData['descripcion']); ?>
        </p>

        <!-- categorias es un array de strings -->
        <!-- implode: une los elementos de un array con un separador -->
        <p class="footerInfo">
            <?php echo implode(' • ', $footerData['categorias']); ?>
        </p>

        <p class="footerLinks">
            <?php
            // Recorre el array de links y lo guarda en la variable $link, $i es el indice del elemento actual
            foreach ($footerData['links'] as $i => $link) {
                echo '<a href="' . htmlspecialchars($link['url']) . '" target="_blank">'
                    . htmlspecialchars($link['name']) .
                    '</a>';
                // Si $i no es el ultimo elemento del array, añade un separador
                if ($i < count($footerData['links']) - 1) {
                    echo '· ';
                }
            }
            ?>
        </p>

        <div class="footerBottom">
            <p><?= htmlspecialchars($footerData['copyright']) ?></p>
        </div>

    </div>
</footer>