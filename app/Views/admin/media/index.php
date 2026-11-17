<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-6 mb-6 border-b border-slate-200">
  <div>
    <div class="inline-flex items-center gap-2 mb-1">
      <span class="w-2 h-2 rounded-full bg-[#002654]"></span>
      <span class="text-xs font-bold uppercase tracking-wider text-[#002654]">Visual Assets &amp; Gallery Management</span>
    </div>
    <h1 class="font-serif-diplomatic text-2xl font-bold text-[#0b1e3b] m-0">Site Images &amp; Media Manager</h1>
    <p class="text-xs sm:text-sm text-slate-600 mt-1 m-0">
      Replace any Hero Slider banner, Corridor photo, President portrait, or Opportunity image in 1 click, or upload new photos to the public Photo Gallery. All images are automatically included in the All-in-One Backup.
    </p>
  </div>
  <a href="<?= url('/admin/backups') ?>" class="shrink-0 px-4 py-2.5 bg-emerald-700 hover:bg-emerald-800 text-white font-bold text-xs uppercase tracking-wider rounded shadow-sm flex items-center gap-1.5">
    <span class="material-symbols-outlined text-base">backup</span> Backup All Images (.ZIP)
  </a>
</div>

<!-- 1. UPLOAD NEW PHOTO TO PUBLIC GALLERY (/gallery) -->
<div class="p-6 bg-slate-50 border border-slate-200 rounded-lg mb-10">
  <div class="flex items-center gap-2 mb-4">
    <span class="material-symbols-outlined text-[#002654] text-2xl">add_a_photo</span>
    <h2 class="font-serif-diplomatic text-lg font-bold text-[#0b1e3b] m-0">Add New Photo to Public Gallery (/gallery)</h2>
  </div>

  <form method="POST" action="<?= url('/admin/media/gallery') ?>" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-12 gap-4 items-end">
    <?= csrf_field() ?>
    <div class="md:col-span-3">
      <label class="block text-xs font-bold uppercase text-slate-700 mb-1">Event / Photo Title *</label>
      <input type="text" name="title" required placeholder="e.g. 22nd AGM Reception" class="w-full px-3 py-2 text-xs sm:text-sm bg-white border border-slate-300 rounded">
    </div>
    <div class="md:col-span-2">
      <label class="block text-xs font-bold uppercase text-slate-700 mb-1">Category</label>
      <select name="category" class="w-full px-3 py-2 text-xs sm:text-sm bg-white border border-slate-300 rounded">
        <option value="Summits">Bilateral Summits</option>
        <option value="AGM">AGM &amp; Governance</option>
        <option value="Delegations">Trade Delegations</option>
        <option value="Embassy">Embassy Receptions</option>
      </select>
    </div>
    <div class="md:col-span-3">
      <label class="block text-xs font-bold uppercase text-slate-700 mb-1">Caption / Location</label>
      <input type="text" name="caption" placeholder="Short description..." class="w-full px-3 py-2 text-xs sm:text-sm bg-white border border-slate-300 rounded">
    </div>
    <div class="md:col-span-2">
      <label class="block text-xs font-bold uppercase text-slate-700 mb-1">Image File *</label>
      <input type="file" name="gallery_image" accept=".jpg,.jpeg,.png,.webp" required class="w-full text-xs text-slate-600">
    </div>
    <div class="md:col-span-2">
      <button type="submit" class="w-full py-2.5 px-4 bg-[#002654] hover:bg-[#001c3f] text-white font-bold text-xs uppercase tracking-wider rounded shadow-sm cursor-pointer">
        + Upload Photo
      </button>
    </div>
  </form>

  <?php if (!empty($galleryItems)): ?>
    <div class="mt-6 pt-6 border-t border-slate-200">
      <h3 class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-3">Custom Uploaded Gallery Items (<?= count($galleryItems) ?>)</h3>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <?php foreach ($galleryItems as $gi): ?>
          <div class="bg-white border border-slate-200 rounded-lg overflow-hidden shadow-sm flex flex-col justify-between">
            <div class="aspect-video bg-slate-100 overflow-hidden relative">
              <img src="<?= asset($gi['image_path']) ?>" alt="<?= e($gi['title']) ?>" class="w-full h-full object-cover">
              <span class="absolute top-2 left-2 px-2 py-0.5 bg-[#002654] text-white text-[10px] font-bold uppercase rounded"><?= e($gi['category']) ?></span>
            </div>
            <div class="p-3 flex items-center justify-between gap-2">
              <span class="text-xs font-bold text-slate-800 truncate"><?= e($gi['title']) ?></span>
              <form method="POST" action="<?= url('/admin/media/gallery/' . (int)$gi['id'] . '/delete') ?>">
                <?= csrf_field() ?>
                <button type="submit" onclick="return confirm('Remove this photo from the gallery?');" class="text-xs text-red-600 hover:underline font-bold cursor-pointer">Delete</button>
              </form>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  <?php endif; ?>
</div>

<!-- 2. CORE SITE IMAGES, HERO SLIDER & CORRIDOR BANNERS (1-CLICK REPLACE) -->
<div>
  <div class="mb-4">
    <h2 class="font-serif-diplomatic text-lg font-bold text-[#0b1e3b] m-0">Core Site Banners, Hero Slider &amp; Sector Images</h2>
    <p class="text-xs text-slate-500 mt-0.5 m-0">Upload a new image below any slot to immediately replace that image across the entire website.</p>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <?php foreach ($slotItems as $slot): ?>
      <div class="bg-white border border-slate-200 rounded-lg overflow-hidden shadow-sm flex flex-col justify-between">
        <div>
          <div class="aspect-[16/9] bg-slate-100 overflow-hidden relative flex items-center justify-center border-b border-slate-200">
            <?php if ($slot['exists']): ?>
              <img src="<?= asset('assets/images/' . $slot['filename']) ?>?v=<?= $slot['modified'] ?>" alt="<?= e($slot['label']) ?>" class="w-full h-full object-cover">
            <?php else: ?>
              <span class="text-xs text-slate-400">Image Not Found</span>
            <?php endif; ?>
            <span class="absolute bottom-2 right-2 px-2 py-0.5 bg-slate-900/80 text-white font-mono text-[10px] rounded">
              <?= round($slot['size'] / 1024, 1) ?> KB
            </span>
          </div>
          <div class="p-4">
            <h3 class="font-serif-diplomatic text-sm font-bold text-[#0b1e3b] mb-0.5"><?= e($slot['label']) ?></h3>
            <p class="font-mono text-[11px] text-slate-500 m-0">assets/images/<?= e($slot['filename']) ?></p>
          </div>
        </div>

        <form method="POST" action="<?= url('/admin/media/replace') ?>" enctype="multipart/form-data" class="px-4 py-3 bg-slate-50 border-t border-slate-200 flex items-center gap-2">
          <?= csrf_field() ?>
          <input type="hidden" name="slot_filename" value="<?= e($slot['filename']) ?>">
          <input type="file" name="replacement_image" accept=".jpg,.jpeg,.png,.webp" required class="w-full text-[11px] text-slate-600 file:mr-2 file:py-1 file:px-2 file:rounded file:border-0 file:text-[11px] file:font-semibold file:bg-slate-200 file:text-slate-800 cursor-pointer">
          <button type="submit" class="shrink-0 px-3 py-1.5 bg-[#002654] hover:bg-[#001c3f] text-white font-bold text-[11px] uppercase rounded cursor-pointer">
            Replace
          </button>
        </form>
      </div>
    <?php endforeach; ?>
  </div>
</div>
