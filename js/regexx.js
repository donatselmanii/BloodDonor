function Valido(){
    
    const id= document.getElementById('id')
    const password = document.getElementByID('password')
    const LoginForm = documet.getElementByID('signupform')
    const errorElement = document.getElementById('error')


     LoginForm.addEventListener('submit', (e) => {
        let messages = []
        if(id == '' || id == null){
            messages.push('Name is required')
        }
        if(password.value.length <=7){
            messages.push('Password must be longer than 7 characters')

        }
        if(password.value.length >=20){
            messages.push('Password must be less than 20 characters')
            
        }
        if(messages.length > 0){
            e.preventDefault()
            errorElement.innerText=messages.join(', ')
        }
    })


const FirstnameRegex=/^[A-Z]+[a-zA-Z]{3,15}$/
    const Firstname= document.getElementById('name').value
    ////////////////////////////////////// USERNAME DECLARATION AND REGEX
    const LastNameRegex=/^[A-Za-z0-9]{3,20}$/
    const lastname = document.getElementById('lname').value
    /////////////////////////////////////////// EMAIL DECLARATION AND REGEX
    const emailRegex= /^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+){1}$/
    const email=document.getElementById('email').value
/////////////////////////////////////////// ID DECLARATION AND REGEX
const IDRegex=/^[0-9]{10,10} $/
 id= document.getElementById('id').value
    ///////////////////////////////////////////// PASSWORD DECLARATION AND REGEX
    const passwordRegex= /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Z\d]{7}$/
     password =document.getElementById('password').value



    ////////////////////////////////////////////////// FIRSTNAME IF
    if(FirstnameRegex.test(Firstname)){
       
        console.log("Emri valid");
    }
    else{
    
        console.log("Emri jo valid");
    }

    /////////////////////////////////////// EMAIL IF
    if(emailRegex.test(email)){
     
        console.log("Email valid");
    }
    else{
       
        console.log("Email jo valid");
    }
/////////////////////////////////////// ID IF
if(IDRegex.test(id)){
        console.log("ID valide");
    }
    else{
        console.log("ID jo valide");
    }
    ///////////////////////////////////// PASSWORD IF
    if(passwordRegex.test(password)){
       
        console.log("Fjalekalimi valid ");
    }
    else{
        console.log("Fjalekalimi jo valid");
    }

}