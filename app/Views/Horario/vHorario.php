<!-- App/Views/horario/registrar.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Horario</title>
</head>
<body>
    <h1>Registrar Horario</h1>
    
    
    <form action="<?= base_url('horario/registrar') ?>" method="post">
        <label for="lunes_inicio">Lunes - Inicio:</label>
        <input type="time" id="lunes_inicio" name="lunes_inicio" required>

        <label for="lunes_fin">Lunes - Fin:</label>
        <input type="time" id="lunes_fin" name="lunes_fin" required>

        <label for="martes_inicio">Martes - Inicio:</label>
        <input type="time" id="martes_inicio" name="martes_inicio" required>

        <label for="martes_fin">Martes - Fin:</label>
        <input type="time" id="martes_fin" name="martes_fin" required>

        <label for="miercoles_inicio">Miercoles - Inicio:</label>
        <input type="time" id="miercoles_inicio" name="miercoles_inicio" required>

        <label for="miercoles_fin">Miercoles - Fin:</label>
        <input type="time" id="miercoles_fin" name="miercoles_fin" required>

        <label for="jueves_inicio">Jueves - Inicio:</label>
        <input type="time" id="jueves_inicio" name="jueves_inicio" required>

        <label for="jueves_fin">Jueves - Fin:</label>
        <input type="time" id="jueves_fin" name="jueves_fin" required>

        <label for="viernes_inicio">Viernes - Inicio:</label>
        <input type="time" id="viernes_inicio" name="viernes_inicio" required>

        <label for="viernes_fin">Viernes - Fin:</label>
        <input type="time" id="viernes_fin" name="viernes_fin" required>

        <label for="sabado_inicio">Sabado - Inicio:</label>
        <input type="time" id="sabado_inicio" name="sabado_inicio" required>

        <label for="sabado_fin">Sabado - Fin:</label>
        <input type="time" id="sabado_fin" name="sabado_fin" required>

        <input type="submit" value="Guardar Horario">
    </form>
</body>
</html>

