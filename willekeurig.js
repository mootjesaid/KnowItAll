function goedkeuren(id) {


location.href = "http://localhost/Level%204/KnowItAll/goedkeuren.php?gebruiker=" +id;
}

function afwijzen(id) {

    location.href = "http://localhost/Level%204/KnowItAll/afwijzen.php?gebruiker=" +id;

}

function gebruikerverwijderen(id) {

    location.href = "http://localhost/Level%204/KnowItAll/gebruikerverwijderen.php?gebruiker=" +id;

}

/* Toggle between showing and hiding the navigation menu links when the user clicks on the hamburger menu / bar icon */
function myFunction() {
    var x = document.getElementById("myLinks");
    if (x.style.display === "block") {
        x.style.display = "none";
    } else {
        x.style.display = "block";
    }
}