document.write('<script src="./public/js/imports/jquery.js"></script>')
function sendForm(event, form, route){
    
    event.preventDefault();

    const formData = new FormData(form);
    
    const formDataObj = {};

    for (const [key, value] of formData.entries()) {
        formDataObj[key] = value;
    }

    const formDataJson = JSON.stringify(formDataObj)
    
    $.post(route,formDataJson).done((response) => {
        const data = JSON.parse(response);
        
        if(data.action == 'redirect'){
            window.location.href = data.route;
        }
    })
}