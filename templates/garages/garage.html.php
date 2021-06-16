<hr>
<h1>THIS IS THE INFO FOR A GARAGE SPECIFIC</h1>
<div class="row">
    <p><strong> <?= $garage['name']; ?> </strong></p>
    <p><strong> <?= $garage['address']; ?> </strong></p>
    <p><strong> <?= $garage['description']; ?> </strong></p>
</div>
<hr>


<!-- CREATE ANNONCE -->
<div class="container">
    <div class="row col-6">
        <h3>Add annonce</h3>
        <form action="saveAnnonce.php" method="POST">

            <input type="hidden" name="garageId" value="<?= $garage['id'] ?>">
            <div class="mb-3">
                <label for="exampleInputText1" class="form-label">Title</label>

                <textarea name="name" type="text" class="form-control" rows="1" id="exampleInputText1" aria-describedby="emailHelp"></textarea>
            </div>
            <div class="mb-3">
                <label for="exampleInputPrice" class="form-label">Price</label>

                <input name="price" type="text" class="form-control" id="exampleInputPrice">
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>
</div>
<hr>


<div class="container">
    <div class="row col-6">
        <?php if (empty($annonces)) { ?>
            <h5>There are no annonces at this time.</h5>
        <?php } ?>
    </div>
</div>

<div class="container">
    <div class="row col-8">
        <?php foreach ($annonces as $annonce) { ?>
            <?=
            "<hr>" .
                "<h6>" . $annonce['name'] . "</h6>" .
                "<br> Price: "
                . "$" . $annonce['price']
                . "<br>";
            ?>
            <a href="deleteAnnonce.php?id=<?= $annonce['id']; ?>" class="btn btn-danger m-3">Supprimer cette Annonce</a>
            <hr>
        <?php }  ?>

    </div>
</div>