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
        <?php if($data[0]['username'] == $_SESSION['username']) { ?>
          <button type="button" class="btn btn-primary my-2" data-toggle="modal" data-target="#editCommentModal<?php echo $value['id'] ?>"><i class="fa fa-edit"></i> Szerkeztés</button>
        <?php } ?>
        <form role="form" method="POST" class="d-inline-block my-2">
          <input type="hidden" name="commentId" value="<?php echo $value['id'] ?>">
          <?php if($value['username'] == $_SESSION['username'] or $_SESSION['admin'] == 1) { ?>
            <button type="submit" name="deleteComment" id="postDelete" class="btn btn-primary"><i class="fa fa-trash"></i> Törlés</button>
          <?php } ?>
        </form>
        <script>
            document.getElementById("postText<?php echo $value['id'] ?>").style.height = 'auto';
            document.getElementById("postText<?php echo $value['id'] ?>").style.height = document.getElementById("postText<?php echo $value['id'] ?>").scrollHeight + 'px';
        </script>
      </form>
    </div>
  </div>
</div>

<?php include("commentEditComponent.php"); ?>