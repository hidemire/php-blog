function deletePost(postId) {
  console.log(postId);

  $.ajax({
    type: "POST",
    url: "admin-panel-delete-post.php",
    data: {
      postId,
    },
    success : function(){
      window.location.reload();
    },
    error: function(error) {
      console.log(error, false);
    }
  });
}

function editPost(postId) {
  window.location = `/admin-panel-edit-post.php?id=${postId}`;
}