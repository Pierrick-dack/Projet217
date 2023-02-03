let destination = document.querySelector('.input-container');
let btn = document.querySelector('.btn');
btn.addEventListener('click', add_field);

function add_field(e){
    e.preventDefault();
    destination.innerHTML += '<input type="text" name="codeue" class="input" autocomplete="off" required><label for="">Unit code</label><span>Unit code</span>'
}