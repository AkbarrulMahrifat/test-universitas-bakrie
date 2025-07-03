<div class="container">
    <h1>Hitung Kombinasi Soal</h1>

    <?php
    if (isset($error) && !empty($error)) {
        foreach ($error as $err) {
            echo '<p class="alert text-alert">' . htmlspecialchars($err) . '</p>';
        }
    }
    ?>

    <form action="index.php?action=process" method="post">
        <div class="form-group">
            <label for="soal">Soal (masukkan nilai tiap-tiap pertanyaan dalam soal yang dipisah dengan koma, maksimal 10 pertanyaan)</label>
            <input type="text" id="soal" class="form-control" name="soal" placeholder="Contoh: 1,2,3,4,5,6,7,8,9,10" required />
        </div>

        <div class="form-group">
            <label for="target">Total Nilai (masukkan target total nilai yang diinginkan dengan range 10 - 100)</label>
            <input type="number" id="target" class="form-control" name="target" placeholder="10 - 100" min="10" max="100" required />
        </div>

        <button type="submit" class="btn">Submit</button>
    </form>
</div>