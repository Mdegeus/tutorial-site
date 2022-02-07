const buttons = document.querySelectorAll("button");
const linkComponents = document.querySelectorAll(".linked");
const popups = document.querySelectorAll(".popup");

if (buttons) {
    buttons.forEach((button) => {
        button.addEventListener("click", () => { ///// the event listener is handled here.
            if (button.getAttribute("link")) {
                const targetLocation = button.getAttribute("link");
    
                if (button.getAttribute("target") === "_blank") {
                    window.open(targetLocation);
                } else {
                    window.location = targetLocation;
                }
                
            }   
        })
        
    })
}

if (linkComponents) {
    linkComponents.forEach((component) => {
        component.addEventListener("click", () => { ///// the event listener is handled here.
            
            if (component.getAttribute("link")) {
                const targetLocation = component.getAttribute("link");
    
                window.location = targetLocation;
            }   
        })
        
    })
}

if (document.querySelector(".dock-alert")) {
    const alerts = document.querySelectorAll(".dock-alert");

    alerts.forEach(alertdock => {

        if (alertdock.getAttribute('remember') != undefined) {
            if (localStorage.getItem('alert' + alertdock.id)) {
                alertdock.remove();
            } else {
                localStorage.setItem('alert' + alertdock.id, true);
            }
        }

        if (alertdock.getAttribute('autoclose')) {
            const sec = alertdock.getAttribute('autoclose');
            if (!isNaN(sec)) {
                setInterval(() => {
                    alertdock.style.display = 'none';
                }, sec*1000)
            }
        }

    });
}

// docks

if (document.querySelector(".dock-button")) {

    const buttons = document.querySelectorAll(".dock-button");

    buttons.forEach(button => {

        const targetName = button.getAttribute('dock-id');

        button.addEventListener("click", () => {
            if (dock = document.querySelector('#' + targetName)) {
                const dock = document.querySelector('#' + targetName);
                dock.style.display = "flex";
            }
        })

    });
}

if (document.querySelector(".dock-close")) {

    const buttons = document.querySelectorAll(".dock-close");

    buttons.forEach(button => {

        const targetName = button.getAttribute('dock-id');

        button.addEventListener("click", () => {
            const dock = document.querySelector('#' + targetName);
            dock.style.display = "none";
        })

    });
}
