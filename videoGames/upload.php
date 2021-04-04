<?php


// var_dump($_POST);
// var_dump($_FILES);

if (isset($_FILES["userfile"]) ) {

    if ($_FILES["userfile"]["error"] == 0) {
        $uploaddir = '/Users/MyDigitalSchool/Desktop/uploads/';
        $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

        if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
            echo "Le fichier est valide, et a été téléchargé
                   avec succès. Voici plus d'informations :\n";
        } else {
            echo "Attaque potentielle par téléchargement de fichiers.
                  Voici plus d'informations :\n";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form enctype="multipart/form-data" method="post">
        <!-- MAX_FILE_SIZE doit précéder le champ input de type file -->
        <input type="hidden" name="MAX_FILE_SIZE" value="50000000" />
        <!-- Le nom de l'élément input détermine le nom dans le tableau $_FILES -->
        Envoyez ce fichier : <input name="userfile" type="file" />
        <input type="submit" value="Envoyer le fichier" />
    </form>

</body>

</html>