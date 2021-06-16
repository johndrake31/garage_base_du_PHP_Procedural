  <?php foreach ($garages as $garage) { ?>

      <div class="row">
          <p><strong> <?= $garage['name']; ?> </strong></p>
          <p><strong> <?= $garage['address']; ?> </strong></p>
          <p><strong> <?= $garage['description']; ?> </strong></p>
      </div>
      <a href="garage.php?id=<?= $garage['id']; ?>" class="btn btn-success">voir ce garage</a>
      <a href="deleteGarage.php?id=<?= $garage['id']; ?>" class="btn btn-danger">Supprimer ce garage</a>
      <hr>



  <?php } ?>