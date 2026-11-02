<?php
/**
 * Admin Opportunity Form (Create / Edit)
 * Sri Lanka–France Business Council
 */
$isEdit = !empty($opportunity);
$actionUrl = $isEdit ? url('/admin/opportunities/' . (int)$opportunity['id'] . '/edit') : url('/admin/opportunities/create');
?>
<div class="mb-6 flex items-center justify-between border-b border-slate-100 pb-4">
  <div>
    <h1 class="text-2xl font-serif font-bold text-[#002654]"><?= $isEdit ? 'Edit Opportunity Track' : 'Create Opportunity Track' ?></h1>
    <p class="text-xs text-slate-500 mt-1">Configure strategic commercial track, investment details, and corridor classification.</p>
  </div>
  <a href="<?= url('/admin/opportunities') ?>" class="text-xs font-bold text-slate-500 hover:text-slate-800 flex items-center gap-1">
    <span class="material-symbols-outlined text-sm">arrow_back</span> Return to Tracks
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

<form action="<?= $actionUrl ?>" method="POST" class="space-y-6">
  <?= csrf_field() ?>

  <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div class="md:col-span-2">
      <label for="title" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">Opportunity Title *</label>
      <input type="text" id="title" name="title" required class="w-full text-sm rounded border-slate-300 focus:ring-[#002654] focus:border-[#002654]" value="<?= e($formData['title'] ?? '') ?>" placeholder="e.g. Sustainable Maritime Logistics & Cold-Chain Infrastructure">
    </div>

    <div>
      <label for="slug" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">URL Identifier (Slug)</label>
      <input type="text" id="slug" name="slug" class="w-full text-sm rounded border-slate-300 focus:ring-[#002654] focus:border-[#002654]" value="<?= e($formData['slug'] ?? '') ?>" placeholder="leave blank to auto-generate">
    </div>

    <div>
      <label for="track" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">Strategic Sector Track *</label>
      <input type="text" id="track" name="track" required class="w-full text-sm rounded border-slate-300 focus:ring-[#002654] focus:border-[#002654]" value="<?= e($formData['track'] ?? '') ?>" placeholder="e.g. Maritime & Port Infrastructure">
    </div>

    <div>
      <label for="corridor" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">Trade / Investment Corridor</label>
      <select id="corridor" name="corridor" class="w-full text-sm rounded border-slate-300 focus:ring-[#002654] focus:border-[#002654]">
        <option value="bilateral" <?= (($formData['corridor'] ?? '') === 'bilateral') ? 'selected' : '' ?>>Bilateral Commercial Trade</option>
        <option value="inward_investment" <?= (($formData['corridor'] ?? '') === 'inward_investment') ? 'selected' : '' ?>>French FDI into Sri Lanka</option>
        <option value="export_market" <?= (($formData['corridor'] ?? '') === 'export_market') ? 'selected' : '' ?>>Sri Lankan Exports to France &amp; EU</option>
        <option value="tech_transfer" <?= (($formData['corridor'] ?? '') === 'tech_transfer') ? 'selected' : '' ?>>Joint R&amp;D &amp; Tech Licensing</option>
      </select>
    </div>

    <div>
      <label for="status_label" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">Pipeline Status Tag</label>
      <input type="text" id="status_label" name="status_label" class="w-full text-sm rounded border-slate-300 focus:ring-[#002654] focus:border-[#002654]" value="<?= e($formData['status_label'] ?? 'Active Project Pipeline') ?>">
    </div>

    <div class="md:col-span-2">
      <label for="summary" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">Executive Summary *</label>
      <textarea id="summary" name="summary" rows="3" required class="w-full text-sm rounded border-slate-300 focus:ring-[#002654] focus:border-[#002654]" placeholder="High-level commercial opportunity description shown on portal cards..."><?= e($formData['summary'] ?? '') ?></textarea>
    </div>

    <div class="md:col-span-2">
      <label for="details" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">Strategic Background &amp; Nexus</label>
      <textarea id="details" name="details" rows="5" class="w-full text-sm rounded border-slate-300 focus:ring-[#002654] focus:border-[#002654]" placeholder="Regulatory incentives, institutional partners (BOI/EDB), and requirements..."><?= e($formData['details'] ?? '') ?></textarea>
    </div>

    <div>
      <label class="flex items-center gap-2 text-xs font-bold text-slate-700 cursor-pointer pt-2">
        <input type="checkbox" name="is_featured" value="1" <?= !empty($formData['is_featured']) ? 'checked' : '' ?> class="rounded border-slate-300 text-[#002654] focus:ring-[#002654]">
        Feature on Opportunities Page
      </label>
    </div>
  </div>

  <div class="flex items-center justify-end gap-3 pt-6 border-t border-slate-100">
    <a href="<?= url('/admin/opportunities') ?>" class="px-4 py-2 border border-slate-300 text-slate-700 hover:bg-slate-50 rounded text-xs font-bold uppercase tracking-wider">Cancel</a>
    <button type="submit" class="px-5 py-2 bg-[#002654] hover:bg-[#001c3f] text-white rounded text-xs font-bold uppercase tracking-wider shadow-sm">
      <?= $isEdit ? 'Save Changes' : 'Publish Opportunity' ?>
    </button>
  </div>
</form>
