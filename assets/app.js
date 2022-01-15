import './styles/scss/app.scss';
import './stimulus';

let $ = require('jquery');
global.$ = global.jQuery = $;
window.$ = window.jQuery = $;

require('bootstrap');

const imagesContext = require.context('./images', true, /\.(png|jpg|jpeg|gif|ico|svg|webp)$/);
imagesContext.keys().forEach(imagesContext);