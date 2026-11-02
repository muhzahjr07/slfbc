<?php
/**
 * Admin News Listing View
 * Sri Lanka–France Business Council
 */
?>
<div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 border-b border-slate-100 pb-5">
  <div>
    <h1 class="text-2xl font-serif font-bold text-[#002654]">News &amp; Communiqués Management</h1>
    <p class="text-xs text-slate-500 mt-1">Publish diplomatic notices, trade delegation briefings, and chamber press statements.</p>
  </div>
  <div>
    <a href="<?= url('/admin/news/create') ?>" class="inline-flex items-center gap-1.5 px-4 py-2 bg-[#002654] hover:bg-[#001c3f] text-white rounded font-bold text-xs uppercase tracking-wider transition-colors shadow-sm">
      <span class="material-symbols-outlined text-base">add</span> New Communiqué
    </a>
  </div>
</div>

<div class="overflow-x-auto">
  <table class="w-full text-left text-sm">
    <thead>
      <tr class="text-xs font-bold uppercase tracking-wider text-slate-500 bg-slate-50 border-b border-slate-200">
        <th class="py-3 px-4">Title &amp; Excerpt</th>
        <th class="py-3 px-4">Category</th>
        <th class="py-3 px-4">Date</th>
        <th class="py-3 px-4 text-center">Status</th>
        <th class="py-3 px-4 text-center">Featured</th>
        <th class="py-3 px-4 text-right">Actions</th>
      </tr>
    </thead>
    <tbody class="divide-y divide-slate-100">
      <?php if (empty($articles)): ?>
        <tr>
          <td colspan="6" class="py-8 text-center text-slate-400 text-xs">No articles recorded.</td>
        </tr>
      <?php else: ?>
        <?php foreach ($articles as $art): ?>
          <tr class="hover:bg-slate-50 transition-colors">
            <td class="py-3 px-4">
              <strong class="text-slate-800 block leading-snug"><?= e($art['title']) ?></strong>
              <span class="text-slate-400 text-xs font-mono">/news/<?= e($art['slug']) ?></span>
            </td>
            <td class="py-3 px-4 text-xs text-slate-600"><?= e($art['category_name'] ?? 'General') ?></td>
            <td class="py-3 px-4 text-xs text-slate-500"><?= date('M d, Y', strtotime($art['published_at'])) ?></td>
            <td class="py-3 px-4 text-center">
              <?php if ($art['status'] === 'published'): ?>
                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-800">Published</span>
              <?php else: ?>
                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-semibold bg-amber-100 text-amber-800">Draft</span>
              <?php endif; ?>
            </td>
            <td class="py-3 px-4 text-center">
              <?php if (!empty($art['is_featured'])): ?>
                <span class="material-symbols-outlined text-amber-500 text-lg">star</span>
              <?php else: ?>
                <span class="text-slate-300">&mdash;</span>
              <?php endif; ?>
            </td>
            <td class="py-3 px-4 text-right">
              <div class="inline-flex items-center gap-1.5">
                <a href="<?= url('/admin/news/' . (int)$art['id'] . '/edit') ?>" class="p-1.5 text-slate-600 hover:text-[#002654] rounded hover:bg-slate-100" title="Edit">
                  <span class="material-symbols-outlined text-lg">edit</span>
                </a>
                <form action="<?= url('/admin/news/' . (int)$art['id'] . '/delete') ?>" method="POST" class="inline" onsubmit="return confirm('Permanently delete article: <?= e(addslashes($art['title'])) ?>?');">
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
