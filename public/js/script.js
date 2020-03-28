window.addEventListener('load', checkStatus);
document.querySelector('#follow-btn').addEventListener('click', followStatus);

function followStatus(e) {
    const userId = document.querySelector('#follow-btn').getAttribute('user_id');
    // console.log('follow/' + userId);
    axios.post('/follow/' + userId)
        .then(response => {
            document.querySelector('#follow-btn').innerHTML =
                (response.data.attached.length === 1) ? 'UnFollow' : 'Follow';
        })
        .catch(err => console.log(err));
}


function checkStatus(e) {
    const userId = document.querySelector('#follow-btn').getAttribute('user_id');

    axios.get('/follow/' + userId)
        .then(response => {

            document.querySelector('#follow-btn').innerHTML =
                (response.data) ? "UnFollow" : "Follow";
        })
        .catch(err => console.log(err.response.message));
}