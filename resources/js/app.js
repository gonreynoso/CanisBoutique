import './bootstrap';

// Importa Flowbite (el .js de Flowbite)
import 'flowbite';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// Importamos la función desde el nuevo módulo
import initDynamicHeader from './dynamicHeader';

// Ejecutamos la función cuando el DOM esté listo
document.addEventListener('DOMContentLoaded', () => {
    initDynamicHeader();
});


