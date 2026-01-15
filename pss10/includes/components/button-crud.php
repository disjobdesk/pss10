<?php
function btn_edit($link) {
  echo '<a href="'.$link.'"
        class="bg-yellow-400 text-white px-3 py-2 rounded-lg font-semibold">
        Edit</a>';
}

function btn_delete($link) {
  echo '<a href="'.$link.'"
        onclick="return confirm(\'Yakin hapus data?\')"
        class="bg-red-500 text-white px-3 py-2 rounded-lg font-semibold">
        Hapus</a>';
}
