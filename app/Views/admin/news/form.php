<?php
/**
 * Admin News Form (Create / Edit)
 * Sri Lanka–France Business Council
 */
$isEdit = !empty($article);
$actionUrl = $isEdit ? url('/admin/news/' . (int)$article['id'] . '/edit') : url('/admin/news/create');
?>
<div class="mb-6 flex items-center justify-between border-b border-slate-100 pb-4">
  <div>
    <h1 class="text-2xl font-serif font-bold text-[#002654]"><?= $isEdit ? 'Edit Communiqué' : 'Create New Communiqué' ?></h1>
    <p class="text-xs text-slate-500 mt-1">Draft or publish bilateral dispatches, market notices, and chamber press releases.</p>
  </div>
  <a href="<?= url('/admin/news') ?>" class="text-xs font-bold text-slate-500 hover:text-slate-800 flex items-center gap-1">
    <span class="material-symbols-outlined text-sm">arrow_back</span> Return to News List
  </a>
</div>

<?php if (!empty($errors)): ?>
  <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-600 rounded text-red-900 text-xs">
    <ul class="list-disc pl-5 space-y-1">
      <?php foreach ($errors as $err): ?>
        <li><?= e($err) ?></li>
      <?php endforeach; ?>
    </ul>
  </div>
<?php endif; ?>

<form action="<?= $actionUrl ?>" method="POST" enctype="multipart/form-data" class="space-y-6">
  <?= csrf_field() ?>

  <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div class="md:col-span-2">
      <label for="title" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">Article Title *</label>
      <input type="text" id="title" name="title" required class="w-full text-sm rounded border-slate-300 focus:ring-[#002654] focus:border-[#002654]" value="<?= e($formData['title'] ?? '') ?>" placeholder="e.g. SLFBC Leads Trade Delegation to Paris for Bilateral Agricultural Sourcing">
    </div>

    <div>
      <label for="slug" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">URL Slug</label>
      <input type="text" id="slug" name="slug" class="w-full text-sm rounded border-slate-300 focus:ring-[#002654] focus:border-[#002654]" value="<?= e($formData['slug'] ?? '') ?>" placeholder="leave blank to auto-generate from title">
    </div>

    <div>
      <label for="category_id" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">Category</label>
      <select id="category_id" name="category_id" class="w-full text-sm rounded border-slate-300 focus:ring-[#002654] focus:border-[#002654]">
        <option value="">-- Select Category --</option>
        <?php foreach ($categories as $cat): ?>
          <option value="<?= (int)$cat['id'] ?>" <?= ((int)($formData['category_id'] ?? 0) === (int)$cat['id']) ? 'selected' : '' ?>>
            <?= e($cat['name']) ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>

    <div>
      <label for="author" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">Author / Attributed Authority</label>
      <input type="text" id="author" name="author" class="w-full text-sm rounded border-slate-300 focus:ring-[#002654] focus:border-[#002654]" value="<?= e($formData['author'] ?? 'Ceylon Chamber Secretariat') ?>">
    </div>

    <div>
      <label for="published_at" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">Publication Timestamp</label>
      <input type="text" id="published_at" name="published_at" class="w-full text-sm rounded border-slate-300 focus:ring-[#002654] focus:border-[#002654]" value="<?= e($formData['published_at'] ?? date('Y-m-d H:i:s')) ?>">
    </div>

    <div>
      <label for="status" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">Publish Status *</label>
      <select id="status" name="status" class="w-full text-sm rounded border-slate-300 focus:ring-[#002654] focus:border-[#002654]">
        <option value="published" <?= (($formData['status'] ?? '') === 'published') ? 'selected' : '' ?>>Published (Live)</option>
        <option value="draft" <?= (($formData['status'] ?? '') === 'draft') ? 'selected' : '' ?>>Draft (Internal)</option>
      </select>
    </div>

    <div>
      <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">Homepage Showcase</label>
      <div class="pt-2">
        <label class="flex items-center gap-2 text-xs font-bold text-slate-700 cursor-pointer">
          <input type="checkbox" name="is_featured" value="1" <?= !empty($formData['is_featured']) ? 'checked' : '' ?> class="rounded border-slate-300 text-[#002654] focus:ring-[#002654]">
          Pin as Featured Article
        </label>
      </div>
    </div>

    <div class="md:col-span-2">
      <label for="cover_image" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">Cover Photograph</label>
      <input type="file" id="cover_image" name="cover_image" accept=".jpg,.jpeg,.png,.webp" class="w-full text-sm rounded border-slate-300">
      <p class="text-xs text-slate-400 mt-1">Accepted: JPG, PNG, WebP. High quality 1200x630 landscape image recommended.</p>
      <?php if (!empty($article['cover_image'])): ?>
        <div class="mt-2 flex items-center gap-2">
          <span class="text-xs text-slate-500">Current Image:</span>
          <img src="<?= e($article['cover_image']) ?>" alt="" class="h-12 w-auto object-cover rounded border">
        </div>
      <?php endif; ?>
    </div>

    <div class="md:col-span-2">
      <label for="excerpt" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">Standfirst / Short Summary</label>
      <textarea id="excerpt" name="excerpt" rows="2" class="w-full text-sm rounded border-slate-300 focus:ring-[#002654] focus:border-[#002654]" placeholder="Key takeaways or introductory excerpt shown in archives."><?= e($formData['excerpt'] ?? '') ?></textarea>
    </div>

    <div class="md:col-span-2">
      <label for="content" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">Full Article Body *</label>
      <textarea id="content" name="content" rows="10" required class="w-full text-sm rounded border-slate-300 focus:ring-[#002654] focus:border-[#002654]" placeholder="Full text of the dispatch or communiqué..."><?= e($formData['content'] ?? '') ?></textarea>
    </div>

    <div>
      <label for="meta_title" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">SEO Title Override</label>
      <input type="text" id="meta_title" name="meta_title" class="w-full text-sm rounded border-slate-300 focus:ring-[#002654] focus:border-[#002654]" value="<?= e($formData['meta_title'] ?? '') ?>" placeholder="Default is article title">
    </div>

    <div>
      <label for="meta_description" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">SEO Meta Description</label>
      <input type="text" id="meta_description" name="meta_description" class="w-full text-sm rounded border-slate-300 focus:ring-[#002654] focus:border-[#002654]" value="<?= e($formData['meta_description'] ?? '') ?>" placeholder="150-160 characters summary for Google">
    </div>
  </div>

  <div class="flex items-center justify-end gap-3 pt-6 border-t border-slate-100">
    <a href="<?= url('/admin/news') ?>" class="px-4 py-2 border border-slate-300 text-slate-700 hover:bg-slate-50 rounded text-xs font-bold uppercase tracking-wider">Cancel</a>
    <button type="submit" class="px-5 py-2 bg-[#002654] hover:bg-[#001c3f] text-white rounded text-xs font-bold uppercase tracking-wider shadow-sm">
      <?= $isEdit ? 'Update Communiqué' : 'Publish Article' ?>
    </button>
  </div>
</form>
