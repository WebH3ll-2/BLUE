const navLinks = document.querySelectorAll('.nav-link.nav-left-menu');
const currentLocation = location.href.replace(/\/$/, "");
const menuLength = navLinks.length;
for (let i = 0; i < menuLength; i++) {
    if (navLinks[i].href === currentLocation) {
        navLinks[i].className = "nav-link nav-left-menu active";
    }
}