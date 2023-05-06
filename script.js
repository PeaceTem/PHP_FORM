const formBx = document.getElementById('registration-form');
const nameField = document.getElementById('name');
const email = document.getElementById('email');
const password = document.getElementById('password');
const phone = document.getElementById('phone');
const gender = document.getElementsByName('gender');
const language = document.getElementById("language");
const zip = document.getElementById('zip');
const about = document.getElementById('about');

formBx.addEventListener( 'submit', function(e) {
    e.preventDefault(); 
    userFormValidation()
})

nameField.addEventListener('change', () =>{
    nameValidation();
})

email.addEventListener('change', ()=>{
    emailValidation();
})

password.addEventListener('change', ()=>{
    passwordValidation();
})

phone.addEventListener('change', ()=>{
    phoneValidation();
})
gender.forEach((g) =>{
    g.addEventListener('change', ()=>{
        genderValidation();
    })
})

language.addEventListener('change', ()=>{
    languageValidation();
})

zip.addEventListener('change', ()=>{
    zipValidation();
})

about.addEventListener('change', ()=>{
    aboutValidation();
})

function userFormValidation() {
    
    if(!nameValidation() && !languageValidation() && !emailValidation() && !passwordValidation() && !phoneValidation() && !zipValidation() && !aboutValidation() && !genderValidation())
        return;

    formBx.submit();
}

const nameValidation = ()=>{
    const nameError = document.getElementById('name-error');

    
    if (nameField.value.trim() === ''){
        nameError.textContent = "Name cannot be empty";

        return false;
      } else {
        nameError.textContent = "";
        
        if (nameField.value.trim().length < 1 || nameField.value.trim().length > 30) {
          nameError.textContent = "The username must be between 1 to 30 letters long"; // Set error message text
          
          return false;
        } else {
          nameError.textContent = ""; // Set error message text
        }
  
      }
      return true;
  
}
nameValidation();

const emailValidation = ()=>{
    const emailError = document.getElementById('email-error');

    if (email.value.trim() === ''){
        emailError.textContent = "Email cannot be empty";
        return false;
      } else {
        emailError.textContent = "";
      }
      return true;
  
}
emailValidation();

const passwordValidation = ()=>{
    const passwordError = document.getElementById('password-error');

    
    if (password.value.trim() === ''){
        passwordError.textContent = "Password cannot be empty";

        return false;
      } else {
        passwordError.textContent = "";
        if (password.value.trim().length < 8 || password.value.trim().length > 20) {
          passwordError.textContent = "The password must be between 8 to 20 letters long"; // Set error message text

          return false;
        } else {
          passwordError.textContent = ""; 

        }
        
      }
      return true;
}
passwordValidation();

const phoneValidation = () => {
    const phoneError = document.getElementById('phone-error');

    if( phone.value.trim() === '') {
        phoneError.textContent = "The phone number field cannot be empty!";
        return false;
    } else {
        phoneError.textContent = '';
    }

    return true;
}
phoneValidation();

const genderValidation = () => {
    const genderError = document. getElementById('gender-error');
    let flag = true


    for (let i = 0; i < gender.length; i++) {
        if (gender[i].checked) {
            flag = false;
        }
    
   
    }
    if(flag){
        genderError.textContent = "The gender cannot be empty!";
        return false
    } else {
        genderError.textContent = '';

    }

    return true;
}
genderValidation();

const languageValidation = ()=>{
    const languageError = document.getElementById("language-error");

    const selectedValue = language.value;

    if (selectedValue === "") {
        languageError.textContent = "Please select an option";
        return false;
      } else {
        languageError.textContent = "";
      }
      return true;
}
languageValidation();

const zipValidation = ()=>{
    const zipError = document.getElementById('zip-error');

    if (zip.value.trim() === ''){
        zipError.textContent = "zip code cannot be empty";
        return false;
      } else {
        zipError.textContent = "";
        
        if (zip.value.trim().length > 6) {
          zipError.textContent = "The code is too long"; // Set error message text
          
          return false;
        } else {
          zipError.textContent = ""; // Set error message text

        }
  
      }
      return true;
  
}
zipValidation();

const aboutValidation = () => {
    const aboutError = document.getElementById('about-error');

    if( about.value.trim() === '') {
        aboutError.textContent = "The about field cannot be empty!";
        return false;
    } else {
        aboutError.textContent = '';
    }

    return true;
}
aboutValidation();