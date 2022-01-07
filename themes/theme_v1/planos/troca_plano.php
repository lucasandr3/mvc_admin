<?php $this->layout('template', ['title' => 'Troca de Plano', 'menu' => 'trocaPlano', 'breadcrumb' => $breadcrumb]) ?>

<section>
    <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card">
                <div class="card-header justify-content-start">
                    <h4 class="card-title d-flex justify-content-start align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-wallet2" viewBox="0 0 16 16">
                            <path d="M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.432-1.499L12.136.326zM5.562 3H13V1.78a.5.5 0 0 0-.621-.484L5.562 3zM1.5 4a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"/>
                        </svg>
                    </h4>
                    <div class="text-left ml-1">
                        <h4 class="mb-0">Lista de Trocas de Plano</h4>
                        <small>Aqui estão todas as trocas de plano</small>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Plano Antigo</th>
                            <th>Valor</th>
                            <th>Plano Novo</th>
                            <th>Valor</th>
                            <th>Data da Troca</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($planos['planos'] as $plano): ?>
                            <tr>
                                <td class="text-purchase">
                                    <?=$plano['antigoPlano']['nome'];?>
                                </td>
                                <td>
                                    <?=$plano['antigoPlano']['valor'];?>
                                </td>
                                <td class="font-weight-bold">
                                    <?=$plano['novoPlano']['nome'];?>
                                </td>
                                <td>
                                    <?=$plano['novoPlano']['valor'];?>
                                </td>
                                <td>
                                    <?=$plano['dadosTroca']['data'];?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <?php $this->insert('../components/paginacao', ['data' => $planos['paginacao']]) ?>
            </div>
        </div>
    </div>
</section>