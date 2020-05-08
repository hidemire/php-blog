$('#contactForm').validator().on('submit', function (event) {
  console.log('event', event);
  if (event.isDefaultPrevented()) {
    formError();
    submitMSG(false, 'Did you fill in the form properly?');
  } else {
    event.preventDefault();
    submitForm();
  }
});

function submitForm(){
  const email = $('#email').val();
  const password = $('#password').val();

  $.ajax({
    type: 'POST',
    url: 'login.php',
    data: {
      email,
      password,
    },
    success : function(){
      window.location = 'index.php';
    },
    error: function(error) {
      console.log(error, false);
    }
  });
}

function formSuccess(){
  $('#contactForm')[0].reset();
  submitMSG(true, 'Message Submitted!')
}

function formError(){
  $('#contactForm').removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
    $(this).removeClass();
  });
}

function submitMSG(valid, msg){
  let = msgClasses = 'h3 text-center text-danger';
  
  if(valid){
    msgClasses = 'h3 text-center tada animated text-success';
  }
  
  $('#msgSubmit').removeClass().addClass(msgClasses).text(msg);
}