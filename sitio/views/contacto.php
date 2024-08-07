<section class="container p-5 d-flex flex-column">
    <h1 class="text-center">Contacto</h1>
    <div class="row row-cols-1 row-cols-md-2 ">
        <form action="procesar.php" method="get" class="col d-flex flex-column mb-5" id="contactoForm">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required>

            <label for="tel">Teléfono:</label>
            <input type="tel" id="tel" name="tel" required>

            <label for="motivo">¿Por qué nos contactas?</label>
            <select id="motivo" name="motivo">
                <option value=".">Elegi tu motivo de contacto</option>
                <option value="consulta">Consulta</option>
                <option value="Pedido">Pedido</option>
                <option value="Servicio">Servicios</option>
                <option value="Reclamo">Reclamos</option>
                <option value="otros">Otros</option>
            </select>

            <label for="mensaje">Mensaje:</label>
            <textarea id="mensaje" name="mensaje" rows="4" cols="50" required></textarea>
            <button type="submit">Enviar</button>
        </form>

        <picture class="col ">
            <img src="img/form.png" class="img-fluid w-100" alt="Gracias por tu mensaje, nos gusta escucharte">
        </picture>
    </div>
</section>