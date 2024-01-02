/**
 * @returns A boolean false to cancel the form otherwise true
 */
function checkFields() {
  const loginInput = document.getElementById('login');
  const loginSuccess = checkLogin(loginInput.value);
  if(loginSuccess) {
    loginInput.style.borderColor = '';
  } else {
    loginInput.style.borderColor = 'red';
  }
  const emailInput = document.getElementById('email');
  const emailSuccess = checkEmail(emailInput.value);
  if(emailSuccess) {
    emailInput.style.borderColor = '';
  } else {
    emailInput.style.borderColor = 'red';
  }
  const passwordInput = document.getElementById('password');
  const passwordSuccess = checkPassword(passwordInput.value);
  if(passwordSuccess) {
    passwordInput.style.borderColor = '';
  } else {
    passwordInput.style.borderColor = 'red';
  }
  const captchapop = document.getElementsByClassName('captcha');
  const formconnex = document.getElementById('connexionform');


 if(loginSuccess && emailSuccess && passwordSuccess){
   captchapop.style.visibility="visible";
   formconnex.appendChild('captchapop');
 }

  return loginSuccess && emailSuccess && passwordSuccess;
}

/**
 * @param log {string}
 * @returns true if the login contains 6 caracts...
 */
function checkLogin(log) {
  if(log.length < 6) {
    return false;
  }
  const code = log.charCodeAt(log.length - 1);
  return code >= 48 && code <= 57;
}

/**
 * @param e {string}
 * @returns {boolean}
 */
function checkEmail(e) {
  const index1 = e.indexOf('@');
  const index2 = e.indexOf('.');
  return index1 !== -1 && index2 !== -1;
}

/**
 * @param pwd {string}
 * @returns {boolean}
 */
function checkPassword(pwd) {
  if(pwd.length < 8) {
    return false;
  }
  let countNumbers = 0;
  let countUppers = 0;
  let countLowers = 0;
  for(let i = 0; i < pwd.length; i++) {
    const code = pwd.charCodeAt(i);
    if(code >= 48 && code <= 57) {
      countNumbers++;
    } else if(code >= 97 && code <= 122) {
      countLowers++;
    }  else if(code >= 65 && code <= 90) {
      countUppers++;
    }
  }
  return countNumbers >= 1 && countLowers >= 1 && countUppers >= 1;
}
