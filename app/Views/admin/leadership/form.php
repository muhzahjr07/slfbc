<?php
/**
 * Admin Leadership Form (Create / Edit)
 * Sri Lanka–France Business Council
 */
$isEdit = !empty($leader);
$actionUrl = $isEdit ? url('/admin/leadership/' . (int)$leader['id'] . '/edit') : url('/admin/leadership/create');
?>
<div class="mb-6 flex items-center justify-between border-b border-slate-100 pb-4">
  <div>
    <h1 class="text-2xl font-serif font-bold text-[#002654]"><?= $isEdit ? 'Edit Leadership Officer' : 'Add Committee Officer' ?></h1>
    <p class="text-xs text-slate-500 mt-1">Configure officer credentials, official Chamber title, corporate entity, and portrait photo.</p>
  </div>
  <a href="<?= url('/admin/leadership') ?>" class="text-xs font-bold text-slate-500 hover:text-slate-800 flex items-center gap-1">
    <span class="material-symbols-outlined text-sm">arrow_back</span> Return to Officers
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
    <div>
      <label for="name" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">Officer Name *</label>
      <input type="text" id="name" name="name" required class="w-full text-sm rounded border-slate-300 focus:ring-[#002654] focus:border-[#002654]" value="<?= e($formData['name'] ?? '') ?>" placeholder="e.g. Asitha Rajapakse">
    </div>

    <div>
      <label for="role_title" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">Council Role / Designation *</label>
      <input type="text" id="role_title" name="role_title" required class="w-full text-sm rounded border-slate-300 focus:ring-[#002654] focus:border-[#002654]" value="<?= e($formData['role_title'] ?? '') ?>" placeholder="e.g. President / Senior Vice President / Committee Member">
    </div>

    <div>
      <label for="organization" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">Corporate Organization *</label>
      <input type="text" id="organization" name="organization" required class="w-full text-sm rounded border-slate-300 focus:ring-[#002654] focus:border-[#002654]" value="<?= e($formData['organization'] ?? '') ?>" placeholder="e.g. D.L. & F. De Saram">
    </div>

    <div>
      <label for="category" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">Governance Category *</label>
      <select id="category" name="category" class="w-full text-sm rounded border-slate-300 focus:ring-[#002654] focus:border-[#002654]">
        <option value="president" <?= (($formData['category'] ?? '') === 'president') ? 'selected' : '' ?>>President of Council</option>
        <option value="vice_president" <?= (($formData['category'] ?? '') === 'vice_president') ? 'selected' : '' ?>>Vice President</option>
        <option value="committee" <?= (($formData['category'] ?? '') === 'committee') ? 'selected' : '' ?>>Executive Committee Member</option>
        <option value="institutional" <?= (($formData['category'] ?? '') === 'institutional') ? 'selected' : '' ?>>Institutional Representative (Embassy / Chamber)</option>
        <option value="patron" <?= (($formData['category'] ?? '') === 'patron') ? 'selected' : '' ?>>Patron / Special Invitee</option>
      </select>
    </div>

    <div>
      <label for="term_year" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">Committee Term Year</label>
      <input type="text" id="term_year" name="term_year" class="w-full text-sm rounded border-slate-300 focus:ring-[#002654] focus:border-[#002654]" value="<?= e($formData['term_year'] ?? '2025/26') ?>">
    </div>

    <div>
      <label for="display_order" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">Display Priority Order</label>
      <input type="number" id="display_order" name="display_order" class="w-full text-sm rounded border-slate-300 focus:ring-[#002654] focus:border-[#002654]" value="<?= (int)($formData['display_order'] ?? 0) ?>">
    </div>

    <div class="md:col-span-2">
      <label for="portrait" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">Executive Portrait</label>
      <input type="file" id="portrait" name="portrait" accept=".jpg,.jpeg,.png,.webp" class="w-full text-sm rounded border-slate-300">
      <p class="text-xs text-slate-400 mt-1">Accepted: JPG, PNG, WebP. High resolution headshot on neutral background recommended.</p>
      <?php if (!empty($leader['portrait_path'])): ?>
        <div class="mt-2 flex items-center gap-2">
          <span class="text-xs text-slate-500">Current Portrait:</span>
          <img src="<?= e($leader['portrait_path']) ?>" alt="" class="h-10 w-10 object-cover rounded-full border">
        </div>
      <?php endif; ?>
    </div>

    <div class="md:col-span-2">
      <label for="bio" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">Executive Bio / Brief Profile</label>
      <textarea id="bio" name="bio" rows="3" class="w-full text-sm rounded border-slate-300 focus:ring-[#002654] focus:border-[#002654]" placeholder="Professional background, corporate tenure, and bilateral initiatives..."><?= e($formData['bio'] ?? '') ?></textarea>
    </div>

    <div>
      <label class="flex items-center gap-2 text-xs font-bold text-slate-700 cursor-pointer pt-2">
        <input type="checkbox" name="is_active" value="1" <?= (!isset($formData['is_active']) || !empty($formData['is_active'])) ? 'checked' : '' ?> class="rounded border-slate-300 text-[#002654] focus:ring-[#002654]">
        Active in Official Governance List
      </label>
    </div>
  </div>

  <div class="flex items-center justify-end gap-3 pt-6 border-t border-slate-100">
    <a href="<?= url('/admin/leadership') ?>" class="px-4 py-2 border border-slate-300 text-slate-700 hover:bg-slate-50 rounded text-xs font-bold uppercase tracking-wider">Cancel</a>
    <button type="submit" class="px-5 py-2 bg-[#002654] hover:bg-[#001c3f] text-white rounded text-xs font-bold uppercase tracking-wider shadow-sm">
      <?= $isEdit ? 'Save Changes' : 'Add Committee Officer' ?>
    </button>
  </div>
</form>
