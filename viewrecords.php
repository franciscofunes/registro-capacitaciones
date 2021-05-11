<?php
    $title = 'Ver regisros';
    require_once 'includes/header.php';
    require_once 'db/conn.php';

    $results = $crud->getAttendees();
?>
<div class="container">
    <div class="table-responsive mt-5 mb-2">
        <table class="table table-hover table-stripe">
            <thead >
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Nacimiento</th>
                        <th>Correo Electrónico</th>
                        <th>Empresa</th>
                        <th>Acciones</th>
                    </tr>
            </thead>
        <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
                <tbody>     
                    <tr>
                        <td><?php echo $r['attendee_id']?></td>
                        <td><?php echo $r['firstname']?></td>
                        <td><?php echo $r['lastname']?></td>
                        <td><?php echo $r['dateofbirth']?></td>
                        <td><?php echo $r['emailaddress']?></td>
                        <td><?php echo $r['name']?></td>
                        <td>
                            <a href="view.php?id=<?php echo $r['attendee_id']?>" class="btn btn-primary">Ver</a>
                            <a href="edit.php?id=<?php echo $r['attendee_id']?>" class="btn btn-warning">Editar</a>
                            <a onclick="return confirm('¿Está seguro de eliminar este registro?');"
                            href="delete.php?id=<?php echo $r['attendee_id']?>" class="btn btn-danger">Eliminar</a>
                        </td>
                    </tr>
                </tbody>
            <?php } ?>
        </table>
    </div>
</div>
<?php require_once 'includes/footer.php'; ?>