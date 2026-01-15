<?php
require '../../config/database.php';
require '../../config/auth.php';
require '../../config/security.php';
require '../../config/helpers.php';

$title = "Add News PSS-10";
require '../../includes/layout/header.php';
require '../../includes/layout/navbar.php';

requireRole(['superadmin','admin']);

// function slugify($text) {
//     return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $text)));
// }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    csrf_check();

    $judul = $_POST['judul'];
    $slug  = slugify($judul);
    $isi   = $_POST['isi'];

    $stmt = $pdo->prepare(
        "INSERT INTO news (judul, slug, isi)
         VALUES (?, ?, ?)"
    );
    $stmt->execute([$judul, $slug, $isi]);

    header('Location: index.php');
    exit;
}
?>

<!-- <div class="flex flex-col items-center justify-center">

<h2 class="text-xl font-bold text-teal-700 mb-4">
Tambah Berita
</h2>

<form method="POST" class="max-w-2xl space-y-3">
<input type="hidden" name="csrf_token" value="<?= csrf_token() ?>">

<input type="text" name="judul"
 placeholder="Judul Berita"
 required
 class="w-full border p-2 rounded">

<textarea name="isi" rows="8"
 placeholder="Isi berita psikologi / edukasi"
 required
 class="w-full border p-2 rounded"></textarea>

<button class="bg-teal-600 text-white px-4 py-2 rounded">
Simpan
</button>
</form>

</div> -->


<div class="flex flex-col items-center justify-center">

  <h2 class="text-xl font-bold text-teal-700 mb-4">
    Tambah Berita
  </h2>

  <!-- FORM -->
  <form method="POST" id="formNews" class="w-full max-w-3xl space-y-4 bg-white p-6 rounded-xl shadow">

    <input type="hidden" name="csrf_token" value="<?= csrf_token() ?>">

    <input type="text" name="judul"
      placeholder="Judul Berita"
      required
      class="w-full border border-gray-300 p-3 rounded focus:ring focus:ring-teal-300">

    <!-- TEXTAREA DIGANTI CKEDITOR -->
    <textarea name="isi" id="editor" ></textarea>

    <button type="submit"
      class="bg-teal-600 text-white px-6 py-2 rounded-lg font-semibold hover:bg-teal-700 transition">
      Simpan
    </button>

  </form>

</div>

<!-- CKEDITOR -->
<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>

<script>
let editorInstance;

ClassicEditor
  .create(document.querySelector('#editor'), {
    toolbar: [
      'heading','|',
      'bold','italic','underline','|',
      'bulletedList','numberedList','|',
      'link','insertTable','imageUpload','|',
      'undo','redo'
    ],
    simpleUpload: {
      uploadUrl: 'upload_image.php'
    }
  })
  .then(editor => {
    editorInstance = editor;
  })
  .catch(error => {
    console.error(error);
  });

// 🔥 PENTING: sinkronkan editor ke textarea saat submit
document.getElementById('formNews').addEventListener('submit', function () {
  document.getElementById('editor').value = editorInstance.getData();
});
</script>

<script>
document.getElementById('formNews').addEventListener('submit', function (e) {
    const data = editorInstance.getData().trim();

    if (data === '') {
        alert('Isi berita tidak boleh kosong!');
        e.preventDefault();
        return false;
    }

    document.getElementById('editor').value = data;
});
</script>

<script>
var quill = new Quill('#editor', {
    theme: 'snow',
    modules: {
        toolbar: [
            [{ header: [1, 2, false] }],
            ['bold', 'italic', 'underline'],
            [{ list: 'ordered' }, { list: 'bullet' }],
            ['link', 'image'],
            ['clean']
        ]
    }
});
</script>



<?php require '../../includes/layout/footer.php'; ?>