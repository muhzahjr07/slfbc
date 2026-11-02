/**
 * Sri Lanka–France Business Council (SLFBC)
 * Administration Panel Interactions & Confirmation Modals
 */

document.addEventListener('DOMContentLoaded', function () {
  // 1. Delete Confirmations with Form Submission
  const deleteButtons = document.querySelectorAll('.btn-confirm-delete');
  deleteButtons.forEach(function (button) {
    button.addEventListener('click', function (e) {
      const message = this.getAttribute('data-confirm') || 'Are you sure you want to permanently delete this record?';
      if (!confirm(message)) {
        e.preventDefault();
        return false;
      }
    });
  });

  // 2. Image Upload Preview
  const imageInputs = document.querySelectorAll('.admin-image-input');
  imageInputs.forEach(function (input) {
    input.addEventListener('change', function () {
      const targetPreviewId = this.getAttribute('data-preview');
      const previewImg = document.getElementById(targetPreviewId);
      if (previewImg && this.files && this.files[0]) {
        const reader = new FileReader();
        reader.onload = function (e) {
          previewImg.src = e.target.result;
          previewImg.style.display = 'block';
        };
        reader.readAsDataURL(this.files[0]);
      }
    });
  });

  // 3. Auto-slug generation from title or name
  const titleInput = document.getElementById('title-input') || document.getElementById('name-input');
  const slugInput = document.getElementById('slug-input');

  if (titleInput && slugInput && !slugInput.value) {
    titleInput.addEventListener('input', function () {
      const slug = this.value
        .toLowerCase()
        .trim()
        .replace(/[^\w\s-]/g, '')
        .replace(/[\s_-]+/g, '-')
        .replace(/^-+|-+$/g, '');
      slugInput.value = slug;
    });
  }
});
