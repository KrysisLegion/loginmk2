document.addEventListener(`DOMContentLoaded`, switchevent, false);

function switchevent(){
    document.getElementById("switch").addEventListener("click", change, true);
}


var login = [`<form action="PHP/login.php" method="post">`,
                `<div class="container">`,
                `<label for="uname"><b>Username</b></label>`,
                `<input type="text" placeholder="Enter Username..." name="inputUsername" required>`,
                `<br><br>`,
                `<label for="psw"><b>Password</b></label>`,
                `<input type="password" placeholder="Enter Password..." name="inputPassword" required>`,
                `<button type="submit" name="submit">Login</button>`,
                `<a id="switch">Register An Account</a>`,
                `</div>`,
                `</form>`].join('\n');

var register = [`<form method="post" action="PHP/signup.php">`,
                `<div class="container">`,
                `<label for="uname"><b>Create Username</b></label>`,
                `<input type="text" placeholder="Enter a Username" name="inputUsername" required>`,
                `<br><br>`,
                `<label for="pword"><b>Create Password</b></label>`,
                `<input type="password" placeholder="Enter a Password" name="inputPassword" required>`,
                `<br><br>`,
                `<label for="psw"><b>Repeat Password</b></label>`,
                `<input type="password" placeholder="Repeat Password..." name="inputPasswordRepeated" required>`,
                `<button type="submit" name="submit">Register</button>`,
                `<a id="switch">Log In Existing Account</a>`,
                `</div>`,
                `</form>`].join('\n')


function change(){
    var text = document.getElementById(`switch`).innerHTML;
    console.log(text);
    if(text == "Register An Account"){
        console.log("Register Showing")
        document.getElementById(`container`).innerHTML = register;
        document.getElementById("switch").addEventListener("click", change, true);
    }else if(text == "Log In Existing Account"){
        console.log("Login Showing")
        document.getElementById(`container`).innerHTML = login;
        document.getElementById("switch").addEventListener("click", change, true);
    }
}




