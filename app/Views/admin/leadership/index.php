<?php
/**
 * Admin Leadership Listing View
 * Sri Lanka–France Business Council
 */
?>
<div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 border-b border-slate-100 pb-5">
  <div>
    <h1 class="text-2xl font-serif font-bold text-[#002654]">Governance &amp; Executive Committee</h1>
    <p class="text-xs text-slate-500 mt-1">Maintain ratified committee members, designations, corporate affiliations, and term years.</p>
  </div>
  <div>
    <a href="<?= url('/admin/leadership/create') ?>" class="inline-flex items-center gap-1.5 px-4 py-2 bg-[#002654] hover:bg-[#001c3f] text-white rounded font-bold text-xs uppercase tracking-wider transition-colors shadow-sm">
      <span class="material-symbols-outlined text-base">add</span> Add Officer
    </a>
  </div>
</div>

<div class="overflow-x-auto">
  <table class="w-full text-left text-sm">
    <thead>
      <tr class="text-xs font-bold uppercase tracking-wider text-slate-500 bg-slate-50 border-b border-slate-200">
        <th class="py-3 px-4">Officer Name &amp; Title</th>
        <th class="py-3 px-4">Corporate Entity</th>
        <th class="py-3 px-4">Category</th>
        <th class="py-3 px-4">Term Year</th>
        <th class="py-3 px-4 text-center">Status</th>
        <th class="py-3 px-4 text-right">Actions</th>
      </tr>
    </thead>
    <tbody class="divide-y divide-slate-100">
      <?php if (empty($leaders)): ?>
        <tr>
          <td colspan="6" class="py-8 text-center text-slate-400 text-xs">No leadership officers recorded.</td>
        </tr>
      <?php else: ?>
        <?php foreach ($leaders as $l): ?>
          <tr class="hover:bg-slate-50 transition-colors">
            <td class="py-3 px-4">
              <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-full border border-slate-200 bg-slate-100 flex items-center justify-center font-bold text-xs text-[#002654] shrink-0 overflow-hidden">
                  <?php if (!empty($l['portrait_path']) && file_exists(dirname(__DIR__, 4) . '/public' . $l['portrait_path'])): ?>
                    <img src="<?= e($l['portrait_path']) ?>" alt="" class="w-full h-full object-cover">
                  <?php else: ?>
                    <?= e(substr($l['name'], 0, 1)) ?>
                  <?php endif; ?>
                </div>
                <div>
                  <strong class="text-slate-800 block leading-snug"><?= e($l['name']) ?></strong>
                  <span class="text-slate-500 text-xs font-semibold"><?= e($l['role_title']) ?></span>
                </div>
              </div>
            </td>
            <td class="py-3 px-4 text-xs text-slate-700 font-semibold"><?= e($l['organization']) ?></td>
            <td class="py-3 px-4">
              <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-semibold bg-blue-50 text-blue-700 border border-blue-200">
                <?= e(ucfirst($l['category'])) ?>
              </span>
            </td>
            <td class="py-3 px-4 text-xs text-slate-500 font-mono"><?= e($l['term_year']) ?></td>
            <td class="py-3 px-4 text-center">
              <?php if (!empty($l['is_active'])): ?>
                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-800">Active</span>
              <?php else: ?>
                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-semibold bg-slate-100 text-slate-600">Archived</span>
              <?php endif; ?>
            </td>
            <td class="py-3 px-4 text-right">
              <div class="inline-flex items-center gap-1.5">
                <a href="<?= url('/admin/leadership/' . (int)$l['id'] . '/edit') ?>" class="p-1.5 text-slate-600 hover:text-[#002654] rounded hover:bg-slate-100" title="Edit">
                  <span class="material-symbols-outlined text-lg">edit</span>
                </a>
                <form action="<?= url('/admin/leadership/' . (int)$l['id'] . '/delete') ?>" method="POST" class="inline" onsubmit="return confirm('Remove <?= e(addslashes($l['name'])) ?> from the Executive Committee?');">
                  <?= csrf_field() ?>
                  <button type="submit" class="p-1.5 text-slate-400 hover:text-red-700 rounded hover:bg-slate-100" title="Delete">
                    <span class="material-symbols-outlined text-lg">delete</span>
                  </button>
                </form>
              </div>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php endif; ?>
    </tbody>
  </table>
</div>
