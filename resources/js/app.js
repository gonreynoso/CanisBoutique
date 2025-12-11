import './bootstrap';
import 'flowbite';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// Importa Bootstrap
import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;

// Importamos la función desde el nuevo módulo
import initDynamicHeader from './dynamicHeader';

// Ejecutamos la función cuando el DOM esté listo
document.addEventListener('DOMContentLoaded', () => {
    initDynamicHeader();
});


