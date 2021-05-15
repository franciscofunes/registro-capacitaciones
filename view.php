<?php
    $title = 'Ver regisro';

    require_once 'includes/header.php';
    require_once 'includes/auth_check.php';
    require_once 'db/conn.php';

    // Get attendee by id

    if(!isset($_GET['id'])){
        echo "<h1 class='text-danger'>Por favor revise los detalles y vuelva a intentar</h1>";
    } else {
        $id = $_GET['id'];
        $result = $crud->getAttendeeDetails($id);     
    
?>

<div class="container mt-5">
    <div class="card" style="width: 18rem;">
        <div class="card-body ">
            <h5 class="card-title"><?php echo $result['firstname'] . ' ' . $result['lastname']; ?></h5>
            <h6 class="card-subtitle mb-2 text-muted">
                <?php echo $result['name']; ?>
            </h6>
            <p class="card-text">
                Fecha de nacimiento: <?php echo $result['dateofbirth']?>
            </p>
            <p class="card-text">
                Correo Electrónico: <?php echo $result['emailaddress']?>
            </p>
            <p class="card-text">
                Télefono contacto: <?php echo $result['contactnumber']?>
            </p>
        </div>
    </div>
    <br>
            <a href="viewrecords.php" class="btn btn-info">Volver</a>
            <a href="edit.php?id=<?php echo $result['attendee_id']?>" class="btn btn-warning">Editar</a>
            <a onclick="return confirm('¿Está seguro de eliminar este registro?');"
            href="delete.php?id=<?php echo $result['attendee_id']?>" class="btn btn-danger">Eliminar</a>
    <br>        
    <?php } ?>
    <br><br><br>
</div>
<?php require_once 'includes/footer.php' ?>