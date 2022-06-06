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
 * Easy on scroll event listener 
 */
const onscroll = (el, listener) => {
    el.addEventListener('scroll', listener)
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
    let body = select('body')
    if (buttonSidebar != undefined && contSidebar != undefined) {
        if (buttonSidebar.checked == true) {
            contSidebar.style.visibility = "unset";
            contSidebar.style.opacity = "1";
            sidebar.style.left = '0'
            sidebar.style.visibility = 'unset'
            sidebar.style.opacity = '1'
            body.style.overflowY = 'hidden'
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
    let body = select('body')
    buttonSidebar.checked = false;
    contSidebar.style.visibility = "hidden";
    contSidebar.style.opacity = "0";
    sidebar.style.left = '-90px';
    sidebar.style.visibility = 'hidden'
    sidebar.style.opacity = '0'
    body.style.overflowY = 'scroll'


})

/**
 * Toggle .header-scrolled class to #header when page is scrolled
 */
if (window.matchMedia("(max-width: 600px)").matches) {
    let selectHeader = select('#header')
    let selectButtonHeader = select('#header .btn-outline-primary')
    let selectHeaderLogoSecond = select('#header #logo h6:nth-child(2)')
    let selectHeaderLogoFirst = select('#header #logo h6:first-child')
    if (selectHeader) {
        const headerScrolled = () => {
            if (window.scrollY > 20) {
                selectHeader.style.background = 'white'
                selectButtonHeader.style.borderColor = '#106eea'
                selectButtonHeader.style.color = '#106eea'
                selectHeaderLogoSecond.style.color = '#444444'
                selectHeaderLogoFirst.style.color = '#106eea'

            } else {
                selectHeader.style.background = '#106eea'
                selectButtonHeader.style.borderColor = '#ffff'
                selectButtonHeader.style.color = '#ffff'
                selectHeaderLogoSecond.style.color = '#ffff'
                selectHeaderLogoFirst.style.color = '#ffff'
            }
        }
        window.addEventListener('load', headerScrolled)
        onscroll(document, headerScrolled)
    }
}
