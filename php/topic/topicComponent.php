<div class="container-fluid my-5">
    <div class="row">
      <div class="col-12">
        <!-- Post -->
          <form method="post">
          <label>Szerző: <?php echo $value['username']?></label><br>
          <label>Kategória: <?php echo $value['name']?></label><br>
          <label>Dátum: <?php echo $value['date']?></label><br>
          <label for="postText">Szöveg:</label><br>
          <input type="hidden" name="postId" value="<?php echo $value['id']?>">
          <textarea class="form-control textarea" id="postText" name="postText" rows="6" readonly><?php echo $value['text']; ?></textarea>
          <button type="submit" name="show" id="show" class="btn btn-primary">Megtekintés</button>
          </form>
      </div>
    </div>
</div>