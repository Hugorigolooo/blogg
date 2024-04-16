<?php
namespace App\src\DAO;
use App\src\models\Article;
class ArticleDAO extends DAO
{
    private function buildObject($row)
    {
        // On "construit" notre article
        $article = new Article();
        $article->setId($row['id']);
        $article->setTitle($row['title']);
        $article->setContent($row['content']);
        $article->setAuthor($row['author']);
        $article->setCreatedAt($row['createdAt']);
        return $article;
    }

    //Permet d'afficher TOUS les articles
    public function getArticles()
    {
        $sql = 'SELECT id, title, content, author, createdAt FROM article
ORDER BY id DESC';
        $result = $this->createQuery($sql);
        $articles = [];
        foreach ($result as $row){
            $articleId = $row['id'];
            $articles[$articleId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $articles;
    }
    // Récupère les id de chaque article, ce qui permet par la suite de les afficher individuellement
    public function getArticle($articleId)
    {
        $sql = 'SELECT id, title, content, author, createdAt FROM article
WHERE id = ?';
        $result = $this->createQuery($sql, [$articleId]);
        $article = $result->fetch();
        $result->closeCursor();
        return $this->buildObject($article);
    }
}