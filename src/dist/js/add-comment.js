window.addEventListener('load', () => {
  const submitBtn = document.querySelector('#comment-submit');
  const textField = document.querySelector('#comment-textarea');

  submitBtn.addEventListener('click', () => {
    const message = textField.value;

    const urlParams = new URLSearchParams(window.location.search);
    const postId = urlParams.get('id');

    $.ajax({
      type: "POST",
      url: "add-comment.php",
      data: {
        postId,
        message,
      },
      success : function(){
        window.location.reload();
      },
      error: function(error) {
        console.log(error, false);
      }
    });
  });
});
