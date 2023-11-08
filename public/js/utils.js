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
        
        if(data.action === 'redirect'){
            window.location.href = data.route;
        }
    })
}

function triggerAlarm(id_alarm, classification_alarm){
    $('#msg_content').removeClass('msg-success')
    $('#msg_content').removeClass('msg-error')
    $('#msg_content').text('')

    $.get('/check-alarm',{id: id_alarm}).done((response) => {
        const data = JSON.parse(response);
        if(data === 'activeted'){
            $.get('/dispare-alarm',{id: id_alarm, classification: classification_alarm}).done((response) => {
                const data_post = JSON.parse(response)

                console.log(data_post)
                $('#msg_content').text(data_post.message)

                if(data_post.status === 200){
                    $('#msg_content').addClass('msg-success')
                } else {
                    $('#msg_content').removeClass('msg-error')
                }
            })
        }
    })
}

function activateAlarm(element, id){
    const activate = element.value

    $.get('/activate-alarm', { activate, id}).done((response) => {
        const data = JSON.parse(response)

        if(data.action === 'redirect'){
            window.location.href = data.route;
        }
    })
}