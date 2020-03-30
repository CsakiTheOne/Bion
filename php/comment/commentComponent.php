<div class="container-fluid my-5">
    <div class="row">
      <div class="col-12">
        <!-- Post -->
          <form method="post">
          <label>Kommentelő: <?php echo $value['username']?></label><br>
          <label>Dátum: <?php echo $value['date']?></label><br>
          <label for="postText">Szöveg:</label><br>
          <textarea class="form-control textarea" id="postText" name="postText" rows="6" readonly><?php echo $value['text']; ?></textarea>
          </form>
      </div>
    </div>
</div>