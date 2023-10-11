<?php
require_once('../include.php');

$id = (int) ($_GET['id']);

//if (empty($id)) {
//  header('Location: ');
//exit;
//n}


$req = $DB->query(
    "SELECT b.*, u.pseudo
    FROM blog b
    LEFT JOIN utilisateur u ON u.id = b.id_user
    WHERE b.id = $id
    ORDER BY b.date_creation",
);


$req = $req->fetch();


?>


<!DOCTYPE HTML>

<html data-bs-theme="">

<head>
    <title>
        <?php echo $req['titre'] ?>
    </title>
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
    <div id="wrapper">


        <div id="main">
            <div class="inner">



                <div class="shadow p-3 mb-5 bg-body-tertiary roundedsssqa ">
                    <div class="card-header">
                        <h3 style="margin-bottom: 5px;">
                            <?php echo $req['id']; ?>
                            <?php echo $req['titre'] ?>
                        </h3>
                    </div>
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <p>
                                <?php echo $req['text'] ?>
                            </p>
                            <footer class="blockquote-footer">écris par<cite title="Source Title">
                                    <?php echo $req['pseudo'] ?>
                                </cite>le
                                <?php echo date_format(date_create($req['date_creation']), 'D d M Y à H:i') ?>
                            </footer>
                        </blockquote>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end"
                        style="margin-right: 5px; margin-bottom: 5px;">
                    </div>



                </div>

                <div class="shadow p-3 mb-5 bg-body-tertiary rounded">
                    <div>
                        <h1 class="fs-2">
                            <?php echo $req['titre'] ?>

                        </h1>

                    </div>
                    <?php echo $req['contenu'] ?>

                </div>
                <?php
                if (isset($_SESSION['id'])) {
                    ?>
                    <div
                        style="background: white; box-shadow: 0 5px 15px rgba(0, 0, 0, .15); padding: 5px 10px; border-radius: 10px; margin-top: 20px">
                        <h3>Participer à l'article</h3>

                        <div class="er-msg"></div>

                        <form class="form-sample" method="POST" enctype="multipart/form-data" id="my-form">

                            <div class="form-outline">
                                <input type="hidden" id="id_blog" name="id_blog" value="<?php echo $req['id']; ?>"
                                    class="form-control form-control-lg" />
                            </div>
                            <div class="form-outline">
                                <input type="hidden" id="pseudo" name="pseudo" value="<?php echo $req['pseudo']; ?>"
                                    class="form-control form-control-lg" />
                            </div>

                            <div class="form-group">
                                <textarea class="form-control" id="comment" name="comment" rows="4"
                                    placeholder="Écrivez-votre commentaire ..."></textarea>
                            </div>
                            <br>
                            <button type="submit" id="btnSubmit" class="">Envoyer</button>

                        </form>
                        <div id="result"></div>
                    </div>
                    <?php
                }
                ?>

                <?php
                $id_com = $req['id'];
                $req_comm = $DB->query("SELECT c.*, u.pseudo
                FROM commentaire c 
                LEFT JOIN utilisateur u on u.id = c.id_u 
                WHERE id_blog = $id_com
                ORDER BY date_crea");

                $req_comm = $req_comm->fetchAll(); ?>
                <br>
                <div class="shadow p-3 mb-5 bg-body-tertiary rounded">
                    <h3>Commentaire :</h3>



                    <?php foreach ($req_comm as $com) { ?>


                        <div style="background: #ddd; margin-top: 20px; padding: 5px 10px; border-radius: 10px">
                            <div style="font-weight: bold">
                                <?="De " . $com['pseudo'] . " : " ?>
                            </div>
                            <?= nl2br($com['comment']) ?>
                            <div style="text-align: right; font-size: 12px; color: #888">
                                Le
                                <?= $com['date_crea'] ?>
                            </div>

                        </div>



                    <?php } ?>
                    <span id="res_comment"></span>


                </div>




            </div>







            <!-- inner -->
        </div>

        <!-- main -->
    </div>
    </div>
    <?php
    require_once('../_footer/footer.php');
    ?>
</body>

</html>

<script>
    $(document).ready(function () {
        $("#res_comment").hide();
        $("#btnSubmit").click(function () {
            $("html, body").animate({
                scrollTop: $(
                    'html, body').get(0).scrollHeight
            }, 100);
        });

        $("form").on("submit", function (event) {
            event.preventDefault();

            var formValues = $(this).serialize();
            $.post("_blog/sav_comment.php", formValues, function (data) {
                // Display the returned data in browser
                $("#res_comment").append(data);
                $("#res_comment").scroll();
                $("#res_comment").show("slow");

                //$("#res_comment").html('')

            });
        });

    });
</script>