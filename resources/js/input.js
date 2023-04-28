window.addEventListener("load", () => {
    window.addEventListener("offline", () => {
        alert("you appear to be offline. check your internet connection");
    });
});

// letters Limiter counter
let mainTextarea = document.querySelector('#mainTextarea');
let lettersLimiter = document.querySelector('#lettersLimiter');

mainTextarea?.addEventListener('keypress', (e) => {
    mainTextarea?.addEventListener("input", () => {
        lettersLimiter.textContent = mainTextarea.value.trim().length;
    });
    if (mainTextarea.value.trim().length >= 500) {
        alert("you can not write more than 5000 letters");
        e.preventDefault();
    }
});

// ClipboardJS
let clipboard = new ClipboardJS('#copyBtn');

clipboard.on('success', function(e) {
    alert('text copied');
    e.clearSelection();
});

clipboard.on('error', function(e) {
    alert('something went wrong try it later');
});
