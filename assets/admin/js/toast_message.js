function toast(message, duration = 1200) {
    Toastify({
        text: message,
        duration: duration,
        gravity: "bottom", // `top` or `bottom`
        position: "center", // `left`, `center` or `right`
        stopOnFocus: true, // Prevents dismissing of toast on hover
        style: {
            background: "rgba(0, 0, 0, 0.6)",
        }
    }).showToast();
}