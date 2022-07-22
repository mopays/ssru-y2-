let navber = document.querySelector('.header .flex  .navber');
let profile = document.querySelector('.header .flex  .profile');

document.querySelector('#menu-btn').onclick = () =>{
    navber.classList.toggle('active');
    profile.classList.remove('active');
}
document.querySelector('#user-btn').onclick = () =>{
    profile.classList.toggle('active');
    navber.classList.remove('active');
}
window.onscroll = () =>{
    navber.classList.remove('active');
    profile.classList.remove('active');
}
