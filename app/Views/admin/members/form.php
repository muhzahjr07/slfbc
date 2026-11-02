<?php
/**
 * Admin Member Form (Create / Edit)
 * Sri Lanka–France Business Council
 */
$isEdit = !empty($member);
$actionUrl = $isEdit ? url('/admin/members/' . (int)$member['id'] . '/edit') : url('/admin/members/create');
?>
<div class="mb-6 flex items-center justify-between border-b border-slate-100 pb-4">
  <div>
    <h1 class="text-2xl font-serif font-bold text-[#002654]"><?= $isEdit ? 'Edit Member Entity' : 'Add New Member Entity' ?></h1>
    <p class="text-xs text-slate-500 mt-1">Configure verified corporate details, industry categorization, and website links.</p>
  </div>
  <a href="<?= url('/admin/members') ?>" class="text-xs font-bold text-slate-500 hover:text-slate-800 flex items-center gap-1">
    <span class="material-symbols-outlined text-sm">arrow_back</span> Return to Directory
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
    <!-- Corporate Name -->
    <div>
      <label for="name" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">Corporate Entity Name *</label>
      <input type="text" id="name" name="name" required class="w-full text-sm rounded border-slate-300 focus:ring-[#002654] focus:border-[#002654]" value="<?= e($formData['name'] ?? '') ?>" placeholder="e.g. Michelin Lanka (Pvt) Ltd">
    </div>

    <!-- URL Slug -->
    <div>
      <label for="slug" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">URL Identifier (Slug)</label>
      <input type="text" id="slug" name="slug" class="w-full text-sm rounded border-slate-300 focus:ring-[#002654] focus:border-[#002654]" value="<?= e($formData['slug'] ?? '') ?>" placeholder="michelin-lanka (leave blank to auto-generate)">
    </div>

    <!-- Sector -->
    <div>
      <label for="sector_id" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">Primary Sector</label>
      <select id="sector_id" name="sector_id" class="w-full text-sm rounded border-slate-300 focus:ring-[#002654] focus:border-[#002654]">
        <option value="">-- Select Industry Sector --</option>
        <?php foreach ($sectors as $sec): ?>
          <option value="<?= (int)$sec['id'] ?>" <?= ((int)($formData['sector_id'] ?? 0) === (int)$sec['id']) ? 'selected' : '' ?>>
            <?= e($sec['name']) ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>

    <!-- Membership Tier -->
    <div>
      <label for="tier" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">Membership Tier *</label>
      <select id="tier" name="tier" class="w-full text-sm rounded border-slate-300 focus:ring-[#002654] focus:border-[#002654]">
        <option value="corporate" <?= (($formData['tier'] ?? '') === 'corporate') ? 'selected' : '' ?>>Corporate Member</option>
        <option value="associate" <?= (($formData['tier'] ?? '') === 'associate') ? 'selected' : '' ?>>Associate Member</option>
        <option value="patron" <?= (($formData['tier'] ?? '') === 'patron') ? 'selected' : '' ?>>Patron Member</option>
      </select>
    </div>

    <!-- Jurisdiction / Origin -->
    <div>
      <label for="origin" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">Jurisdiction / Origin</label>
      <input type="text" id="origin" name="origin" class="w-full text-sm rounded border-slate-300 focus:ring-[#002654] focus:border-[#002654]" value="<?= e($formData['origin'] ?? 'Sri Lanka') ?>" placeholder="Sri Lanka / France">
    </div>

    <!-- Website URL -->
    <div>
      <label for="website_url" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">Official Website URL</label>
      <input type="url" id="website_url" name="website_url" class="w-full text-sm rounded border-slate-300 focus:ring-[#002654] focus:border-[#002654]" value="<?= e($formData['website_url'] ?? '') ?>" placeholder="https://www.example.com">
    </div>

    <!-- Logo Upload -->
    <div class="md:col-span-2">
      <label for="logo" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">Corporate Emblem / Logo</label>
      <input type="file" id="logo" name="logo" accept=".jpg,.jpeg,.png,.svg,.webp" class="w-full text-sm rounded border-slate-300">
      <p class="text-xs text-slate-400 mt-1">Accepted: PNG, SVG, JPG, WebP. Maximum 2MB. Square or horizontal transparent vectors preferred.</p>
      <?php if (!empty($member['logo_path'])): ?>
        <div class="mt-2 flex items-center gap-2">
          <span class="text-xs text-slate-500">Current Logo:</span>
          <img src="<?= e($member['logo_path']) ?>" alt="" class="h-8 w-auto object-contain border p-1 rounded bg-slate-50">
        </div>
      <?php endif; ?>
    </div>

    <!-- Short Description -->
    <div class="md:col-span-2">
      <label for="short_description" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">Brief Description (Directory Card)</label>
      <textarea id="short_description" name="short_description" rows="2" class="w-full text-sm rounded border-slate-300 focus:ring-[#002654] focus:border-[#002654]" placeholder="1-2 sentences outlining the company's core operations and bilateral French connection."><?= e($formData['short_description'] ?? '') ?></textarea>
    </div>

    <!-- Full Profile -->
    <div class="md:col-span-2">
      <label for="full_profile" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">Full Corporate Profile (Detail Page)</label>
      <textarea id="full_profile" name="full_profile" rows="5" class="w-full text-sm rounded border-slate-300 focus:ring-[#002654] focus:border-[#002654]" placeholder="Detailed background on history, product offerings, trade corridors, and leadership."><?= e($formData['full_profile'] ?? '') ?></textarea>
    </div>

    <!-- Display Order & Checkboxes -->
    <div>
      <label for="display_order" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">Display Order</label>
      <input type="number" id="display_order" name="display_order" class="w-full text-sm rounded border-slate-300 focus:ring-[#002654] focus:border-[#002654]" value="<?= (int)($formData['display_order'] ?? 0) ?>">
    </div>

    <div class="flex items-center gap-6 pt-5">
      <label class="flex items-center gap-2 text-xs font-bold text-slate-700 cursor-pointer">
        <input type="checkbox" name="is_featured" value="1" <?= !empty($formData['is_featured']) ? 'checked' : '' ?> class="rounded border-slate-300 text-[#002654] focus:ring-[#002654]">
        Feature on Homepage
      </label>

      <label class="flex items-center gap-2 text-xs font-bold text-slate-700 cursor-pointer">
        <input type="checkbox" name="is_active" value="1" <?= (!isset($formData['is_active']) || !empty($formData['is_active'])) ? 'checked' : '' ?> class="rounded border-slate-300 text-[#002654] focus:ring-[#002654]">
        Active in Directory
      </label>
    </div>
  </div>

  <div class="flex items-center justify-end gap-3 pt-6 border-t border-slate-100">
    <a href="<?= url('/admin/members') ?>" class="px-4 py-2 border border-slate-300 text-slate-700 hover:bg-slate-50 rounded text-xs font-bold uppercase tracking-wider">Cancel</a>
    <button type="submit" class="px-5 py-2 bg-[#002654] hover:bg-[#001c3f] text-white rounded text-xs font-bold uppercase tracking-wider shadow-sm">
      <?= $isEdit ? 'Save Changes' : 'Create Member Entity' ?>
    </button>
  </div>
</form>
