let nextbtn = document.querySelector('#nextbtn');
let previousbtn = document.querySelector('#previousbtn');
let container = document.querySelector('.slider__elements');
let dotsContainer = document.querySelector('.dots-container');

function createDots() {
    dotsContainer.innerHTML = '';
    let slides = container.querySelectorAll('.slider__element');
    let numSlides = slides.length;
    for (let i = 0; i < numSlides; i++) {
        let dot = document.createElement('span');
        dot.classList.add('dot');
        if (i === 0) {
            dot.classList.add('active');
        }
        dotsContainer.appendChild(dot);
    }
}
createDots();

let dots = Array.from(document.querySelectorAll('.dot'));
let activeDotIndex = 0;

function handleSlider(text) {
    let activeEl = document.querySelector('.active');
    let nextEl = document.querySelector('.next');
    let previousEl = document.querySelector('.previous');
    activeEl.classList.remove('active');
    nextEl.classList.remove('next');
    previousEl.classList.remove('previous');
    if (text === 'next') {
        activeDotIndex = (activeDotIndex + 1) % dots.length;
    } else if (text === 'previous') {
        activeDotIndex = (activeDotIndex - 1 + dots.length) % dots.length;
    }
    dots.forEach((dot, index) => {
        if (index === activeDotIndex) {
            dot.classList.add('active');
        } else {
            dot.classList.remove('active');
        }
    });
    if (text === 'next') {
        nextEl.classList.add('active');
        activeEl.classList.add('previous');
        nextEl = nextEl.nextElementSibling || container.firstElementChild;
        nextEl.classList.add('next');
    }
    if (text === 'previous') {
        previousEl.classList.add('active');
        activeEl.classList.add('next');
        previousEl = previousEl.previousElementSibling || container.lastElementChild;
        previousEl.classList.add('previous');
    }
}
nextbtn.addEventListener('click', function () {
    handleSlider('next');
});
previousbtn.addEventListener('click', function () {
    handleSlider('previous');
});
let intervalId = setInterval(function () {
    handleSlider('next');
}, 2000);
container.addEventListener('mouseenter', function () {
    clearInterval(intervalId);
});
container.addEventListener('mouseleave', function () {
    intervalId = setInterval(function () {
        handleSlider('next');
    }, 2000);
});
