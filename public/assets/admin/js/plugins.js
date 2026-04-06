// Check if any of the specified elements exist
if (
    document.querySelector("[toast-list]") ||
    document.querySelector("[data-choices]") ||
    document.querySelector("[data-provider]")
) {
    // Function to load a script dynamically
    function loadScript(src, callback) {
        const script = document.createElement("script");
        script.type = "text/javascript";
        script.src = src;
        script.onload = callback;
        document.head.appendChild(script);
    }

    // Load required scripts
    loadScript("https://cdn.jsdelivr.net/npm/toastify-js");
    loadScript("/assets/admin/libs/choices.js/public/assets/scripts/choices.min.js");
    loadScript("/assets/admin/libs/flatpickr/flatpickr.min.js");
}
