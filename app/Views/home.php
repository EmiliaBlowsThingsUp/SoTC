<?=$this->extend("layout")?>
  
<?=$this->section("content")?>
<div>
<h1>WOOT</h1>

<div class="container mt-5">
        <h2>Leaderboard - Top 10 Gold Counts</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Rank</th>
                    <th>User</th>
                    <th>Gold Count</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($leaderboard as $index => $user): ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= $user['username'] ?></td>
                        <td><?= $user['gold_count'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?=$this->endSection()?>