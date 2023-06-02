document.addEventListener('DOMContentLoaded', async () => {
    const url = 'https://vaschenko.mentor4u.ru/api/users';
 
    let responce = await fetch(url);
    let users = await responce.json();
 
    const main = document.getElementById('main');
 
    users.forEach(user => {
        main.innerHTML += `
        <div id='${user.id}'>
            <h4>${user.last_name} ${user.first_name}</h4>
            <p>${user.login}</p>
            <p>${user.role}</p>
        </div>
        `
    });
});