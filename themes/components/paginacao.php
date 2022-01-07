<div class="d-flex justify-content-sm-between align-items-center pl-2 pr-2 pb-2" style="margin-top: 20px;">
    <div>
        <span>Total de <strong><?= $data['qtdTotal']; ?></strong> Registros</span>
    </div>
    <nav aria-label="Page navigation example">
        <ul class="pagination mb-0">
            <li class="page-item prev-item">
                <a class="page-link" href="<?= $data['url'] . "?pagina=" . $data['primeira']; ?>">primeira</a>
            </li>

            <?php for ($p = 0; $p < sizeof($data['paginas']); $p++): ?>
                <li class="page-item <?= ($data['atual'] === $data['paginas'][$p]) ? 'active' : ''; ?>">
                    <a class="page-link"
                       href="<?= $data['url'] . "?pagina=" . $data['paginas'][$p]; ?>"><?= $data['paginas'][$p]; ?></a>
                </li>
            <?php endfor; ?>

            <li class="page-item next-item">
                <a class="page-link" href="<?= $data['url'] . "?pagina=" . $data['ultima']; ?>">última</a>
            </li>
        </ul>
    </nav>
</div>