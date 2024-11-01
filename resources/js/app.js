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

$(function() {
    $('.select2').select2();
});
