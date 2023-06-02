const formAuth = document.getElementById('auth');
formAuth.addEventListener('submit', async (e) =>{
    e.preventDefault();

    const login = document.getElementById('login').value;
    const password = document.getElementById('password').value;

    let authObj = {
        login: login,
        password: password
    };

    let json = JSON.stringify(authObj);
    console.info(json);

    const url = 'https://vaschenko.mentor4u.ru/auth.php';
    let response = await fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json;charset=utf-8'
        },
        body: json
    });
    console.info(response);
    let result = await response.json();
    console.info(result);
 
    if (result.status === 'Success') {
        alert("Success");
    } else {
        alert("Fail");
    }

});