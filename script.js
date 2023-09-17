const bookingForm = document.getElementById("booking-form");

bookingForm.addEventListener("submit", function(event) {
    event.preventDefault(); 
    
    
    const name = document.getElementById("name").value;
    const email = document.getElementById("email").value;
    
    if (name === "" || email === "") {
        alert("Please fill in all required fields.");
    } else {
       
        alert("Booking successful! We'll contact you shortly.");
        bookingForm.reset(); 
    }
});
document.addEventListener("DOMContentLoaded", function () {
    const addProductForm = document.getElementById("addProductForm");
    const productList = document.getElementById("productList");

    
    function addProductToUI(productName) {
        const li = document.createElement("li");
        li.textContent = productName;

        const removeButton = document.createElement("button");
        removeButton.textContent = "Remove";
        removeButton.addEventListener("click", function () {
    
            removeProduct(productName);
        });

        li.appendChild(removeButton);
        productList.appendChild(li);
    }

    addProductForm.addEventListener("submit", function (e) {
        e.preventDefault();
        const productName = addProductForm.productName.value;

        addProduct(productName);

        addProductForm.reset();
    });

    function fetchProducts() {
        
    }

    fetchProducts();
});

