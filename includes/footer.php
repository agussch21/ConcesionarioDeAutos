<?php

?>
    <footer class="footer-oscuro">
        <div class="footer-beneficios">
            <div class="beneficio-item">
                <i class="fa-solid fa-trophy"></i>
                <div>
                    <h4>Líder de Ventas</h4>
                    <p>Argentina</p>
                </div>
            </div>
            <div class="beneficio-item">
                <i class="fa-solid fa-tag"></i>
                <div>
                    <h4>Ventas</h4>
                    <p>En menos de 30 días.</p>
                </div>
            </div>
            <div class="beneficio-item">
                <i class="fa-solid fa-percent"></i>
                <div>
                    <h4>Ofertas</h4>
                    <p>Precios Inigualables</p>
                </div>
            </div>
            <div class="beneficio-item">
                <i class="fa-solid fa-scale-balanced"></i>
                <div>
                    <h4>Compará precios</h4>
                    <p>Decidí el auto ideal</p>
                </div>
            </div>
        </div>

        <hr class="footer-divisor">

        <div class="footer-links-grid">
            <div class="footer-col">
                <h4>Sobre Nosotros</h4>
                <ul>
                    <li><a href="#">Términos y condiciones</a></li>
                    <li><a href="#">Políticas de privacidad</a></li>
                    <li><a href="index.php">MotorMarket</a></li>
                    <li><a href="contacto.php">Sé vendedor</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Más vendidos</h4>
                <ul>
                    <li><a href="catalogo.php">Chevrolet</a></li>
                    <li><a href="catalogo.php">Ford</a></li>
                    <li><a href="catalogo.php">Volkswagen</a></li>
                    <li><a href="catalogo.php">Fiat</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Contacto</h4>
                <ul>
                    <li><a href="contacto.php">Ubicación</a></li>
                    <li><a href="contacto.php">Contactá un vendedor</a></li>
                </ul>
            </div>
        </div>

        <hr class="footer-divisor">

        <div class="footer-bottom">
            <div class="footer-logo">
                MOTOR<span>MARKET</span>
            </div>
            <div class="footer-copy">
                <span>© 2026 MotorMarket. Todos los derechos reservados</span>
                <a href="#" class="footer-social-circle" aria-label="Instagram">
                    <i class="fa-brands fa-instagram"></i>
                </a>
            </div>
        </div>
    </footer>
    <?php if (isset($js)) { ?>
    <script src="js/<?php echo $js; ?>"></script>
    <?php } ?>
</body>
</html>
