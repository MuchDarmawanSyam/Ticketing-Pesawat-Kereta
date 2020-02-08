function showPass(){

    pass = document.getElementById("inputPassword");

    if (pass.type == "password"){

        pass.type = "text";

    }else{

        pass.type = "password";

    }

}