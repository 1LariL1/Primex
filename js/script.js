let btnOpen = document.querySelector('.li-button'),
btnClose = document.querySelector('.calc_close'),        
calculatorDiv = document.querySelector('.heading-calculater');
function openCalculator() {
    calculatorDiv.classList.remove('heading-calculater-close');
    calculatorDiv.classList.add('heading-calculater-show');
}

function closeCalculator() {
    calculatorDiv.classList.remove('heading-calculater-show');
    calculatorDiv.classList.add('heading-calculater-close');
}

console.log(btnOpen)  
console.log(btnClose) 
console.log(calculatorDiv) 
btnClose.addEventListener('click', closeCalculator);
btnOpen.addEventListener('click', openCalculator);