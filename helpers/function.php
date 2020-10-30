<?php

function slugify($string, $delimiter = '-') {
    $oldLocale = setlocale(LC_ALL, '0');
    setlocale(LC_ALL, 'en_US.UTF-8');
    $clean = iconv('UTF-8', 'ASCII//TRANSLIT', $string);
    $clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
    $clean = strtolower($clean);
    $clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);
    $clean = trim($clean, $delimiter);
    setlocale(LC_ALL, $oldLocale);
    return $clean;
}

function selectCategory() {
    try {
        // Connexion à la base
        $db = new PDO('mysql:host=localhost;dbname=blog', 'root', '');
        $db->exec('SET NAMES "UTF8"');
    } catch (PDOException $e) {
        echo 'Erreur : ' . $e->getMessage();
        die();
    }

    // selection de toutes les colonnes de la table category
    $sql = "SELECT * FROM category";
// On prépare la requête
    $query = $db->prepare($sql);

// On exécute la requête
    $query->execute();

// On stocke le résultat dans un tableau associatif
    $categorys = $query->fetchAll(PDO::FETCH_ASSOC);
// On se déconnecte de la base
    $db = null;

    return $categorys;
}

function RecupArtCat() {
    try {
        // Connexion à la base
        $db = new PDO('mysql:host=localhost;dbname=blog', 'root', '');
        $db->exec('SET NAMES "UTF8"');
    } catch (PDOException $e) {
        echo 'Erreur : ' . $e->getMessage();
        die();
    }


    if(isset($_GET['category_id']) && !empty($_GET['category_id'])){
        
            $sql = "SELECT * FROM  articles WHERE category_id = $_GET[category_id] ORDER BY created_at DESC ";
            $query = $db->prepare($sql);
        
        // On exécute la requête
            $query->execute();
        
        // On stocke le résultat dans un tableau associatif
            $posts = $query->fetchAll(PDO::FETCH_ASSOC);
            $db = null;
        }
        return $posts;        
       
}

function RecupCat ()
{
    try {
        // Connexion à la base
        $db = new PDO('mysql:host=localhost;dbname=blog', 'root', '');
        $db->exec('SET NAMES "UTF8"');
    } catch (PDOException $e) {
        echo 'Erreur : ' . $e->getMessage();
        die();
    }

    if(isset($_GET['category_id']) && !empty($_GET['category_id'])){
    $cat = "SELECT category_name FROM category WHERE id = $_GET[category_id]";
    $req = $db->prepare($cat);
    $req->execute();
    $cate = $req->fetch();
    $db = null;
    }
    return $cate;

}

function RecupTitle()
{
    try {
        // Connexion à la base
        $db = new PDO('mysql:host=localhost;dbname=blog', 'root', '');
        $db->exec('SET NAMES "UTF8"');
    } catch (PDOException $e) {
        echo 'Erreur : ' . $e->getMessage();
        die();
    }

    if(isset($_GET['category_id']) && !empty($_GET['category_id'])){
        $cat = "SELECT category_name FROM category WHERE id = $_GET[category_id]";
        $req = $db->prepare($cat);
        $req->execute();
        $cate = $req->fetch();
        $titles =  $cate['category_name'];
        $db = null;
        }
        return $titles;
    
}

function excerpt(string $content, int $limit = 60)
    {
        if(mb_strlen($content) <= $limit){
            return $content;
        }
        $lastSpace = mb_strpos($content, ' ', $limit);
        return mb_substr($content, 0, $lastSpace) . ' ...';
    }

function LastArticle()
{
    try {
        // Connexion à la base
        $db = new PDO('mysql:host=localhost;dbname=blog', 'root', '');
        $db->exec('SET NAMES "UTF8"');
    } catch (PDOException $e) {
        echo 'Erreur : ' . $e->getMessage();
        die();
    }

        // selection de toutes les colonnes de la table category et articles avec jointure de category.id
    $sql = "SELECT * FROM category, articles  WHERE articles.category_id = category.id ORDER BY created_at DESC LIMIT 2";
    // On prépare la requête
    $query = $db->prepare($sql);

    // On exécute la requête
    $query->execute();

    // On stocke le résultat dans un tableau associatif
    $articles = $query->fetchAll(PDO::FETCH_ASSOC);
    $db = null;
    return $articles;

}

function Articles()
{
    try {
        // Connexion à la base
        $db = new PDO('mysql:host=localhost;dbname=blog', 'root', '');
        $db->exec('SET NAMES "UTF8"');
    } catch (PDOException $e) {
        echo 'Erreur : ' . $e->getMessage();
        die();
    }

        // selection de toutes les colonnes de la table category et articles avec jointure de category.id
    $sql = "SELECT * FROM category, articles  WHERE articles.category_id = category.id ORDER BY created_at DESC";
    // On prépare la requête
    $query = $db->prepare($sql);

    // On exécute la requête
    $query->execute();

    // On stocke le résultat dans un tableau associatif
    $articles = $query->fetchAll(PDO::FETCH_ASSOC);
    $db = null;
    return $articles;

}

function ArticlesByCat ()
{
    try {
        // Connexion à la base
        $db = new PDO('mysql:host=localhost;dbname=blog', 'root', '');
        $db->exec('SET NAMES "UTF8"');
    } catch (PDOException $e) {
        echo 'Erreur : ' . $e->getMessage();
        die();
    }
    // selection de toutes les colonnes de la table category et articles avec jointure de category.id 
    $sql = "SELECT * FROM category, articles  WHERE articles.category_id = category.id ORDER BY created_at DESC";
    // On prépare la requête
    $query = $db->prepare($sql);
    
    // On exécute la requête
    $query->execute();
    
    // On stocke le résultat dans un tableau associatif
    $articlesByCat = $query->fetchAll(PDO::FETCH_ASSOC);
    $db = null;
    return $articlesByCat;
    
}

