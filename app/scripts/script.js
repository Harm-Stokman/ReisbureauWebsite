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

//
function logoutConfirmation() {
    if (confirm("Weet u zeker dat u wilt uitloggen?")) {
        window.location.href = "logout.php";
    } else {
        // Do nothing.
    }
}
