const element = document.querySelectorAll('.form-control');

document.getElementById("edit").addEventListener("click", function () {
    element.forEach(function (el) {
        el.removeAttribute('disabled')
    })
});


document.getElementById("delete").addEventListener("click", function (e) {
    if (confirm("Are you sure you want to delete this account?") == false) {
        e.preventDefault();
    }
});

document.getElementById("disconnect").addEventListener("click", function (e) {
    if (confirm("Are you sure you want to disconnect") == false) {
        e.preventDefault();
    }
});