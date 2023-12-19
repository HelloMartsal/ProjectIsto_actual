
function setBackground(e) {
    if (e.type === "focus") {
        e.target.style.backgroundColor = "#FFE393";
    } else if (e.type === "blur") {
        e.target.style.backgroundColor ="white";
    }
}

window.addEventListener("load", function () {
    const cssSelector = "input[type=text],input[type=password],input[type=tel]";
    const fields = document.querySelectorAll(cssSelector);

    fields.forEach(function (f) {
        f.addEventListener("focus", setBackground);
        f.addEventListener("blur", setBackground);
    });
});

