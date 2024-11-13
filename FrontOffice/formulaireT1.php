<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>SKILL SWAP</title>
    <link rel="styleSheet" href="styleFormulaire.css">
        <script src="../BackOffice/addTEST.js" defer></script>
    
</head>
<body>

<h2 align='center'>Ajouter un Nouveau Test - Étape 1</h2>

<form action="FormulaireT2.php" method="post" onsubmit="return validerFormulaire()" align='center'>
    <label for="test_name">Nom du Test :</label>
    <input type="text" id="test_name" name="test_name" >
    <p id="m1"></p>
    <br><br>
    <label for="description">Description :</label>
    <input type="text" id="description" name="description" >
    <p id="m2"></p>
    <br><br>
    <label for="num_questions">Nombre de Questions :</label>
    <input type="number" id="num_questions" name="num_questions" >
    <p id="m3"></p>
    <br><br>

    <button type="submit">Suivant</button>
</form>

</body>
</html>