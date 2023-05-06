let formContainer = document.getElementById('registration-form');
const submitBtn = document.getElementById('submitBtn');

formContainer.addEventListener( 'submit', function(event) {
    event.preventDefault(); 
    validateForm()
})

const nameField = document.getElementById('name');
nameField.addEventListener('change', () =>{
    nameValidation();
})

const email = document.getElementById('email');
email.addEventListener('change', ()=>{
    emailValidation();
})

const password = document.getElementById('password');
password.addEventListener('change', ()=>{
    passwordValidation();
})

const phone = document.getElementById('phone');
phone.addEventListener('change', ()=>{
    phoneValidation();
})

var gender = document.getElementsByName('gender');
for (let i = 0; i < gender.length; i++) {
    gender[i].addEventListener('change', ()=>{
        genderValidation();
    })

}

const language = document.getElementById("language");
language.addEventListener('change', ()=>{
    selectFieldValidation();
})

const zip = document.getElementById('zip');
zip.addEventListener('change', ()=>{
    zipValidation();
})

const about = document.getElementById('about');
about.addEventListener('change', ()=>{
    aboutValidation();
})

function validateForm() {
    
    // const gender = document.getElementsByName('gender').checked;

    // if(!nameValidation() && !selectFieldValidation() && !emailValidation() && !passwordValidation() && !phoneValidation() && !zipValidation() && !aboutValidation() && !genderValidation()){
    if(!nameValidation() && !selectFieldValidation() && !emailValidation() && !passwordValidation() && !phoneValidation() && !zipValidation() && !aboutValidation() && !genderValidation())
        return;

    formContainer.submit();
}

const nameValidation = ()=>{
    const nameError = document.getElementById('name-error');

    
    if (nameField.value.trim() === ''){
        nameError.textContent = "Name cannot be empty";
        nameError.style.display = 'block';

        return false;
      } else {
        nameError.textContent = "";
        nameError.style.display = 'none';
        
        if (nameField.value.trim().length < 1 || nameField.value.trim().length > 30) {
          nameError.textContent = "The username must be between 1 to 30 letters long"; // Set error message text
          nameError.style.display = 'block';
          
          return false;
        } else {
          nameError.textContent = ""; // Set error message text
          nameError.style.display = 'none';
        }
  
      }
      return true;
  
}
nameValidation();

const emailValidation = ()=>{
    const emailError = document.getElementById('email-error');

    if (email.value.trim() === ''){
        emailError.textContent = "Email cannot be empty";
        emailError.style.display = 'block';
        return false;
      } else {
        emailError.textContent = "";
        emailError.style.display = 'none';
      }
      return true;
  
}
emailValidation();

const passwordValidation = ()=>{
    const passwordError = document.getElementById('password-error');

    
    if (password.value.trim() === ''){
        passwordError.textContent = "Password cannot be empty";
        passwordError.style.display = 'block';

        return false;
      } else {
        passwordError.textContent = "";
        if (password.value.trim().length < 8 || password.value.trim().length > 20) {
          passwordError.textContent = "The password must be between 8 to 20 letters long"; // Set error message text
          passwordError.style.display = 'block';

          return false;
        } else {
          passwordError.textContent = ""; 
          passwordError.style.display = 'none';

        }
        
      }
      return true;
}
passwordValidation();

const phoneValidation = () => {
    const phoneError = document.getElementById('phone-error');

    if( phone.value.trim() === '') {
        phoneError.textContent = "The phone number field cannot be empty!";
        phoneError.style.display = 'block';
        return false;
    } else {
        phoneError.textContent = '';
        phoneError.style.display = 'none';
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
        genderError.style.display = 'block';
        return false
    } else {
        genderError.textContent = '';
        genderError.style.display = 'none';

    }

    return true;
}
genderValidation();

const selectFieldValidation = ()=>{
    const languageError = document.getElementById("language-error");

    const selectedValue = language.value;

    if (selectedValue === "") {
        languageError.textContent = "Please select an option";
        languageError.style.display = 'block';
        return false;
      } else {
        languageError.textContent = "";
        languageError.style.display = 'none';
      }
      return true;
}
selectFieldValidation();

const zipValidation = ()=>{
    const zipError = document.getElementById('zip-error');

    if (zip.value.trim() === ''){
        zipError.textContent = "zip code cannot be empty";
        zipError.style.display = 'block';
        return false;
      } else {
        zipError.textContent = "";
        
        if (zip.value.trim().length > 6) {
          zipError.textContent = "The code is too long"; // Set error message text
          zipError.style.display = 'block';
          
          return false;
        } else {
          zipError.textContent = ""; // Set error message text
          zipError.style.display = 'none';

        }
  
      }
      return true;
  
}
zipValidation();

const aboutValidation = () => {
    const aboutError = document.getElementById('about-error');

    if( about.value.trim() === '') {
        aboutError.textContent = "The about field cannot be empty!";
        aboutError.style.display = 'block';
        return false;
    } else {
        aboutError.textContent = '';
        aboutError.style.display = 'none';
    }

    return true;
}
aboutValidation();