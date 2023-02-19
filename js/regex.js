        function Valido(){
    /////////////////////////////////////////// ID DECLARATION AND REGEX
    var IDRegex=/^[0-9]{10,10} $/
    var nrleternjoftimit= document.getElementById('id').value

    ////////////////////////////// FIRSTNAME DECLARATION AND REGEX
    var FirstnameRegex=/^[A-Z]+[a-zA-Z]{3,15}$/
    var Firstname= document.getElementById('emri').value
    ////////////////////////////////////// USERNAME DECLARATION AND REGEX
    var LastNameRegex=/^[A-Za-z0-9]{3,20}$/
    var lastname = document.getElementById('mbiemri').value
    /////////////////////////////////////////// EMAIL DECLARATION AND REGEX
    var emailRegex= /^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+){1}$/
    var email=document.getElementById('numri').value

    ///////////////////////////////////////////// PASSWORD DECLARATION AND REGEX
    var passwordRegex= /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Z\d]{7}$/
    var passwordi =document.getElementById('password').value

                

    ////////////////////////////////////////////////// FIRSTNAME IF
    if(FirstnameRegex.test(Firstname)){
       
        console.log("FirstName eshte ne rregull");
    }
    else{
       
        console.log("FirstName eshte ne rregull");
    }

   
    /////////////////////////////////////// EMAIL IF
    if(emailRegex.test(email)){
     
        console.log("Email eshte ne rregull");
    }
    else{
       
        console.log("Email nuk eshte ne rregull");
    }
/////////////////////////////////////// ID IF
if(IDRegex.test(id)){
        console.log("ID eshte ne rregull");
    }
    else{
        console.log("ID nuk eshte ne rregull");
    }
    ///////////////////////////////////// PASSWORD IF
    if(passwordRegex.test(password)){
       
        console.log("Passwordi eshte ne rregull");
    }
    else{
       
        console.log("Passwordi nuk eshte ne rregull");
    }

}