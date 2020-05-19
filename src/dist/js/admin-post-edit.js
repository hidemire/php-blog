function deleteComment(commentId) {
  console.log(commentId);

  if (!confirm('Are you sure?')) {
    return;
  }

  $.ajax({
    type: "POST",
    url: "admin-panel-delete-comment.php",
    data: {
      commentId,
    },
    success : function(){
      window.location.reload();
    },
    error: function(error) {
      console.log(error, false);
    }
  });
}