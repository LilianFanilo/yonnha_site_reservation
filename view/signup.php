<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
    <?php
        include 'navbar.php';
    ?>
        <form action="./controller/controller-user.php" method="POST">
            
            <label for="login">Saisissez votre login :</label>
            <input type=text name="login"> 
    
            <label for="mail">Saisissez votre mail :</label>
            <input type="email" name="mail"> 
            
            <label for="name">Saisissez votre nom :</label>
            <input type=text name="surname"> 
            
            <label for="surname">Saisissez votre prenom :</label>
            <input type=text name="name"> 

            <label for="birthday">Saisissez votre date de naissance :</label>
            <input type=date name="birthday"> 
        
             <p>et votre mot de passe :</p>
             <input type="password" name="pwd">
             <input type=submit value= "OK">

             <input type="hidden" name="session_inscription">                 
        </form>
        <a href="index.php?action=log">Déjà un compte ? Connectez-vous !</a>
</body>
</html>