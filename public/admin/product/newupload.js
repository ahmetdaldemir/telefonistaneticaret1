// Modal opening function
function openFileUploaderModal(variantId) {
    // Store the current variant ID
    localStorage.setItem('currentVariantId', variantId);

    // Get the file uploader container
    const container = document.getElementById('fileUploaderContainer');

    // Clear any previous file uploader instance
    container.innerHTML = '';

    // Initialize file uploader
    const fileUploader = new FileUploader({
        // File uploader configurations
        limit: 10,
        maxSize: 5,
        fileMaxSize: 5,
        extensions: ['jpg', 'jpeg', 'png', 'gif'],
        upload: {
            url: 'your-upload-url',
        },
        onListInput: function(items, listEl, parentEl, newInputEl, inputEl) {
            const Id = localStorage.getItem('currentVariantId');
            if (items.length > 0) {
                const jsonString = JSON.stringify(items);
                localStorage.setItem(Id, jsonString);
                document.getElementById(Id).value = jsonString;
            }
        },
    });

    // Show modal
    const modal = document.getElementById('fileUploadModal');
    modal.style.display = 'block';

    // Event listener for the confirm button
    document.getElementById('uploadConfirmButton').onclick = function() {
        modal.style.display = 'none';
    };

    // Close modal when clicking outside of the modal
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    };
}

// Close modal when clicking the close button
document.querySelector('.close').onclick = function() {
    const modal = document.getElementById('fileUploadModal');
    modal.style.display = 'none';
};
