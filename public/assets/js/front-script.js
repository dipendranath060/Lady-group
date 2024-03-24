// Milestones

// Dropdown

let dropdown = document.getElementsByClassName("nav-dropdown");

for (let item of dropdown) {
    let menu = item.querySelector(".nav-dropdown-menu");
    item.addEventListener("click", function () {
        menu.classList.toggle("d-none");
    });
}

// Gallery modal

let modal = document.getElementById("gallery-modal");
let btn = document.getElementsByClassName("view-img");
let closeout = document.getElementById("close-out");
let closebtn = document.getElementById("close");

let allimg = document.querySelectorAll(".gallery-single-card img");
let prevbtn = document.getElementById("prev-img");
let nextbtn = document.getElementById("next-img");

let currentImageIndex = 0;

function updateOpacity() {
    prevbtn.classList.toggle("opacity-50", currentImageIndex == 0);
    nextbtn.classList.toggle("opacity-50", currentImageIndex == btn.length - 1);
}

if (btn) {
    for (let i = 0; i < btn.length; i++) {
        btn[i].addEventListener("click", function () {
            const imgSrc = allimg[i].src;
            currentImageIndex = i;

            modal.classList.remove("d-none");

            modal.querySelector("img").src = imgSrc;
            updateOpacity();
        });
    }
}

if (prevbtn) {
    prevbtn.addEventListener("click", function () {
        if (currentImageIndex != 0) {
            const prevImgsrc = allimg[currentImageIndex - 1].src;
            modal.querySelector("img").src = prevImgsrc;
            currentImageIndex--;
            updateOpacity();
        }
    });
}

if (nextbtn) {
    nextbtn.addEventListener("click", function () {
        if (currentImageIndex < btn.length - 1) {
            const nextImgsrc = allimg[currentImageIndex + 1].src;
            modal.querySelector("img").src = nextImgsrc;
            currentImageIndex++;
            updateOpacity();
        }
    });
}

if (closebtn) {
    closebtn.addEventListener("click", function () {
        modal.classList.add("d-none");
    });
    closeout.addEventListener("click", function () {
        modal.classList.add("d-none");
    });
}

// Popup

document.addEventListener('DOMContentLoaded', () => {
    let popup = document.getElementById("pop-up");
    if (popup && window.location.pathname === '/') {
        let closePopup = document.getElementById("popup-close");

        // Check if the popup has been shown before
        if (!sessionStorage.getItem('popupShown')) {
            // Show the popup if it hasn't been shown before
            setTimeout(() => {
                popup.classList.remove("d-none");
            }, 1000);
            sessionStorage.setItem('popupShown', true);
            document.body.style.overflow = "hidden";
        }

        // Add event listener to close the popup and clear sessionStorage
        closePopup.addEventListener("click", () => {
            popup.classList.add("d-none");
            document.body.style.overflow = "auto";
            sessionStorage.setItem('popupShown', true); 
        });
    }
});
