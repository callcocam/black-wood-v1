require('./bootstrap');
require('./ckeditor');
console.log(editor())
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

require('./components/Example');