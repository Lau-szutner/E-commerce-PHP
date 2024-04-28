
<h1 class="text-center">Contacto</h1>
<section class="container seccionContenedor">
    <div class="row row-cols-md-2"> 

        <form action="procesar.php" method="get" class="col">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required>

            <label for="tel">Teléfono:</label>
            <input type="tel" id="tel" name="tel" required>

            <label for="motivo">¿Por qué nos contactas?</label>
            <select id="motivo" name="motivo" required>
                <option value=".">Elegi tu motivo de contacto</option>
                <option value="consulta">Consulta</option>
                <option value="Pedido">Pedido</option>
                <option value="Servicio">Servicios</option>
                <option value="Reclamo">Reclamos</option>
                <option value="otros">Otros</option>
            </select>

            <label for="mensaje">Mensaje:</label>
            <textarea id="mensaje" name="mensaje" rows="4" cols="50"required></textarea>
            <input type="submit" value="Enviar" class="btn bg-amarillo">


        </form>

        <picture class="col">
            <img src="img/form.png" alt="foto de formulario de contacto">
        </picture>



</section>