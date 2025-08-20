<h1>Setup Project Laravel setelah Clone</h1>

<p>Ikuti langkah-langkah ini untuk menyiapkan environment dan menginstal dependency setelah melakukan <em>clone</em> project Laravel.</p>

<h2>Prasyarat</h2>
<ul>
  <li>PHP (versi sesuai <code>composer.json</code>, biasanya &ge; 8.1)</li>
  <li>Composer</li>
  <li>MySQL/MariaDB atau DB lain yang didukung</li>
  <li>Node.js &amp; npm (jika ada <code>package.json</code> untuk aset frontend)</li>
</ul>

<h2>Langkah Instalasi</h2>
<ol>
  <li>
    <p><strong>Masuk ke folder project</strong></p>
    <pre><code>cd nama-project
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
    <p><strong>Install dependency frontend (opsional)</strong> &mdash; jika ada <code>package.json</code></p>
    <pre><code>npm install
npm run dev   <!-- untuk development -->
# atau
npm run build <!-- untuk production -->
</code></pre>
  </li>
  <li>
    <p><strong>Jalankan server lokal</strong></p>
    <pre><code>php artisan serve
</code></pre>
    <p>Akses: <a href="http://127.0.0.1:8000" target="_blank" rel="noopener">http://127.0.0.1:8000</a></p>
  </li>
</ol>

<h2>Catatan</h2>
<ul>
  <li>Jika menggunakan Sail (Docker), baca bagian <code>vendor/laravel/sail</code> atau dokumentasi repo.</li>
  <li>Jika versi PHP tidak cocok, sesuaikan versi di environment Anda atau gunakan Docker.</li>
  <li>Jika ada error permission pada storage/cache, jalankan:
    <pre><code>php artisan storage:link
php artisan config:cache
php artisan route:cache
php artisan view:cache
</code></pre>
  </li>
</ul>
