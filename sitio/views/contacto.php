<section class="container p-5 d-flex flex-column">
    <h2 class="text-center">Contacto</h2>
    <div class="row row-cols-1 row-cols-md-2 ">
        <form action="procesar.php" method="get" class="col d-flex flex-column mb-5 gap-4 p-3" id="contactoForm">
            
            <label for="nombre" class="d-flex flex-column">
                Nombre:
                <input type="text" id="nombre" name="nombre" required>
            </label>

            <label for="email" class="d-flex flex-column">
                E-mail:
                <input type="email" id="email" name="email" required>
            </label>

            <label for="tel" class="d-flex flex-column">
                Teléfono:
                <input type="tel" id="tel" name="tel" required>
            </label>

            <label for="motivo" class="d-flex flex-column">
                ¿Por qué nos contactas?
                <select id="motivo" name="motivo" required>
                    <option value="" disabled selected>Elegí tu motivo de contacto</option>
                    <option value="consulta">Consulta</option>
                    <option value="pedido">Pedido</option>
                    <option value="servicio">Servicios</option>
                    <option value="reclamo">Reclamos</option>
                    <option value="otros">Otros</option>
                </select>
            </label>

            <label for="mensaje" class="d-flex flex-column">
                Mensaje:
                <textarea id="mensaje" name="mensaje" rows="4" cols="50" required></textarea>
            </label>

            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>

        <picture class="col ">
            <img src="img/form.png" class="img-fluid w-100" alt="Perro y gato felices diciendote gracias por tu mensaje, nos gusta escucharte">
        </picture>
    </div>
</section>