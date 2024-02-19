    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('select-type').addEventListener('change', function() {
            var addType = this.value;
            if (addType === 'file') {
                document.getElementById('file_field').style.display = 'block';
                document.getElementById('link_field').style.display = 'none';
            } else if (addType === 'link') {
                document.getElementById('file_field').style.display = 'none';
                document.getElementById('link_field').style.display = 'block';
            }
        });
    });

