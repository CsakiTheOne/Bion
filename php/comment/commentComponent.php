<div class="container-fluid my-5 mx-auto w-50">
  <div class="row">
    <div class="col-12">
      <!-- Post -->
      <form method="post">
        <!--<label>Kommentelő: <?php echo $value['username'] ?></label><br>
          <label>Dátum: <?php echo $value['date'] ?></label><br>
          <label for="postText">Szöveg:</label><br>
          <textarea class="form-control textarea" id="postText" name="postText" rows="6" readonly><?php echo $value['text']; ?></textarea>-->
        <h4><i class="fa fa-comment"></i> <?php echo $value['username'] ?> mondja:
          <small><?php echo $value['date'] ?></small>
        </h4>
        <textarea class="form-control textarea" id="postText<?php echo $value['id'] ?>" name="postText" rows="3" readonly><?php echo $value['text']; ?></textarea>
        <script>
            document.getElementById("postText<?php echo $value['id'] ?>").style.height = 'auto';
            document.getElementById("postText<?php echo $value['id'] ?>").style.height = document.getElementById("postText<?php echo $value['id'] ?>").scrollHeight + 'px';
        </script>
      </form>
    </div>
  </div>
</div>