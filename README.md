<h1>Setup Project Laravel setelah Clone</h1>

<p>Ikuti langkah-langkah ini untuk menyiapkan environment dan menginstal dependency setelah melakukan <em>clone</em> project Laravel.</p>

<h2>Langkah Instalasi</h2>
<ol>
  <li>
    <p><strong>Masuk ke folder project</strong></p>
    <pre><code>cd sekolah-backend
</code></pre>
  </li>
  <li>
    <p><strong>Install dependency PHP dengan Composer</strong></p>
    <pre><code>composer install
</code></pre>
    <p><em>Pastikan terdapat file <code>composer.json</code>.</em></p>
  </li>
  <li>
    <p><strong>Salin file environment</strong></p>
    <pre><code>cp .env.example .env
</code></pre>
    <p><em>Windows PowerShell:</em></p>
    <pre><code>copy .env.example .env
</code></pre>
  </li>
  <li>
    <p><strong>Generate application key</strong></p>
    <pre><code>php artisan key:generate
</code></pre>
  </li>
  <li>
    <p><strong>Konfigurasi database di <code>.env</code></strong></p>
    <pre><code>DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_db
DB_USERNAME=user_db
DB_PASSWORD=pass_db
</code></pre>
  </li>
  <li>
    <p><strong>Jalankan migrasi (opsional, jika tersedia)</strong></p>
    <pre><code>php artisan migrate
</code></pre>
  </li>
  <li>
    <p><strong>Jalankan server lokal</strong></p>
    <pre><code>php artisan serve
</code></pre>
    <p>Akses: <a href="http://127.0.0.1:8000" target="_blank" rel="noopener">http://127.0.0.1:8000</a></p>
  </li>
</ol>
