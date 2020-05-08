$("#registerForm").validator().on("submit", function (event) {
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
    const name = $("#name").val();
    const login = $("#login").val();
    const email = $("#email").val();
    const password = $("#password").val();
  
  
    $.ajax({
      type: "POST",
      url: "register.php",
      data: {
        name,
        login,
        email,
        password,
      },
      success : function(){
        window.location = "index.php";
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