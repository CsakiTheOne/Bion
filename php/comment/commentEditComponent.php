<div class="modal" tabindex="-1" role="dialog" id="editCommentModal<?php echo $value['id'] ?>">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" id="exit" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body bg-secondary">
        <form method="post">
            <h4><i class="fa fa-comment"></i> <?php echo $value['username'] ?> mondja:
            <small><?php echo $value['date'] ?></small>
            </h4>
            <textarea class="form-control textarea" id="postText<?php echo $value['id'] ?>" name="postText<?php echo $value['id'] ?>" rows="6"><?php echo $value['text']; ?></textarea>
            <input type="hidden" name="commentId<?php echo $value['id'] ?>" value="<?php echo $value['id'] ?>">
            <button type="submit" name="editComment<?php echo $value['id'] ?>" class="btn btn-primary">Mentés</button>
            <button type="button" class="btn btn-primary" data-dismiss="modal">Bezárás</button>
            <script>
                document.getElementById("postText<?php echo $value['id'] ?>").style.height = 'auto';
                document.getElementById("postText<?php echo $value['id'] ?>").style.height = document.getElementById("postText<?php echo $value['id'] ?>").scrollHeight + 'px';
            </script>
        </form>
      </div>
    </div>
  </div>
</div>

<?php
    $postName = "editComment" . $value['id'];
    $commentId = "commentId" . $value['id'];
    $postText = "postText" . $value['id'];
    if (isset($_POST[$postName]))
    {
      $data = callProcDelete("CommentUpdateTextById", "'{$_POST[$commentId]}', '{$_POST[$postText]}'");
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

