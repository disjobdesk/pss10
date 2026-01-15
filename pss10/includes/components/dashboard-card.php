<?php
function dashboard_card($title, $desc, $link, $color = 'teal') {

$colors = [
  'teal'  => 'bg-teal-600 hover:bg-teal-700',
  'tosca' => 'bg-tosca hover:bg-teal-500'
];
?>

<a href="<?= $link ?>"
   class="<?= $colors[$color] ?> text-white
          rounded-2xl p-6
          flex flex-col justify-between
          shadow-md
          transition
          focus:outline-none">

  <div>
    <h2 class="text-2xl font-bold mb-2">
      <?= $title ?>
    </h2>
    <p class="text-lg opacity-95">
      <?= $desc ?>
    </p>
  </div>

  <div class="mt-4 text-lg font-semibold">
    Buka →
  </div>

</a>

<?php } ?>
