let id_email = document.getElementById("send_email");
let id_pseudo = document.getElementById("send_pseudo");

id_email.addEventListener("click", function () {
    let email = document.getElementById("email").value;
    var params = new URLSearchParams();
    params.append('email', email);
    
    fetch('../fetch/find_email_recup_password.php', {
        method: 'POST',
        body: params
    }).then(reponse => reponse.text())
    .then(reponse => {
        alert(reponse);
    });
});

id_pseudo.addEventListener("click", function () {
    let pseudo = document.getElementById("pseudo").value;
    var params = new URLSearchParams();
    params.append('pseudo', pseudo);
    
    fetch('../fetch/find_pseudo_recup_password.php', {
        method: 'POST',
        body: params
    }).then(reponse => reponse.text())
    .then(reponse => {
        alert(reponse);
    });
});