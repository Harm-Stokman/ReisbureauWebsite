//
function displayPeople(formdata) {
    let data = document.getElementById(formdata);
    // window.alert(data.value);
    document.getElementById("aantal_result").innerText = data.value;
}

function displayDate() {
    let date = document.getElementById("datum");
    document.getElementById("datum_result").innerText = date.value;
}

function displayDuration(formduration) {
    let duration = document.getElementById(formduration);
    document.getElementById("duur_result").innerText = duration.value;
}

function calculatePrice(amount) {
    let peopleAmount = document.getElementById(amount);
    const price = document.getElementById("standaard_prijs");
    document.getElementById("prijs").innerText = "€" + ((peopleAmount.value * price.value) + 15);
    // window.alert(document.getElementById("prijs").value);
}

//
function showPassword() {
    if (document.getElementById("pass").type == "password") {
        document.getElementById("pass").type = "text";
    } else {
        document.getElementById("pass").type = "password";
    }
}

// Logout confirmation
function logoutConfirmation() {
    if (confirm("Weet u zeker dat u wilt uitloggen?")) {    // Laat popup zien en vraag of de user wilt uitloggen
        window.location.href = "logout.php";
    }
}

// Go back to top
const goBackToTopButton = document.getElementById("goBackToTop");

window.onscroll = function() {scrollFunction()};    // Voer scrollFuntcion uit wanneer er word gescrolt

function scrollFunction() {
    if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) { // Laat button zien als je 200px naar beneden scrolt
        goBackToTop.style.display = "block";
    } else {
        goBackToTop.style.display = "none";
    }
}

function goToTopFunction() {    // Scroll naar de top van de huidige pagina
    document.documentElement.scrollTop = 0;
}
