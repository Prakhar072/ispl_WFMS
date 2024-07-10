
function send_mail(reciever,username,new_pass){
var data = {
    service_id: 'service_i43a3pz',
    template_id: 'template_znex79k',
    user_id: 'wc1VFD8_ZElFpM1tY',
    template_params: {
        'reciever': reciever,
        'first_name': username,
        'pass': new_pass
    }
};
 
$.ajax('https://api.emailjs.com/api/v1.0/email/send', {
    type: 'POST',
    data: JSON.stringify(data),
    contentType: 'application/json'
}).done(function() {
    alert('Your mail is sent!');
}).fail(function(error) {
    alert('Oops... ' + JSON.stringify(error));
});



}