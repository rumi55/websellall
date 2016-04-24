<?php


include_once $_SERVER['DOCUMENT_ROOT'].'/models/Article.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/models/Category.php';
class ArticleController
{
    public function actionTest(){
        echo "test!";
        return true;
    }

    public function actionOne($id = 1){
        $article = Article::getOneById($id);
        echo "Article Controller actionOne method";
        print_r($article);
        return true;
    }

    public function actionAll($page){
        $articles = Article::getAllByCategory(0, $page);
        $categories = Category::getAll();
        $view = new View();
        $view->assign('is_category', 0);
        $view->assign('categories', $categories);
        $view->assign('articles', $articles);
        $view->display("list.php");
        return true;
    }

    public function actionCategory($categoryId = 0, $page = 1){
        $articles = Article::getAllByCategory($categoryId, $page);
        $categories = Category::getAll();
        $view = new View();
        $view->assign('is_category', $categoryId);
        $view->assign('categories', $categories);
        $view->assign('articles', $articles);
        $view->display("list.php");
        return true;
    }

    public function actionTag($tagId, $page = 1){
        $articles = Article::getAllByTag($tagId, $page);
        echo "Article Controller actionTag method<br>";
        print_r($articles);
        return true;
    }

    public function actionIndex(){
        $articles = Article::getAll($page = 1);
        $categories = Category::getAll();
        $view = new View();
        $view->assign('categories', $categories);
        $view->assign('articles', $articles);
        $view->display("index.php");
        return true;
    }


}