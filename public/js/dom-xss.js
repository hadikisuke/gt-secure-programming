// function show() {
//     const input = document.getElementById('userInput').value;
//     // document.getElementById('hasil').innerHTML = input;
//     document.getElementById('hasil').textContent = input;
// }

document.addEventListener('DOMContentLoaded', function() {
    const button = document.getElementById('show');
    button.addEventListener('click', function(){
        const input = document.getElementById('userInput').Value;
        document.getElementById('hasil').textContent = input;
    });
});