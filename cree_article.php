<?php
require_once('../include.php');



?>





<!DOCTYPE HTML>

<html data-bs-theme="">

<head>
    <title>
        Crée un article
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
        <h2>Crée son article</h2>
    </center>
    <div id="wrapper">


        <div id="main">
            <div class="inner">

                <form class="form-sample" method="POST" enctype="multipart/form-data" id="my-form">


                    <div class="form-outline">
                        <label class="form-label" for="formControlLg">titre</label>
                        <input type="text" id="titre" name="titre" class="form-control form-control-lg" required />
                    </div>

                    <div class="form-outline">
                        <label class="form-label" for="formControlDefault">text</label>
                        <input type="text" id="text" name="text" class="form-control" />
                    </div>
                    <Br>
                    <div class="form-floating">
                        <select class="form-select" id="categorie" name="categorie" aria-label="">
                            <option selected>Open this select menu</option>
                            <?php
                            $req_cat = $DB->query("SELECT * FROM categories");
                            $req_cat = $req_cat->fetchAll();
                            foreach ($req_cat as $output) {

                                echo '<option value="' . $output['id_categorie'] . '">' . $output['nom_C'] . '</option>';
                            }
                            ?>
                        </select>
                        <label for="floatingSelect">Works with selects</label>
                    </div>
                    <Br>
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here" id="contenu" name="contenu"
                            style="height: 100px" required></textarea>
                        <label for="floatingTextarea2">Comments</label>
                    </div>
                    <br>
                    <div class="mb-3">
                    </div>
                </form>


                <form action="/_blog/fileUploadScript.php" method="post" enctype="multipart/form-data">
                    Upload a File:
                    <input type="file" name="the_file" id="fileToUpload">
                    <input type="submit" name="submit" value="Start Upload">
                </form>





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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<script>
    $(document).ready(function () {

        $("form").on("submit", function (event) {
            event.preventDefault();

            var formValues = $(this).serialize();


            $.post("_blog/sav_article.php", formValues, function (data) {
                // Display the returned data in browser
                $("#result").html(data);
                $("#btnSubmit").hide();

            });
        });

    });
</script>