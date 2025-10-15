const track = document.querySelector('.track');
const btnSlow = document.getElementById('slow');
const btnFast = document.getElementById('fast');
const btnReset = document.getElementById('reset');

function setDuration(s) {
track.style.setProperty('--duration', s + 's');
}

const carousel = document.querySelector('.carousel');
carousel.addEventListener('focusin', () => { track.style.animationPlayState = 'paused'; });
carousel.addEventListener('focusout', () => { track.style.animationPlayState = 'running'; });

const toggles = document.querySelectorAll('.faq-toggle');


toggles.forEach(btn => {
btn.addEventListener('click', () => {
const content = btn.nextElementSibling;
const icon = btn.querySelector('svg');

document.querySelectorAll('.faq-content').forEach(c => {
if (c !== content) c.classList.add('hidden');
});
document.querySelectorAll('.faq-toggle svg').forEach(i => {
if (i !== icon) i.classList.remove('rotate-180');
});

content.classList.toggle('hidden');
icon.classList.toggle('rotate-180');
});
});