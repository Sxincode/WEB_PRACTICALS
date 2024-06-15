function validate(){
    const name = document.getElementById("name").value;
    const email = document.getElementById("email").value;
    const pswd = document.getElementById("pswd").value;

    
    var nameReg=/^[a-zA-Z\s]{6,}$/;
    var pwReg = /^.{6,}$/;
    var mailReg = /^[^\s@]+@[^\s@]+\.[^s@]+$/;


    if(name=="" || email=="" || pswd==""){
        alert("All fields are Mandatory!!!");
        return false;
    }

    if(!nameReg.test(name)){
        alert("Name is too short");
        return false;
    }
    if(!mailReg.test(email))
    {
        alert("Email is too short");
        return false;
    }
    if(!pwReg.test(pswd)){
        alert("Pswd is too short");
        return false;
    }
    else{
        alert("All fields are Correct!!");
        document.getElementById("myform").reset();
        return true;
    }

}