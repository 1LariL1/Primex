let 
btnOpen = document.querySelector('.li-button'),   //присвивание переменных классам стилей
btnClose = document.querySelector('.calc_close'),        
calculatorDiv = document.querySelector('.heading-calculater');

function openCalculator() { //функция открытия окна
    calculatorDiv.classList.remove('heading-calculater-close'); //убирается класс
    calculatorDiv.classList.add('heading-calculater-show'); //добавляется класс
}

function closeCalculator() { //функция закрытия окна
    calculatorDiv.classList.add('heading-calculater-close'); //добавление класса
}

console.log(btnOpen)  
console.log(btnClose) 
console.log(calculatorDiv) 
btnClose.addEventListener('click', closeCalculator); //функции при нажатии на кнопки
btnOpen.addEventListener('click', openCalculator);