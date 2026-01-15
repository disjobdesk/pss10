<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title><?= $title ?? 'PSS-10' ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>

 <script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/classic/ckeditor.js"></script>


  <!-- Theme warna -->
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            tealsoft: '#e6fffa',
            tosca: '#2dd4bf'
          }
        }
      }
    }
  </script>


<style>
@media print {

  /* Sembunyikan UI */
  header, nav, footer, button, a {
    display: none !important;
  }

  /* Sembunyikan kolom detail */
  .no-print {
    display: none !important;
  }

  body {
    background: white !important;
  }

  h1 {
    font-size: 20px;
    margin-bottom: 12px;
  }

  table {
    width: 100%;
    border-collapse: collapse;
  }

  th, td {
    border: 1px solid #000;
    padding: 6px;
    font-size: 11px;
  }

  th {
    background: #e5e7eb !important;
    color: #000 !important;
  }
}
</style>


</head>

<body class="bg-tealsoft text-gray-800 text-lg">
