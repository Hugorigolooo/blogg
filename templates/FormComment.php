<!--    Formulaire HTML pour ajouter un commentaire -->
<form action="../index.php?route=addComment&articleId=<?= $articleId; ?>" method="post">
    <label for="pseudo">Pseudo :</label><br>
    <input type="text" id="pseudo" name="pseudo" required
    value=<?= isset($post) ? htmlspecialchars($post->get('pseudo')) : '';?>><br><br>

    <label for="commentaire">Commentaire :</label><br>
    <textarea id="commentaire" name="content" rows="4" cols="50" required>
        <?= isset($post) ? htmlspecialchars($post->get('content')) : '' ?>
    </textarea><br><br>

    <input type="submit" value="Envoyer">
</form>





