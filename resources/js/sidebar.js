// resources/js/sidebar.js

function toggleSidebar() {
    document.getElementById("sidebar").classList.toggle("is-open");
    document.getElementById("sidebarOverlay").classList.toggle("is-open");
}

function closeSidebar() {
    document.getElementById("sidebar").classList.remove("is-open");
    document.getElementById("sidebarOverlay").classList.remove("is-open");
}

window.toggleSidebar = toggleSidebar;
window.closeSidebar = closeSidebar;
