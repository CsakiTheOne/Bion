<div class="modal" tabindex="-1" role="dialog" id="editModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" id="exit" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body bg-secondary">
        <div class="mx-auto">
          <h1><?php echo $data[0]['header'] ?></h1>
          <p class="lead"><i class="fa fa-user"></i> szerző <?php echo $data[0]['username'] ?></p>
          <hr>
          <p><i class="fa fa-calendar"></i> <?php echo $data[0]['date'] ?> </p> 
          <p><i class="fa fa-tags"></i> Tags: <span class="badge badge-info"><?php echo $data[0]['name'] ?></span></p>
          <form method="post">
            <textarea class="form-control textarea" id="postText" name="postText" rows="6"><?php echo $data[0]['text']; ?></textarea>
            <button type="submit" name="editPost" class="btn btn-primary">Mentés</button>
            <button type="button" class="btn btn-primary" data-dismiss="modal">Bezárás</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
  if (isset($_POST['editPost'])) {
      $data = callProcDelete("ThemeUpdateTextById", "'{$_SESSION["postId"]}', '{$_POST["postText"]}'");
      if($data)
      {
        echo "<meta http-equiv='refresh' content='0'>";
      }
      else
      {
        echo "Siekrtelen szerkeztés!";
      }
    }
?>

