<?php
    $title = 'Registro exitoso';
    require_once 'includes/header.php';
    require_once 'db/conn.php';
    require_once 'sendemail.php';

    if(isset($_POST['submit'])){
        //extract values from the $_POST array
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $contact = $_POST['phone'];
        $specialty = $_POST['specialty'];

        $orig_file = $_FILES['avatar']['tmp_name'];
        $ext = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
        $target_dir = 'uploads/';
        $destination = "$target_dir$contact.$ext";
        move_uploaded_file($orig_file,$destination);

        
        //Call function to insert and track if success or not
        $isSuccess = $crud->insertAttendees($fname, $lname, $dob, $email, $contact, $specialty,$destination);
        $specialtyName = $crud->getSpecialtyById($specialty);

        if($isSuccess) {
            SendEmail::SendMail($email, 'Grupo Dehl - Registro de capacitación','Tu registro ha sido exitoso! no olvides seguirnos en nuestras redes sociales');
            include 'includes/successmessage.php';
        } else {
            include 'includes/errormessage.php';
        }
    }   
?>

<div class="container mt-5">
    <img src="<?php echo $destination; ?>" alt="avatar user image" class ="rounded-circle" style="width: 20%; height:20%;"/>
    <div class="card " style="width: 18rem;">
        <div class="card-body ">
            <h5 class="card-title"><?php echo $_POST['firstname'] . ' ' . $_POST['lastname']; ?></h5>
            <h6 class="card-subtitle mb-2 text-muted">
                <?php echo $specialtyName['name']; ?>
            </h6>
            <p class="card-text">
                Fecha de nacimiento: <?php echo $_POST['dob']?>
            </p>
            <p class="card-text">
                Correo Electrónico: <?php echo $_POST['email']?>
            </p>
            <p class="card-text">
                Télefono contacto: <?php echo $_POST['phone']?>
            </p>
        </div>
    </div>
</div>

<br><br><br>
<?php require_once 'includes/footer.php'; ?>