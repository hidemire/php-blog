<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Author</th>
      <th scope="col">Message</th>
      <th scope="col">Commands</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($post["comments"] as $comment) { ?>
    <tr>
      <th scope="row"><a href="#"><?= $comment["id"] ?></a></th>
      <td><?= $comment["user_name"] ?></td>
      <td><?= $comment["message"] ?></td>
      <td><span onclick=<?= "deleteComment({$comment["id"]})"?>>Delete</span></td>
    </tr>
  <?php } ?>
  </tbody>
</table>
