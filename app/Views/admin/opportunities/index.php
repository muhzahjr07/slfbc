<?php
/**
 * Admin Opportunities Listing View
 * Sri Lanka–France Business Council
 */
?>
<div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 border-b border-slate-100 pb-5">
  <div>
    <h1 class="text-2xl font-serif font-bold text-[#002654]">Business &amp; Partnership Opportunities</h1>
    <p class="text-xs text-slate-500 mt-1">Manage strategic trade corridors, investment pipelines, and verified bilateral collaboration tracks.</p>
  </div>
  <div>
    <a href="<?= url('/admin/opportunities/create') ?>" class="inline-flex items-center gap-1.5 px-4 py-2 bg-[#002654] hover:bg-[#001c3f] text-white rounded font-bold text-xs uppercase tracking-wider transition-colors shadow-sm">
      <span class="material-symbols-outlined text-base">add</span> Add Track
    </a>
  </div>
</div>

<div class="overflow-x-auto">
  <table class="w-full text-left text-sm">
    <thead>
      <tr class="text-xs font-bold uppercase tracking-wider text-slate-500 bg-slate-50 border-b border-slate-200">
        <th class="py-3 px-4">Opportunity Title</th>
        <th class="py-3 px-4">Strategic Track</th>
        <th class="py-3 px-4">Corridor</th>
        <th class="py-3 px-4">Status Label</th>
        <th class="py-3 px-4 text-center">Featured</th>
        <th class="py-3 px-4 text-right">Actions</th>
      </tr>
    </thead>
    <tbody class="divide-y divide-slate-100">
      <?php if (empty($opportunities)): ?>
        <tr>
          <td colspan="6" class="py-8 text-center text-slate-400 text-xs">No opportunities recorded.</td>
        </tr>
      <?php else: ?>
        <?php foreach ($opportunities as $opp): ?>
          <tr class="hover:bg-slate-50 transition-colors">
            <td class="py-3 px-4">
              <strong class="text-slate-800 block leading-snug"><?= e($opp['title']) ?></strong>
              <span class="text-slate-500 text-xs truncate max-w-sm block"><?= e($opp['summary']) ?></span>
            </td>
            <td class="py-3 px-4">
              <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-semibold bg-blue-50 text-blue-700">
                <?= e($opp['track']) ?>
              </span>
            </td>
            <td class="py-3 px-4 text-xs text-slate-500"><?= e(ucfirst($opp['corridor'] ?? 'Bilateral')) ?></td>
            <td class="py-3 px-4 text-xs font-semibold text-slate-700"><?= e($opp['status_label'] ?? 'Active') ?></td>
            <td class="py-3 px-4 text-center">
              <?php if (!empty($opp['is_featured'])): ?>
                <span class="material-symbols-outlined text-amber-500 text-lg">star</span>
              <?php else: ?>
                <span class="text-slate-300">&mdash;</span>
              <?php endif; ?>
            </td>
            <td class="py-3 px-4 text-right">
              <div class="inline-flex items-center gap-1.5">
                <a href="<?= url('/admin/opportunities/' . (int)$opp['id'] . '/edit') ?>" class="p-1.5 text-slate-600 hover:text-[#002654] rounded hover:bg-slate-100" title="Edit">
                  <span class="material-symbols-outlined text-lg">edit</span>
                </a>
                <form action="<?= url('/admin/opportunities/' . (int)$opp['id'] . '/delete') ?>" method="POST" class="inline" onsubmit="return confirm('Remove opportunity: <?= e(addslashes($opp['title'])) ?>?');">
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
