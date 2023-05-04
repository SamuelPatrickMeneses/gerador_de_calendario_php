function validFilld(target){
    var value = target.value;
    value = Number(value);
    target.setCustomValidity('');
    var condition = (value < 1900 || value > 2199);
    if(condition)
        target.setCustomValidity('valor invalido! Esconlha um ano entre 1900 e 2199.');
    return !condition;
}
function go(yar){
    window.open(`/?yar=${yar}`,'_self');
}

function removeErrorCard(){
    const card = document.querySelector('.error-card');
    if(card)
        card.parentElement.removeChild(card);
}

window.addEventListener('load',() =>{
    const buttons = document.querySelectorAll('button');
    const fild    = document.querySelector('input[type="number"]');
    
    buttons[0].onclick = () => {
        if(validFilld(fild)){
            fild.value -= 1;
            go(fild.value);
        }
    };
    buttons[1].onclick = () => {
        if(validFilld(fild)){
            var value = Number(fild.value);
            fild.value = value + 1;
            go(fild.value);
        }
    };

    fild.addEventListener('blur', () => validFilld(fild));

    window.onkeyup = (event) =>{
        var Focuzedfild = document.querySelector('input[type="number"]:focus'); 
        if(Focuzedfild && event.key == 'Enter')
           if(validFilld(Focuzedfild))
              go(Focuzedfild.value);
     };
    window.setTimeout(removeErrorCard,5000);
    const closeButton = document.querySelector('.error-card .close-button');
    closeButton.onclick = removeErrorCard;
});