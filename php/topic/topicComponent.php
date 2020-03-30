<?php
echo 
<div class="container-fluid my-5">
    <div class="row">
      <div class="col-12">
        <!-- Post -->
          <label for="">Kategória:<?php $value['name']?></label><br>
          <label for="">Dátum:<?php $value['date']?></label><br>
          <label for="postText">Szöveg:</label><br>
          <textarea class="form-control textarea" id="postText" name="postText" rows="6" readonly><?php $value['text']; ?></textarea>
        
        <!-- Eddigi commentek -->

        <!-- Comment form -->
          <form id="postComment" method="POST">
          <input type="hidden" name="postId" value="{<?php $value['id']?>}">
          <div class="form-group">
            <label for="category">Komment hozzáadása:</label>
            <textarea class="form-control textarea" id="postText" name="postText" rows="6" required></textarea>
          </div>
          <button type="submit" name="comment" id="comment" class="btn btn-primary">Küldés</button>
          </form>
      </div>
    </div>
</div>

?>