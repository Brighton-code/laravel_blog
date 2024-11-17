import './bootstrap';
import 'tinymce/tinymce.min.js';
import 'tinymce/skins/ui/oxide/skin.min.css';
import 'tinymce/icons/default/icons';
import 'tinymce/themes/silver/theme';
import 'tinymce/models/dom/model';

window.addEventListener('DOMContentLoaded', () => {
    tinymce.init({
        selector: 'textarea.editor',
        license_key: 'gpl',
        /* TinyMCE configuration options */
        skin: false,
        content_css: false
    });
});
