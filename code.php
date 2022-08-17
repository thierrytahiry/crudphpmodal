<?php

    require 'dbcon.php';

if(isset($_POST['delete_etudiant']))
{
    $etudiant_id = mysqli_real_escape_string($con, $_POST['etudiant_id']);

    $query = "DELETE FROM etudiants WHERE id='$etudiant_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Suppresion reçu avec succes'
        ];
        echo json_encode($res);
        return false;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Suppresion à echoué'
        ];
        echo json_encode($res);
        return false;
    }
}

if (isset($_POST['update_etudiant'])) {
    $etudiant_id= mysqli_real_escape_string($con, $_POST['etudiant_id']);
    $nom = mysqli_real_escape_string($con, $_POST['nom']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $telephone = mysqli_real_escape_string($con, $_POST['telephone']);
    $cours = mysqli_real_escape_string($con, $_POST['cours']);

    if ($nom == NULL || $email == NULL || $telephone == NULL || $cours == NULL) {
        $res = [
            'status' => 422,
            'message' => 'Tous non mandatory'
        ];
        echo json_encode($res);
        return false;
    }

    $query = "UPDATE etudiants SET nom='$nom', email='$email', telephone='$telephone', cours='$cours' WHERE id='$etudiant_id'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'Etudiants modifié avec succes'
        ];
        echo json_encode($res);
        return false;
    } else {
        $res = [
            'status' => 422,
            'message' => 'Modification à echoué'
        ];
        echo json_encode($res);
        return false;
    }
}


if(isset($_GET['etudiant_id']))
{
    $etudiant_id = mysqli_real_escape_string($con, $_GET['etudiant_id']);

    $query = "SELECT * FROM etudiants WHERE id='$etudiant_id'";
    $query_run = mysqli_query($con, $query);

    if(mysqli_num_rows($query_run) == 1)
    {
        $etudiant = mysqli_fetch_array($query_run);

        $res = [
            'status' => 200,
            'message' => 'etudiant fetch succes evec id',
            'data'  =>$etudiant
        ];
        echo json_encode($res);
        return false;
    }
    else
    {
        $res = [
            'status' => 404,
            'message' => 'Identifinet etudiant inconnue'
        ];
        echo json_encode($res);
        return false;
    }
}


if(isset($_POST['save_etudiant']))
{
    $nom = mysqli_real_escape_string($con, $_POST['nom']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $telephone = mysqli_real_escape_string($con, $_POST['telephone']);
    $cours = mysqli_real_escape_string($con, $_POST['cours']);

    if($nom == NULL || $email == NULL || $telephone == NULL || $cours ==NULL)
    {
        $res = [
            'status' => 422,
            'message' =>'Tous non mandatory'
        ];
        echo json_encode($res);
        return false;
    }

    $query = "INSERT INTO etudiants (nom, email, telephone, cours) VALUES ('$nom','$email','$telephone','$cours')";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'etudiants enregistre succes'
        ];
        echo json_encode($res);
        return false;
    }
    else
    {
        $res = [
            'status' => 422,
            'message' => 'etudiants non enregistre'
        ];
        echo json_encode($res);
        return false;
    }
}

?>

