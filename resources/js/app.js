import './bootstrap';
// Importar o jQuery e o Popper.js
import $ from 'jquery';
import Popper from 'popper.js';

// Importar o Bootstrap
import 'bootstrap/dist/js/bootstrap.bundle.min.js'; // Inclui jQuery, Popper.js e Bootstrap JS
import 'bootstrap/dist/css/bootstrap.min.css'; // Importar o CSS do Bootstrap

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
