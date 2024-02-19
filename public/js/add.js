
    document.addEventListener('DOMContentLoaded', function () {
        let selectType = document.getElementById('select-type');
        let fileField = document.getElementById('file_field');
        let linkField = document.getElementById('link_field');

        linkField.style.display = 'none';

        selectType.addEventListener('change', function () {

            if (selectType.value === 'file') {
                fileField.style.display = 'block';
                linkField.style.display = 'none';
            } else if (selectType.value === 'link') {
                fileField.style.display = 'none';
                linkField.style.display = 'block';
            }
        });
    });

