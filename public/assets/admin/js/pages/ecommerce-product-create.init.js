document.addEventListener('DOMContentLoaded', function () {
    // Check if the #dropzone-preview-list element exists
    var dropzonePreviewNode = document.querySelector("#dropzone-preview-list");

    if (dropzonePreviewNode) {
        // If the element exists, safely modify it
        dropzonePreviewNode.itemid = ""; // Set itemid if element is found
        var previewTemplate = dropzonePreviewNode.parentNode.innerHTML;

        // Remove the dropzonePreviewNode after using it
        dropzonePreviewNode.parentNode.removeChild(dropzonePreviewNode);

        // Initialize Dropzone with the previewTemplate
        new Dropzone(".dropzone", {
            url: "https://httpbin.org/post",
            method: "post",
            previewTemplate: previewTemplate,
            previewsContainer: "#dropzone-preview"
        });
    }

    // Some other form-related code for image input
    var e = document.querySelectorAll(".needs-validation"),
        l = (new Date).toUTCString().slice(5, 16);

    function p() {
        var e = 12 <= (new Date).getHours() ? "PM" : "AM",
            t = 12 < (new Date).getHours() ? (new Date).getHours() % 12 : (new Date).getHours(),
            o = (new Date).getMinutes() < 10 ? "0" + (new Date).getMinutes() : (new Date).getMinutes();
        return t < 10 ? "0" + t + ":" + o + " " + e : t + ":" + o + " " + e;
    }

    // Update the time every second
    setInterval(p, 1000);

    // Event listener for product image input
    productImageInput = document.querySelector("#product-image-input")
    if(productImageInput){
        productImageInput.addEventListener("change", function () {
            var e = document.querySelector("#product-img"),
                t = productImageInput.files[0],
                o = new FileReader();
            o.addEventListener("load", function () {
                e.src = o.result;
            }, false);
            if (t) o.readAsDataURL(t);
        });
    }

    // Initialize Choices.js for category input
    var categoryInputEl = document.querySelector("#choices-category-input");
    var m = categoryInputEl ? new Choices(categoryInputEl, { searchEnabled: false }) : null,
        g = sessionStorage.getItem("editInputValue");

    if (m && g) {
        g = JSON.parse(g);
        document.getElementById("formAction").value = "edit";
        document.getElementById("product-id-input").value = g.id;
        document.getElementById("product-img").src = g.product.img;
        document.getElementById("product-title-input").value = g.product.title;
        document.getElementById("stocks-input").value = g.stock;
        document.getElementById("product-price-input").value = g.price;
        document.getElementById("orders-input").value = g.orders;
        m.setChoiceByValue(g.product.category);
    }

    // Handle form submission
    Array.prototype.slice.call(e).forEach(function (s) {
        s.addEventListener("submit", function (e) {
            var t, o, i, n, r, u, d, c, a;

            // Check validity
            if (s.checkValidity()) {
                e.preventDefault();
                c = ++itemid; // Increment itemid

                t = document.getElementById("product-title-input").value;
                o = m.getValue(true);
                i = document.getElementById("stocks-input").value;
                n = document.getElementById("orders-input").value;
                r = document.getElementById("product-price-input").value;
                u = document.getElementById("product-img").src;

                if ("add" == (d = document.getElementById("formAction").value)) {
                    c = null != sessionStorage.getItem("inputValue") ? (a = JSON.parse(sessionStorage.getItem("inputValue")), { id: c + 1, product: { img: u, title: t, category: o }, stock: i, price: r, orders: n, rating: "--", published: { publishDate: l, publishTime: p() } }) : (a = [], { id: c, product: { img: u, title: t, category: o }, stock: i, price: r, orders: n, rating: "--", published: { publishDate: l, publishTime: p() } });

                    a.push(c);
                    sessionStorage.setItem("inputValue", JSON.stringify(a));
                } else if ("edit" == d) {
                    c = document.getElementById("product-id-input").value;
                    sessionStorage.getItem("editInputValue") && (a = { id: parseInt(c), product: { img: u, title: t, category: o }, stock: i, price: r, orders: n, rating: g.rating, published: { publishDate: l, publishTime: p() } });
                    sessionStorage.setItem("editInputValue", JSON.stringify(a));
                } else {
                    console.log("Form Action Not Found.");
                }

                // Redirect after form submission
                window.location.replace("apps-ecommerce-products.html");
                return false;
            }

            // Prevent default behavior if form is invalid
            e.preventDefault();
            e.stopPropagation();
            s.classList.add("was-validated");
        }, false);
    });
});
