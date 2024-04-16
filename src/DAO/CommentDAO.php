<?php

namespace App\src\DAO;
use App\src\models\Comment;

class CommentDAO extends DAO
{
    private function buildObject($row)
    {
        $comment = new Comment();
        $comment -> setId($row['id']);
        $comment -> setPseudo($row['pseudo']);
        $comment -> setContent($row['content']);
        $comment -> setCreatedAt($row['createdAt']);
        return $comment;
    }

    //Récupère les commentaires, puis les stocks dans un tableau
    public function getComment($articleId)
    {
        $sql = 'SELECT id, pseudo, content, createdAt, article_id FROM comment WHERE article_id = ?';
        $result = $this->createQuery($sql, [$articleId]);
        $comments = [];
        foreach ($result as $row) {
            $commentId = $row['id'];
            $comments[$commentId] = $this->buildObject($row);

        };
        $result->closeCursor();
        return $comments;
    }

    // Permet l'ajout d'un commentaire sous un article
    public function addComment($articleId, $pseudo, $content)
    {
        $sql = 'INSERT INTO comment (pseudo,content,createdAt,article_id) VALUES (?,?,NOW(),?)';
        $this->createQuery($sql,[$pseudo,$content,$articleId]);

    }
}