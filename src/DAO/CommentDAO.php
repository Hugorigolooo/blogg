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
        //    $comment -> setArticleId($row['article_id']);
        return $comment;
    }

//    public function getComments()
//    {
//        $sql = 'SELECT id, pseudo, content, createdAt, article_id FROM comment
//ORDER BY id DESC';
//        $result = $this->createQuery($sql);
//        $comments = [];
//        foreach ($result as $row){
//            $commentId = $row['id'];
//            $comments[$commentId] = $this->buildObject($row);
//        }
//        $result->closeCursor();
//        return $comments;
//    }
    public function getComment($articleId)
    {
        $sql = 'SELECT id, pseudo, content, createdAt, article_id FROM comment WHERE article_id = ?';
        $result = $this->createQuery($sql, [$articleId]);
        $comments = [];
//        while ($comment = $result->fetch()){
//            $comments [] = $this->buildObject($row);
        foreach ($result as $row) {
            $commentId = $row['id'];
            $comments[$commentId] = $this->buildObject($row);

        };
        $result->closeCursor();
        return $comments;
    }

    public function addComment($articleId, $pseudo, $content)
    {
        $sql = 'INSERT INTO comment (pseudo,content,createdAt,article_id) VALUES (?,?,NOW(),?)';
        $this->createQuery($sql,[$pseudo,$content,$articleId]);

    }
}