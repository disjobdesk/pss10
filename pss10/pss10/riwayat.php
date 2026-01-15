<?php if ($data): ?>
<div class="p-4 bg-teal-100 rounded mb-4">
<p>Skor Terakhir:</p>
<p class="text-3xl font-bold"><?= $data['skor_total'] ?></p>
<p class="text-sm"><?= e($data['level_stress']) ?></p>
</div>
<?php else: ?>
<p class="mb-4">Anda belum mengisi PSS-10.</p>
<?php endif; ?>