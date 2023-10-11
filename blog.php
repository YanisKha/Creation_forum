<?php
require_once('../include.php');


$req = $DB->query("SELECT b.*, u.pseudo , c.nom_C
    FROM blog b
    LEFT JOIN utilisateur u ON u.id = b.id_user
    LEFT JOIN categories c ON c.id_categorie = b.id_ca
    ORDER BY b.date_creation");

$req = $req->fetchAll();

?>


<!DOCTYPE HTML>

<html data-bs-theme="">

<head>
    <title>Blog</title>
    <?php
    require_once('../_head/link.php');
    require_once('../_head/script.php');
    ?>
</head>

<body class="is-preload">
    <?php
    require_once('../_menu/menu.php');
    ?>
    <br>
    <center>
        <h2>Article</h2>
    </center>

    <?php foreach ($req as $r) { ?>




        <div id="wrapper">


            <div id="main">
                <div class="inner">


                    <div class="card shadow p-3 mb-5 bg-body-tertiary rounded">
                        <img src="paysage.jpg" style="height: 200px;" class="card-img-top" alt="...">
                        <br>


                        <div class="alert alert-light" role="alert">
                            <h3 style="margin-bottom: 5px; text-transform: none;    ">
                                <?php echo $r['id'] ?>
                                <?php echo $r['titre'] ?>
                            </h3>
                        </div>
                        <div class="card-body">
                            <blockquote class="blockquote mb-0">
                                <p>
                                    <?php echo $r['text'] ?>
                                </p>
                                <footer class="blockquote-footer">écris par<cite title="Source Title">
                                        <?php echo $r['pseudo'] ?>
                                    </cite>le
                                    <?php echo date_format(date_create($r['date_creation']), 'D d M Y à H:i') ?> dans la
                                    categorie
                                    <?php echo $r['nom_C'] ?>
                                </footer>
                            </blockquote>
                        </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end"
                            style="margin-right: 5px; margin-bottom: 5px;">

                            <a type="button" class="btn btn-outline-dark"
                                href="_blog/voir_blog.php/?id=<?php echo $r['id'] ?>" value="<?php echo $r['id'] ?>"
                                style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem; width: 120px">
                                voir + </a>
                        </div>



                    </div>



                    <!-- inner -->
                </div>

                <!-- main -->

            </div>
        </div>

    <?php } ?>
    <nav class="sticky">
        <a href="_blog/cree_article" class="btn btn-secondary" tabindex="-1" role="button" aria-disabled="true">Crée
            un article</a>
    </nav>
    <?php
    require_once('../_footer/footer.php');
    ?>
</body>

</html>

<style>
    .sticky {
        padding: 10px;
        position: fixed;
        right: 30px;
        bottom: 30px;
    }
</style>