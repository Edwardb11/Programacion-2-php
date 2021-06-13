<?php
include_once '../php/pheader.php';
$resultado = MostrarTipos($link); //resultado es igual a lo que me devuelva esa funcion
?>

<div class="column is-half">
    <!-- Migas de Pan -->
    <nav class="breadcrumb" aria-label="breadcrumbs">
        <ul>
            <li><a href="../pbody.php">Inicio</a></li>
            <li class="is-active"><a href="#" aria-current="page">Unidad 04: Base de datos</a></li>
        </ul>
    </nav>
    <!-- Titulos -->
    <div class="block">
        <h1 class="title">Unidad 04:</h1>
        <h2 class="subtitle">Base de datos</h2>
    </div>

    <!-- Mensaje de alerta -->

    <?php if (!empty($_SESSION['MensajeTexto'])) { ?>
        <div class="block">
            <div class="container">
                <div class="notification <?php echo $_SESSION['MensajeTipo'] ?>">
                    <button class="delete"></button>
                    <?php echo $_SESSION['MensajeTexto'] ?>
                </div>
            </div>
        </div>
    <?php
        $_SESSION['MensajeTexto'] = null;
        $_SESSION['MensajeTipo'] = null;
    }
    //session_destroy();
    ?>

    <!-- Contenido -->
    <div class="block">
        <div class="columns">
            <div class="column is-5">
                <form action="grupo-crud.php?accion=INS" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <div class="field">
                        <label class="label"> Descripcion </label>
                        <div class="control">
                            <input class="input" type="text" name="descripcion" id="descripcion" placeholder="Descripcion" require>
                        </div>
                    </div>

                    <div class="field is-grouped">
                        <p class="control">
                            <input class="button is-primary" type="submit" value="Guardar " name="guardar">
                        </p>
                        <p class="control">
                            <input class="button is-light" type="reset">
                        </p>
                    </div>
                </form>
            </div>
            <div class="column is-7">
                <div class="table-container">
                    <table class="table is-fullwidth">
                        <thead>
                            <th> Tipo de Usuario</th>
                            <th> Estado</th>
                            <th></th>
                            <th></th>
                        </thead>
                        <tbody>

                            <?php
                            //este while va a recorrer en array me va a devolver posicion por posicion lo que 
                            //esta en la variable resultado y de la forma que lo vas hacer es mysqli
                            //es decir crear un arreglo de la forma asociativa cada posicion me lo va a retornar como una columna
                            while ($row = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) { ?>
                                <tr>
                                    <td> <?php echo $row['descripcion'] ?> </td>
                                    <td> <?php if ($row['estado'] == 'A') {
                                                echo "Activo";
                                            } else {
                                                echo "Inactivo";
                                            } ?> </td>
                                    <td> <a class="button is-info" data-toggle="tooltip" data-placement="top" title="Editar" name="editar" href="grupo-editar.php?accion=UDT&id=<?php echo $row['grupoid'] ?>"> <i class="fas fa-edit"></i> </a> </td>
                                    <td> <a class="button is-danger" data-toggle="tooltip" data-placement="top" title="Anular" name="anular" href="grupo-crud.php?accion=DLT&id=<?php echo $row['grupoid'] ?>"> <i class="fas fa-trash"> </i> </a> </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>
</div>

<?php
include_once '../php/pfooter.php';
?>