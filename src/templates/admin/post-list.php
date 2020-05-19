<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Title</th>
      <th scope="col">Author</th>
      <th scope="col">Tag</th>
      <th scope="col">Likes</th>
      <th scope="col">Comments</th>
      <th scope="col">Commands</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($posts as $post) { ?>
    <tr>
      <th scope="row"><a href="<?= "single.php?id={$post["id"]}" ?>"><?= $post["id"] ?></a></th>
      <td><?= $post["title"] ?></td>
      <td><?= $post["creator"] ?></td>
      <td><?= $post["tag_name"] ?></td>
      <td><?= count($post["likes"]) ?></td>
      <td><?= count($post["comments"]) ?></td>
      <td><span onclick=<?= "editPost({$post["id"]})"?>>Edit</span> -- <span onclick=<?= "deletePost({$post["id"]})"?>>Delete</span></td>
    </tr>
  <?php } ?>
  </tbody>
</table>