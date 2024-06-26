<?php
$this->title = "Article";
use App\src\controller\FrontController;

// Instanciation du FrontController pour utiliser la méthode generateCsrfToken()
$frontController = new FrontController();
$csrfToken = $frontController->generateCsrfToken();?>

<h1>Mon blog</h1>
<p>En construction</p>
<div>
    <h2><?= htmlspecialchars($article->getTitle());?></h2>
    <p><?= htmlspecialchars($article->getContent());?></p>
    <p><?= htmlspecialchars($article->getAuthor());?></p>
    <p>Créé le : <?= htmlspecialchars($article->getCreatedAt());?></p>
</div>

<h2>Commentaire(s)</h2>

<?php
foreach ($comments as $comment)
{
    ?>
    <h3><?=htmlspecialchars($comment->getPseudo()); ?></h3>
    <p><?= htmlspecialchars($comment->getContent()); ?></p>
    <p>Écrit le : <?= htmlspecialchars($comment->getCreatedAt()); ?></p>
    <?php
}
//include "FormComment.php";

?>

<!--Formulaire d'ajout d'un commentaire-->
<form action="../public/index.php?route=addComment&articleId=<?= $article->getId(); ?>" method="post">
    <!-- Insérer le champ de jeton CSRF -->
    <input type="hidden" name="csrf_token" value="<?= $csrfToken ?>">
    <label for="pseudo">Pseudo :</label>
    <input type="text" id="pseudo" name="pseudo" required>
    <label for="commentaire">Commentaire :</label>
    <textarea id="commentaire" name="content" rows="4" cols="50" aria-required="true">
    </textarea>
    <input type="submit" value="Envoyer">
</form>



<br>
<a href="../public/index.php">Retour à l'accueil</a>