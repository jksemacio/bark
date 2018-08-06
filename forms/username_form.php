<form method="post">
  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" id="username" name="username" placeholder="Username">
  </div>
  <button type="submit" name="next" class="btn btn-primary">Next</button>
  <span>
    <?php if(isset($error)) { echo $error; } ?>
  </span>
</form>
