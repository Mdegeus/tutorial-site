const buttons = document.querySelectorAll("button");
const linkComponents = document.querySelectorAll(".linked");

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

