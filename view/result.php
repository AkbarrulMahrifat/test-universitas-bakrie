<div class="container">
    <div class="result">
        <h2>Soal</h2>
        <div class="question-list">
            <?php if (isset($questions) && !empty($questions)): ?>
                <p>Daftar Soal (Q) :</p>
                <ul>
                    <?php foreach ($questions as $index => $question): ?>
                        <li>Pertanyaan <?php echo $index + 1; ?>: <?php echo $question; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>Tidak ada soal yang diberikan.</p>
            <?php endif; ?>
        </div>

        <div class="target-value">
            <?php if (isset($target) && $target > 0): ?>
                <p>Target Nilai Total Soal (T) : <strong><?php echo $target; ?></strong></p>
            <?php else: ?>
                <p>Target nilai tidak ditentukan.</p>
            <?php endif; ?>
        </div>

        <h2>Jawaban</h2>
        <?php if (isset($totalCombinations) && $totalCombinations > 0): ?>
            <p>Jumlah semua kombinasi (K) : <strong><?php echo $totalCombinations; ?></strong></p>
        <?php else: ?>
            <p>Tidak ada kombinasi soal yang memenuhi kriteria.</p>
        <?php endif; ?>
        <?php if (isset($targetCombinations) && !empty($targetCombinations)): ?>
            <p>Daftar Kombinasi :</p>
            <ul>
                <?php foreach ($targetCombinations as $keyCombo => $combo): ?>
                    <li>Kombinasi (<?php echo $keyCombo + 1; ?>):</li>
                    <ul>
                        <?php foreach ($combo as $key => $value): ?>
                            <li><?php echo htmlspecialchars($key) . ': ' . htmlspecialchars($value); ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>Tidak ada kombinasi yang memenuhi target nilai.</p>
        <?php endif; ?>
    </div>
</div>