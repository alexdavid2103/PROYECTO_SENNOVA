    <footer class="footer" id="footer">
        <div class="grid_box">
            <div class="box descripcion">
                <h2>SenaTech</h2>
                <p>Somos una empresa para el cuidado de los motores electrico-industriales que le permite saber todo lo
                    que ocurre en cualquier momentazo, solo basta una conexion a internet.</p>
            </div>
            <div class="box secciones">
                <h2>Secciones</h2>
                <ul>
                    <li><a class="link" href="?controller=main&action=index">Inicio</a></li>
                    <li><a class="link" href="?controller=main&action=index#acerca_de_nosotros">Acerca de nosotros</a></li>
                    <li><a class="link" href="?controller=main&action=index#funcionamiento">Funcionamiento</a></li>
                    <?php if (isset($_SESSION['id'])) {
                        echo '<li><a class="link" href="?controller=usuario&action=salir">Salir</a></li>';
                    } else {
                        echo '<li><a class="link" href="?controller=main&action=login">Iniciar sesión</a></li>';
                    }?>
                </ul>
            </div>
            <div class="box contactanos">
                <h2>Contactanos</h2>
                <ul>
                    <li>Correo</li>
                    <li><span class="fa fa-envelope"></span>motorsinsight@gmail.com</li>
                    <li>Atencion al cliente</li>
                    <li><span class="fa fa-phone"></span>0000000000</li>
                </ul>
            </div>
            <div class="box siguenos">
                <h2>Siguenos</h2>
                <a href="https://es-la.facebook.com" target="_blank" class="fa fa-facebook"></a>
                <a href="" class="fa fa-instagram"></a>
                <a href="" class="fa fa-twitter"></a>
                <a href="" class="fa fa-linkedin"></a>
            </div>
        </div>
    </footer>

    <div class="copyright">
        Copyright &copy; 2023 Todos los derechos reservados.
    </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="public/js/scripts.js"></script>
    <script src="public/js/nav.js"></script>
    
</body>

</html>