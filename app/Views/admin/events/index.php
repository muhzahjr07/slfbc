<?php
/**
 * Admin Events Listing View
 * Sri Lanka–France Business Council
 */
?>
<div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 border-b border-slate-100 pb-5">
  <div>
    <h1 class="text-2xl font-serif font-bold text-[#002654]">Events &amp; Summits Management</h1>
    <p class="text-xs text-slate-500 mt-1">Schedule and manage bilateral symposiums, AGM assemblies, trade missions, and proceedings reports.</p>
  </div>
  <div>
    <a href="<?= url('/admin/events/create') ?>" class="inline-flex items-center gap-1.5 px-4 py-2 bg-[#002654] hover:bg-[#001c3f] text-white rounded font-bold text-xs uppercase tracking-wider transition-colors shadow-sm">
      <span class="material-symbols-outlined text-base">add</span> Schedule Event
    </a>
  </div>
</div>

<div class="overflow-x-auto">
  <table class="w-full text-left text-sm">
    <thead>
      <tr class="text-xs font-bold uppercase tracking-wider text-slate-500 bg-slate-50 border-b border-slate-200">
        <th class="py-3 px-4">Event Title</th>
        <th class="py-3 px-4">Category</th>
        <th class="py-3 px-4">Date &amp; Time</th>
        <th class="py-3 px-4">Venue</th>
        <th class="py-3 px-4 text-center">Status</th>
        <th class="py-3 px-4 text-right">Actions</th>
      </tr>
    </thead>
    <tbody class="divide-y divide-slate-100">
      <?php if (empty($events)): ?>
        <tr>
          <td colspan="6" class="py-8 text-center text-slate-400 text-xs">No events recorded.</td>
        </tr>
      <?php else: ?>
        <?php foreach ($events as $evt): ?>
          <?php $isPast = strtotime($evt['start_datetime']) < time(); ?>
          <tr class="hover:bg-slate-50 transition-colors">
            <td class="py-3 px-4">
              <strong class="text-slate-800 block leading-snug"><?= e($evt['title']) ?></strong>
              <span class="text-slate-400 text-xs font-mono">/events/<?= e($evt['slug']) ?></span>
            </td>
            <td class="py-3 px-4">
              <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-semibold bg-amber-50 text-amber-800 border border-amber-200">
                <?= e($evt['category'] ?? 'Summit') ?>
              </span>
            </td>
            <td class="py-3 px-4 text-xs">
              <span class="block font-semibold text-slate-700"><?= date('M d, Y', strtotime($evt['start_datetime'])) ?></span>
              <span class="text-slate-400"><?= date('h:i A', strtotime($evt['start_datetime'])) ?></span>
            </td>
            <td class="py-3 px-4 text-xs text-slate-600">
              <?= e($evt['venue']) ?> (<?= e($evt['location_city'] ?? 'Colombo') ?>)
            </td>
            <td class="py-3 px-4 text-center">
              <?php if ($isPast): ?>
                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-semibold bg-slate-100 text-slate-600">Archived</span>
              <?php else: ?>
                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-800">Upcoming</span>
              <?php endif; ?>
            </td>
            <td class="py-3 px-4 text-right">
              <div class="inline-flex items-center gap-1.5">
                <a href="<?= url('/admin/events/' . (int)$evt['id'] . '/edit') ?>" class="p-1.5 text-slate-600 hover:text-[#002654] rounded hover:bg-slate-100" title="Edit">
                  <span class="material-symbols-outlined text-lg">edit</span>
                </a>
                <form action="<?= url('/admin/events/' . (int)$evt['id'] . '/delete') ?>" method="POST" class="inline" onsubmit="return confirm('Permanently delete event: <?= e(addslashes($evt['title'])) ?>?');">
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
