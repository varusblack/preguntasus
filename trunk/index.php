<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Portal de preguntas y respuestas de la Universidad de Sevilla</title>
        <link href="css/preguntasus.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div id="cabecera">
            <div id="contenedor_cabecera">
                <div id="logo">
                    <h1>PREGUNTAS US</h1>
                </div>
                <div id="usuario">
                    <fieldset>
                        <label for="email">Email:</label>
                        <input type="text" id="email" name="email" /> 
                        <label for="pass">Contraseña: </label>
                        <input type="password" id="pass" name="pass" />
                        <input type="submit" value="Login" />
                    </fieldset>
                    <a href="registrarse.php">Registrarse</a>
                </div>
            </div>
        </div>
        <div id="contenedor_cuerpo">
            ContenedorCuerpo
            <div id="preguntas">
                ContenedorPreguntas
                <div class="pregunta">
                    Pregunta
                    <div class="usuario_que_pregunta">
                        Usuario preguntador
                    </div>
                    <div class="preguntaConcreta">
                        Contenedor pregunta concreta
                        <div class="tituloPregunta">
                            Titulo de la pregunta
                        </div>
                        <div class="estadisticasPregunta">
                            Estadisticas de la pregunta
                        </div>
                    </div>
                </div>
            </div>
            <div id="columna">
                Columna
                <div id="cuadro_busqueda">
                    Cuadro de busqueda
                </div>
                <div id="etiquetas_mas_frecuentes">
                    Nube de etiquetas
                </div>
            </div>
        </div>
        <div id="pie">
            <div id="contenedor_pie">
                <div id="nombreProyecto">
                    <p>Trabajo para la asignatura
                        <br/>
                        Ampliación de Base de Datos</p>
                </div>
                <div id="autores">
                    <ul>
                        <li>Alberto Sola Nogales</li>
                        <li>Alvaro Tristancho Reyes</li>
                        <li>Antonio Jesús Viñas Sandiez</li>
                    </ul>
                </div>
            </div>
        </div>
    </body>
</html>
