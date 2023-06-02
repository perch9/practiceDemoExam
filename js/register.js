const formRegister = document.getElementById('register');
formRegister.addEventListener('submit', async (e) =>{
    e.preventDefault();

    const login = document.getElementById('login').value;
    const password = document.getElementById('password').value;
    const confirm_password = document.getElementById('confirm_password').value;
    const first_name = document.getElementById('first_name').value;
    const last_name = document.getElementById('last_name').value;

    let authObj = {
        login: login,
        password: password,
        confirm_password: confirm_password,
        first_name: first_name,
        last_name: last_name
    };

    let json = JSON.stringify(authObj);
    console.info(json);

    const url = 'https://vaschenko.mentor4u.ru/register.php';
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
        window.location.href = '../auth.html';
    } else {
        alert("Fail");
    }

});