$("#update-user-info-form").validator().on("submit", function (event) {
  console.log('event', event);
  if (event.isDefaultPrevented()) {
    // handle the invalid form...
    formError();
    submitMSG(false, "Did you fill in the form properly?");
  } else {
    // everything looks good!
    event.preventDefault();
    submitForm();
  }
});

function submitForm(){
  let name = $("#name").val();
  name = name === '' ? null : name;

  let login = $("#login").val();
  login = login === '' ? null : login;

  let email = $("#email").val();
  email = email === '' ? null : email;

  let oldPassword = $("#oldPassword").val();
  oldPassword = oldPassword === '' ? null : oldPassword;

  const bio = $("#bio").val();

  const newPassword = $("#newPassword").val();
  const confirmNewPassword = $("#confirmNewPassword").val();

  if (
    oldPassword !== null 
    && (newPassword != confirmNewPassword 
      || newPassword.length < 5 
      || confirmNewPassword.length < 5)
    ) {
    return alert("Invalid confirm new password");
  }

  const requestObject = {
    name,
    login,
    email,
    bio,
    oldPassword,
    newPassword,
  }
  console.log('submitForm -> requestObject', requestObject);

  $.ajax({
    type: "POST",
    url: "user-info.php",
    data: requestObject,
    success : function(){
      window.location.reload();
    },
    error: function(error) {
      console.log(error, false);
    }
  });
}



function formSuccess(){
  $("#contactForm")[0].reset();
  submitMSG(true, "Message Submitted!")
}

function formError(){
  $("#contactForm").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
    $(this).removeClass();
  });
}

function submitMSG(valid, msg){
  if(valid){
    const msgClasses = "h3 text-center tada animated text-success";
  } else {
    const msgClasses = "h3 text-center text-danger";
  }
  $("#msgSubmit").removeClass().addClass(msgClasses).text(msg);
}