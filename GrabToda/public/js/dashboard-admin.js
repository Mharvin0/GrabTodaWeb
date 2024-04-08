let menuicn = document.querySelector(".menuicn");
let nav = document.querySelector(".navcontainer");

menuicn.addEventListener("click", () => {
	nav.classList.toggle("navclose");
})
document.addEventListener('DOMContentLoaded', function() {
    const navOptions = document.querySelectorAll('.nav-option');

    const contentSections = document.querySelectorAll('.content-section');

    navOptions.forEach((option, index) => {
        option.addEventListener('click', function() {
            contentSections.forEach(section => {
                section.style.display = 'none';
            });

            contentSections[index].style.display = 'block';
        });
    });
});
