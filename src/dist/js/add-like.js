window.addEventListener('load', () => {
  const likeBtn = document.querySelector('#like-heart');

  likeBtn.addEventListener('click', () => {
    const urlParams = new URLSearchParams(window.location.search);
    const postId = urlParams.get('id');

    $.ajax({
      type: "POST",
      url: "add-like.php",
      data: {
        postId,
      },
      success: function () {
        window.location.reload();
      },
      error: function (error) {
        console.log(error, false);
      }
    });
  });
});