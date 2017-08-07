function validateEmail(){
        var email=document.getElementById("email");
      emailError=document.getElementById('emailError'),
        str5=email.value,
        regPartton=/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/,
        flag = false;
    if(!str5 || str5==null){
      // emailError.innerHTML = "邮箱码不能为空！";
       alert("邮箱码不能为空!");
         email.focus();
        flag = false;
    }else if(!regPartton.test(str5)){
       // emailError.innerHTML = "邮箱码格式不正确！";
       email.focus();
        alert("邮箱码格式不正确！");
       
        flag = false;
    }else{
      // emailError.innerHTML="";     
        flag = true;
    } 
    return flag;
    
 }