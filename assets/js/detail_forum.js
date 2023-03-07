function closeToast() {
    document.getElementById('toast-position').classList.remove("montrer");
    document.getElementById('toast-position').classList.add("cacher");
}

function showToast() {
    document.getElementById('toast-position').classList.remove("cacher");
    document.getElementById('toast-position').classList.add("montrer");
}