<?php
    global $nom_du_site, $is_connected, $is_admin, $_SESSION, $array_cars, $patterns;
    if (!isset($_SESSION['rights'])) {
        if (strpos($_SERVER['PHP_SELF'], '/css') or strpos($_SERVER['PHP_SELF'], '/data') or
        strpos($_SERVER['PHP_SELF'], '/images') or strpos($_SERVER['PHP_SELF'], '/include') or
        strpos($_SERVER['PHP_SELF'], '/php')) {
            header("Location: ../index.php");
        }
    }
?>

<!DOCTYPE html>

<div class="formulaire" style="margin: 1%; text-align: left; width: 50%;">
    <h1 style="color: rgb(22, 22, 22);">
        <span>Ajouter un utilisateur</span>
    </h1>
    <br>

    <?php
        if (isset($_POST['add_user']) AND $_POST['add_user'] == "Ajouter") {
            echo "<strong>Formulaire envoyé !<br><p style='color:red;'>";
            if (isset($_POST['age']) AND $_POST['age'] < 18) {
                echo "L'utilisateur doit être majeur !";
            } else {
                UserPart("add", array($_POST['name'], $_POST['nickname'], $_POST['age'],
                $_POST['phone'], $_POST['mail'], $_POST['username'], $_POST['password'],
                $_POST['inscription_date'], $_POST['favoris'], $_POST['panier'], $_POST['comments']),
                "username='".$_POST['username']."' and password='".$_POST['password']."'");
            }
            echo "</strong></p>";
        }
    ?>

    <div>
        <form action="" method="post">
            <label>
                Nom :
                <input type="varchar" name="name" placeholder="Nom"
                    pattern="<?= $patterns['name']; ?>" required>
                <br><br>
                Prénom :
                <input type="varchar" name="nickname" placeholder="Prénom"
                    pattern="<?= $patterns['nickname']; ?>" required>
                <br><br>
                Age :
                <select type="int" name="age" pattern="<?= $patterns['age']; ?>" required>
                    <?php
                        for ($i=18; $i <= 100; $i++) {
                            echo "<option value='$i' >$i</option>";
                        } ?>
                </select>
                ans
                <br><br>
                Téléphone : +687
                <input type="tel" name="phone" placeholder="Numéro de téléphone"
                    pattern="<?= $patterns['phone']; ?>">
                <br><br>
                Adresse mail
                <input type="mail" name="mail" placeholder="adresse@gmail.com"
                    pattern="<?= $patterns['mail']; ?>">
                <br><br>
                Speudonyme :
                <input type="varchar" name="username" placeholder="Speudonyme"
                    pattern="<?= $patterns['username']; ?>" required>
                <br><br>
                Mot de passe :
                <input type="varchar" name="password" placeholder="Mot de passe"
                    pattern="<?= $patterns['password']; ?>" required>
                <br><br>
                Date d'inscrition au site :
                <input type="date" name="inscription_date" value="<?php echo date('Y-m-d'); ?>">
                <br><br>
                Ses favoris :
                <input type="varchar" name="favoris" placeholder="Index des produits seulement"
                    pattern="<?= $patterns['favoris']; ?>">
                <br><br>
                Son panier :
                <input type="varchar" name="panier" placeholder="Index des produits seulement"
                    pattern="<?= $patterns['panier']; ?>">
                <br><br>
                Ses commentaires : <br>
                <textarea name="comments" placeholder="Super site !"></textarea>
                <br><br>
            </label>

            <input type="submit" name="add_user" value="Ajouter">
        </form>
    </div>
</div>
