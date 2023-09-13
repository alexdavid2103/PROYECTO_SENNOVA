<link rel="stylesheet" href="public/css/inicio.css">
<title>Inicio</title>

<div class="slider_landing">

    <div class="landing miSlider">
        <img src="public/img/slider-img.png" alt="">
        <section>
            <h2>
                Motors <br>
                <span>
                    Insight
                </span>
            </h2>
            <p>
                Informacion, Seguridad y Prevencion. <br>
                El dispositivo perfecto para su sistema industrial.
            </p>
        </section>
    </div>

    <div class="landing miSlider">
        <img src="public/img/slider-img2.png" alt="">
        <section>
            <h2>
                Medición <br>
                <span>
                    En Tiempo Real
                </span>
            </h2>
            <p>
                Usted puede visualizar en cualquier momento, <br>
                el estado de su sistema industrial.
            </p>
        </section>
    </div>

    <div class="landing miSlider">
        <img src="public/img/slider-img3.png" alt="">
        <section>
            <h2>
                Sistema de <br>
                <span>
                    Prevención
                </span>
            </h2>
            <p>
                Gracias a nuestros sistemas de analisis, <br>
                somos capaces de prevenir incidentes.
            </p>
        </section>
    </div>

    <div class="direcciones">
        <a href="#" class="atras" onclick="avanzaSlide(-1)">&#10094;</a>
        <a href="#" class="adelante" onclick="avanzaSlide(1)">&#10095;</a>
    </div>

    <div class="barras">
        <span class="barra active" onclick="posicionSlide(1)"></span>
        <span class="barra" onclick="posicionSlide(2)"></span>
        <span class="barra" onclick="posicionSlide(3)"></span>
    </div>

</div>

<section class="acerca_de" id="acerca_de_nosotros">
    <h2>ACERCA DE NOSOTROS</h2>
    <P>
        Somos una empresa para la medicion y analisis de motores para la prevension de
        incidentes que puedan poner en riesgo su nivel de productividad asi como accidentes
        a causa de algun fallo en el sistema de motores.
    </P>
    <img src="public/img/about-img1.png" alt="">
</section>

<section class="funcionamiento" id="funcionamiento">
    <h2>COMO FUNCIONA?</h2>
    <div class="grid_box">

        <div class="card">
            <i class="fa fa-file-text-o"></i>
            <section>
                <h3>COTIZACIÓN</h3>
                <p>Primero te ayudamos a cotizar el Servicio de acuerdo a el numero de dispositivos necesarios</p>
            </section>
        </div>

        <div class="card">
            <i class="fa fa-wrench"></i>
            <section>
                <h3>INSTALACIÓN</h3>
                <p>Te asignamos un tecnico de confianza para que se encargue de toda la instalacion</p>
            </section>
        </div>

        <div class="card">
            <i class="fa fa-search"></i>
            <section>
                <h3>ANÁLISIS</h3>
                <p>Analizamos todo el tiempo que el equipo industrial este funcionando.</p>
            </section>
        </div>

        <div class="card">
            <i class="fa fa-bar-chart"></i>
            <section>
                <h3>PRESENTACIÓN</h3>
                <p>Te presentamos toda la informacion de nuestro analisis para que tu lo puedas entender facilmente
                    en tiempo real.</p>
            </section>
        </div>

    </div>

</section>

<script src="public/js/inicio.js"></script>