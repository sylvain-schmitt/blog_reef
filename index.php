<?php
$title = "Reef-Blog";

// On démarre une session
session_start();

require('helpers/function.php');

//recupère les 2 dernier articles
$articles = LastArticle();

$posts = ArticlesByCat();

$cats = selectCategory();


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>

     <!-- Bootstrap  CSS -->
     <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/animate.css" rel="stylesheet">
    <link href="assets/css/plugins.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/pe-icons.css" rel="stylesheet">

</head>
<body id="page-top" class="index">
    
    <div class="master-wrapper">
        
        <div class="preloader">
            <div class="preloader-img">
                <span class="loading-animation animate-flicker"><img src="assets/img/loading.GIF" alt="loading"/></span>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top fadeInDown" data-wow-delay="0.5s">
            <div class="top-bar smoothie hidden-xs">
                <div class="container">
                    <div class="clearfix">
                        <ul class="list-inline social-links wow pull-left">
                            <li>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                            </li>
                        </ul>

                        <div class="pull-right text-right">
                            <ul class="list-inline">
                                <li>
                                    <div><i class="fa fa-envelope-o"></i> reef@Domain.com</div>
                                </li>
                                <li>
                                    <div class="meta-item"><i class="fa fa-mobile"></i> +33 6 80 64 86 05</div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <!-- pour affichage mobile -->
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-navigation">
                        <span class="sr-only">navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand smoothie logo logo-light" href="index.php"><img src="assets/img/logo.png" alt="logo"></a>
                </div>

                <!-- menu collapse -->
                <div class="collapse navbar-collapse" id="main-navigation">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="index.php" class="dropdown-toggle">Acceuil <span class="pe-7s-angle-down"></span></a>
                        </li>
                        <li class="dropdown">
                            <a href="list_articles.php" class="dropdown-toggle">Articles <span class="pe-7s-angle-down"></span></a>
                        </li>
                        <li><a href="javascript:void(0);" class="side-menu-trigger hidden-xs"><i class="fa fa-bars"></i></a></li>
                    </ul>
                </div>
                <!-- /menu collapse -->
            </div>
        </nav>
                <!-- / navigation -->

<section class="dark-wrapper opaqued parallax" data-parallax="scroll" data-image-src="assets/img/bg/bg.jpg" data-speed="0.7">
    <div class="section-inner pad-top-200">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mt30 wow text-center">
                    <h2 class="section-heading">Reef-Aquarium</h2>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="section-inner">
        <div class="container">
            <div class="row">

            <?php foreach($articles as $article):?>
                <div class="col-md-4 col-sm-offset-1 blog-item mb100 wow match-height">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="hover-item mb30">
                                <img src="https://picsum.photos/1200/560" class="img-responsive smoothie" alt="title">
                                <div class="overlay-item-caption smoothie"></div>
                                <div class="hover-item-caption smoothie">
                                    <h3 class="vertical-center smoothie"><a href="detail_article.php?slug=<?= $article['slug'] ?>" class="smoothie btn btn-primary page-scroll" title="voir l'article">Voir</a></h3>
                                </div>
                            </div>
                            <h2 class="post-title"><?= $article['title'] ?></h2>
                            <div class="item-metas text-muted mb30">
                                <span class="meta-item"><i class="pe-icon pe-7s-folder"></i> Publié Dans <span><?= $article['category_name'] ?></span></span>
                                <span class="meta-item"><i class="pe-icon pe-7s-date"></i> Le <span><?= $article['created_at'] ?></span></span>
                            </div>
                            <p><?= excerpt($article['content']) ?></p>
                            <a class="btn btn-primary mt30" href="detail_article.php?slug=<?= $article['slug'] ?>">Lire la suite</a>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
            </div>

            <div class="row paging text-center">
                <a class="btn btn-primary mt30" href="list_articles.php">tous les articles</a>
            </div>
        </div>
    </div>
</section>

<section class="dark-wrapper">
    <div class="section-inner">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="widget about-us-widget">
                        <h4 class="widget-title"><strong>Aquarium </strong> Récifal</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint repudiandae soluta quidem ab fuga at perferendis quis inventore voluptate facere totam omnis dignissimos placeat a id deserunt, illum pariatur quae?</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="widget">
                        <h4 class="widget-title"><strong>Articles</strong> à la une</h4>
                        <div>
                        <?php foreach($articles as $article):?>
                            <div class="media">
                                <div class="pull-left">
                                    <img class="widget-img" src="https://picsum.photos/60/60" alt="thumbnail">
                                </div>
                                <div class="media-body">
                                    <span class="media-heading"><a href="detail_article.php?slug=<?= $article['slug'] ?>"><?= $article['title'] ?></a></span>
                                    <small class="muted">Publier le <?= $article['created_at'] ?></small>
                                </div>
                            </div>
                        <?php endforeach ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="widget">
                        <h4 class="widget-title"><strong>Articles</strong> par catégorie</h4>
                        <div class="tagcloud">
                        <?php foreach($cats as $cat ): ?>
                            <a href="articles_by_cat.php?category_id=<?= $cat['id'] ?>" class="tag-link btn btn-theme btn-white btn-xs smoothie" value ="<?= $articles['category_id'] ?>" title="<?= $cat['category_name']?>"><?= $cat['category_name']?></a>
                        <?php endforeach ?> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<footer class="white-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <ul class="list-inline social-links wow">
                    <li>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                    </li>
                </ul>
            </div>

            <hr class="thin-hr" />

            <div class="col-md-12 text-center wow">
                <span class="copyright">Copyright 2020. Reef Aquarium</span>
            </div>
        </div>
    </div>
</footer>

</div>

<div class="flexpanel">
<div class="viewport-wrap">
    <div class="viewport">
        <div class="widget mb50">
            <h4 class="widget-title">Articles à la une</h4>
            <div>
            <?php foreach($articles as $article):?>
                <div class="media">
                    <div class="pull-left">
                        <img class="widget-img" src="https://picsum.photos/60/60" alt="thumbnail">
                    </div>
                    <div class="media-body">
                        <span class="media-heading"><a href="detail_article.php?slug=<?= $article['slug'] ?>"><?= $article['title'] ?></a></span>
                        <small class="muted">Publier le <?= $article['created_at'] ?></small>
                    </div>
                </div>
            <?php endforeach ?>
            </div>
        </div>
        <div class="widget mb50">
            <h4 class="widget-title"><strong>Articles Par Catégorie</strong></h4>
            <div class="tagcloud">
            <?php foreach($cats as $cat ): ?>
                <a href="articles_by_cat.php?category_id=<?= $cat['id'] ?>" class="tag-link btn btn-theme btn-white btn-xs smoothie" value ="<?= $articles['category_id'] ?>" title="<?= $cat['category_name']?>"><?= $cat['category_name']?></a>
            <?php endforeach ?>           
        </div>
        </div>
        <div class="widget about-us-widget mb50">
            <h4 class="widget-title">A propos</h4>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Odio maxime, nisi eaque, illum odit laborum voluptatum quidem itaque minima eum impedit neque nulla? Adipisci animi amet eaque voluptas reiciendis consectetur!</p>
        </div>
    </div>
</div>
</div>

<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/plugins.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script src="assets/js/init.js"></script>
    </div>

</body>
</html>