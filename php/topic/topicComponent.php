<div class="container my-5 w-50 mx-auto">
    <div class="row">
      <div class="col-12">
        <!-- Post -->
          <form method="post">
          <h2><?php echo $value['header']?></h2>
          <label style="font-size:1em;"><i class="far fa-calendar-alt"></i> <?php echo $value['date']?></label>
          <label style="font-size:1em;" class="mx-5"><i class="far fa-user"></i> <?php echo $value['username']?></label>
          <label style="font-size:1em;" class="mx-5"><i class="far fa-folder"> </i> <?php echo $value['name']?></label>
          <?php
          $data = callProc("CommentGetByThemeId", "'{$value['id']}'");
          $comments = count($data);
          ?>
          <label style="font-size:1em;" class="mx-5"><i class="far fa-comments"></i> <?php echo $comments?></label>
          <input type="hidden" name="postId" value="<?php echo $value['id']?>">
          <textarea class="form-control textarea" id="postText" name="postText" rows="6" readonly><?php echo $value['text']; ?></textarea>
          <button type="submit" name="show" id="show" class="btn btn-primary my-2 float-right">Megtekintés</button>
          </form>
      </div>
    </div>
</div>