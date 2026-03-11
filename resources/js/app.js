//import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

const fileInput = document.getElementById('club-pics-input');
const imagePreview = document.getElementById('preview-pic');

fileInput.addEventListener('change', function (event) {
    const file = event.target.files[0];

    if (file && file.type.startsWith('image/')) {
        const fileURL = URL.createObjectURL(file);
        imagePreview.src = fileURL;
        imagePreview.style.display = 'block';
    } else {
        imagePreview.style.display = 'none';
        imagePreview.src = '';
    }
});

Alpine.start();
