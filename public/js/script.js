/**
 * Easy selector helper function
 */
const select = (el, all = false) => {
    el = el.trim()
    if (all) {
        return [...document.querySelectorAll(el)]
    } else {
        return document.querySelector(el)
    }
}

/**
 * Easy event listener function
 */
const on = (type, el, listener, all = false) => {
    let selectEl = select(el, all)
    if (selectEl) {
        if (all) {
            selectEl.forEach(e => e.addEventListener(type, listener))
        } else {
            selectEl.addEventListener(type, listener)
        }
    }
}

/*
 * Toggle Display Sidebar Default
 */
on('click', '#sidebarDefaultButton', function (e) {
    let buttonSidebar = select('#sidebarDefaultButton')
    let contSidebar = select('#contSidebar')
    let sidebar = select('.sidebar')
    if (buttonSidebar != undefined && contSidebar != undefined) {
        if (buttonSidebar.checked == true) {
            contSidebar.style.visibility = "unset";
            contSidebar.style.opacity = "1";
            sidebar.style.left = '0'
            sidebar.style.visibility = 'unset'
            sidebar.style.opacity = '1'
        } else {
            contSidebar.style.visibility = "hidden";
            contSidebar.style.opacity = "0";
            sidebar.style.left = '-90px';
            sidebar.style.visibility = 'hidden'
            sidebar.style.opacity = '0'
        }
    }
})

/*
 * Close Sidebar Default
 */
on('click', '#contSidebar', function (e) {
    let buttonSidebar = select('#sidebarDefaultButton')
    let contSidebar = select('#contSidebar')
    let sidebar = select('.sidebar')

    buttonSidebar.checked = false;
    contSidebar.style.visibility = "hidden";
    contSidebar.style.opacity = "0";
    sidebar.style.left = '-90px';
    sidebar.style.visibility = 'hidden'
    sidebar.style.opacity = '0'


})
