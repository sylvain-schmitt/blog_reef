<?php
// On démarre une session
session_start();
require('helpers/function.php');

$articles = LastArticle();
$cats = selectCategory();
 // Est-ce que le existe et n'est pas vide dans l'URL
 if (isset($_GET['slug']) && !empty($_GET['slug'])) {
    require_once('db/connect.php');

    // On nettoie le slug envoyé
    $slug = strip_tags($_GET['slug']);

    $sql = "SELECT * FROM  articles  WHERE  slug = :slug ";

    // On prépare la requête
    $query = $db->prepare($sql);

    // On "accroche" les paramètre (slug)
    $query->bindValue(':slug', $slug, PDO::PARAM_STR);

    // On exécute la requête
    $query->execute();

    // On récupère l'article'
    $article = $query->fetch();

    $cat_id = $article['category_id'];
        $category = "SELECT category_name FROM category WHERE id = $cat_id";
        $req = $db->prepare($category);
        $req->execute();
        $cat = $req->fetch();
        $titles =  $cat['category_name'] ; 
        require_once('db/close.php');
 }
    $title = $titles;
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
                    <h2 class="section-heading"><?= $article['title'] ?></h2>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
            <div class="section-inner">
                <div class="container">
                    <div class="row">
                        <div id="post-content" class="col-sm-8 col-sm-offset-2 blog-item mb60 wow">
                            <div class="row">
                                <div class="col-sm-12 single-post-content">
                                    <p><?= $article['content'] ?></p>
                                    <div data-easyshare data-easyshare-url="https://reef-aquarium.com ">
                                        <!-- Total -->
                                        <button data-easyshare-button="total">
                                            <span>Total</span>
                                        </button>
                                        <span data-easyshare-total-count>0</span>

                                        <!-- Facebook -->
                                        <button data-easyshare-button="facebook">
                                            <span>Share</span>
                                        </button>
                                        <span data-easyshare-button-count="facebook">0</span>

                                        <!-- Twitter -->
                                        <button data-easyshare-button="twitter" data-easyshare-tweet-text="">
                                            <span>Tweet</span>
                                        </button>
                                        <span data-easyshare-button-count="twitter">0</span>

                                        <!-- Google+ -->
                                        <button data-easyshare-button="google">
                                            <span>+1</span>
                                        </button>
                                        <span data-easyshare-button-count="google">0</span>

                                        <div data-easyshare-loader>Loading...</div>
                                    </div>
                                </div>
                            </div>
                        </div>

        </section>

        <section class="dark-wrapper opaqued parallax" data-parallax="scroll" data-image-src="assets/img/bg/bg6.jpg" data-speed="0.7">
            <div id="contact-tabs" role="tabpanel">

                <!-- Nav tabs -->
                <ul class="nav nav-justified icon-tabs" id="nav-tabs" role="tablist">
                    <li role="presentation" class="ptb smoothie active">
                        <a href="#contact1" aria-controls="contact1" role="tab" data-toggle="tab">
                            <span class="tabtitle heading-font smoothie text-right">Contacter Nous</span>
                        </a>
                    </li>
                    <li role="presentation" class="ptb smoothie">
                        <a href="#contact2" aria-controls="contact2" role="tab" data-toggle="tab">
                            <span class="tabtitle heading-font smoothie text-left">Localiser Nous</span>
                        </a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content" id="tabs-collapse">
                    <div role="tabpanel" class="tab-pane fade in active" id="contact1">
                        <div id="contact-inner" class="nopadding-lr">
                            <div class="contact-section-inner">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <div id="message"></div>
                                            <form method="post" action="sendemail.php" id="contactform" class="main-contact-form wow">
                                                <input type="text" class="form-control col-md-4" name="name2" placeholder="Votre Nom *" id="name" required data-validation-required-message="S'il vous plais veuillez rensseigner votre nom." />
                                                <input type="text" class="form-control col-md-4" name="email" placeholder="Votre Email *" id="email" required data-validation-required-message="S'il vous plais veuillez rensseigner votre adresse email." />
                                                <textarea name="comments" class="form-control" id="comments" placeholder="Votre Message *" required data-validation-required-message="S'il vous plais veuillez rensseigner votre message."></textarea>
                                                <input class="btn btn-primary mt30 btn-white pull-right" type="submit" name="Submit" value="Envoyer" />
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div role="tabpanel" class="tab-pane fade" id="contact2">
                        <div id="mapwrapper"></div>
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
                        <?php endforeach ?>                         </div>
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