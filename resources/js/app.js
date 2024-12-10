import './bootstrap';

// Importa o Flowbite
import 'flowbite';

// Importa jQuery
import jQuery from 'jquery';
window.$ = jQuery;

// Importa o Select2
import select2 from 'select2';
select2();

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

$('.select2').select2();

$('#issn').on('input', function () {
    let value = $(this).val().replace(/\D/g, '');
    value = value.replace(/(\d{4})(\d)/, '$1-$2');
    $(this).val(value);
});

$('#matricula').on('input', function () {
    let value = $(this).val().replace(/\D/g, '');
    $(this).val(value);
});
