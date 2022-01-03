function validation(){
    var valid = true;
    
    //validate name
    var name = document.getElementById("name").value;
    var reg = /^([a-zA-Z. ]{2,})$/;
    if (!reg.test(name)){
      document.getElementById('name-error').style.display = "block";
      valid = false;
    }else{
      document.getElementById('name-error').style.display = "none";
    }
  
   //validate nid
   var nid = document.getElementById("nid").value;
   var reg = /^[0-9]{10}([0-9]{3})?([0-9]{4})?$/;
   if (!reg.test(nid)){
     document.getElementById('nid-error').style.display = "block";
     valid = false;
   }else{
     document.getElementById('nid-error').style.display = "none";
   }


    //validate Phone
    var phone = document.getElementById("phone").value;
    var reg = /^1[3-9]{1}[0-9]{8}$/;
    if (!reg.test(phone)){
      document.getElementById('phone-error').style.display = "block";
      valid = false;
    }else{
      document.getElementById('phone-error').style.display = "none";
    }
  

    //validate Email
    var email = document.getElementById("email").value;
    var reg = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
    if (!reg.test(email)){
      document.getElementById('email-error').style.display = "block";
      valid = false;
    }else{
      document.getElementById('email-error').style.display = "none";
    }

    
    //validate Password
    var pass = document.getElementById("pass").value;
    if (pass.length < 6){
      document.getElementById('pass-error').style.display = "block";
      valid = false;
    }else{
      document.getElementById('pass-error').style.display = "none";
    }
    
    var pass2 = document.getElementById("pass2").value;
    if (pass2 != pass){
      document.getElementById('pass2-error').style.display = "block";
      valid = false;
    }else{
      document.getElementById('pass2-error').style.display = "none";
    }
    
    
    
    if (valid){
      document.getElementById('register-form').submit();
      return true;
  
    }
    //final touch
    if(!valid){
      alert("Please fill all the fields correctly");
      return false;
    }
  }