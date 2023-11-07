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

function triggerAlarm(id_alarm){
    $('#msg_content').removeClass('msg-success')
    $('#msg_content').removeClass('msg-error')

    $.get('/check-alarm',{id: id_alarm}).done((response) => {
        const data = JSON.parse(response);
        if(data === 'activeted'){
            $.get('/dispare-alarm',{id: id_alarm}).done((response) => {
                const data_post = JSON.parse(response)
                $('#msg_content').text(data_post.message)
                if(data_post.status === 200){
                    console.log('aqui')
                    $('#msg_content').addClass('msg-success')
                } else {
                    $('#msg_content').removeClass('msg-error')
                }
            })
        }
    })
}