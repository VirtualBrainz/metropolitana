var numbers = document.getElementById('unidad');
for(i = 0; i < 100; i++){
    var span = document.createElement('span');
    span.textContent = i;
    numbers.appendChild(span);
}
var num = numbers.getElementsByTagName('span');
var index = 0;

function mas() {
    num[index].style.diplay = 'none';
    index = (index + 1) % num.length;
    num[index].style.diplay = 'initial';
}
