<?php


    $test_name = $_POST['test_name'];
    $description = $_POST['description'];
    $num_questions = $_POST['num_questions'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>SKILL SWAP</title>
    <link rel="styleSheet" href="../FrontOffice/styleFormulaire.css">

    <script>
        function validateForm() {
            let valid = true;

            // Récupérer les éléments du formulaire
            const numQuestions = document.getElementsByName("num_questions")[0].value;
            
            for (let i = 1; i <= numQuestions; i++) {
                // Validation des champs de question
                const question = document.getElementById(`question_${i}`);
                if (question.value.trim().length < 3) {
                    alert(`La question ${i} doit contenir au moins 3 caractères.`);
                    valid = false;
                    question.focus();
                    return false;
                }

                // Validation des points pour chaque question
                const points = document.getElementById(`points_${i}`);
                if (points.value <= 0) {
                    alert(`Le nombre de points pour la question ${i} doit être supérieur à 0.`);
                    valid = false;
                    points.focus();
                    return false;
                }
                let correctAnswerSelected = false;
                // Validation des réponses pour chaque question
                for (let j = 1; j <= 4; j++) {
                    const answer = document.getElementById(`answer_${i}_${j}`);
                    if (answer && answer.value.trim().length < 1) {
                        alert(`La réponse ${j} pour la question ${i} ne doit pas être vide.`);
                        valid = false;
                        answer.focus();
                        return false;
                    }
                    if (radio.checked) {
                        correctAnswerSelected = true;
                    }
                }

                if (!correctAnswerSelected) {
                    alert(`Veuillez sélectionner la bonne réponse pour la question ${i}.`);
                    valid = false;
                    return false;
                }
                
            }
            return valid;
        }
    </script>



</head>
<body>

<h2 align='center'>Ajouter un Nouveau Test - Étape 2</h2>

<form align='center'action="afficherliste.php" method="post"  onsubmit="return validateForm()">
    <!-- Champs cachés pour transférer les informations de base -->
    <input type="hidden" name="test_name" value="<?php echo $test_name; ?>">
    <input type="hidden" name="description" value="<?php echo $description; ?>">
    <input type="hidden" name="num_questions" value="<?php echo $num_questions; ?>">

    <?php
    // Générer dynamiquement les champs pour chaque question
    for ($i = 1; $i <= $num_questions; $i++) {
        echo "<label for='question_$i'>Question $i :</label>";
        echo "<input type='text' id='question_$i' name='questions[]' ><br>";

        echo "<label for='points_$i'>Points :</label>";
        echo "<input type='number' id='points_$i' name='questions[$i][points]' min='1'><br>";
        for ($j = 1; $j <= 4; $j++) {
            echo '<div>';
            echo "<label for='answer_{$i}_$j'>Réponse $j :</label>";
            echo "<input type='text' id='answer_{$i}_$j' name='questions[$i][answers][]'>";
            echo '</div>';

            echo "<label for='correct_{$i}_$j'>Correct</label>";
            echo "<input type='radio' id='correct_{$i}_$j' name='questions[$i][correct][]' value='$j'>";
            echo "</div>";
        }
        echo "<br><br><br>";
    }
    ?>

    <button type="submit">Ajouter le Test</button>
</form>

</body>
</html>
