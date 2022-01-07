<?php $this->layout('template', ['title' => 'Leads', 'menu' => 'leads', 'breadcrumb' => $breadcrumb]) ?>

<section>
    <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card">
                <div class="card-header justify-content-start">
                    <h4 class="card-title d-flex justify-content-start align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                            <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                            <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
                            <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
                        </svg>
                    </h4>
                    <div class="text-left ml-1">
                        <h4 class="mb-0">Lista de Leads</h4>
                        <small>Aqui estão todos os leads</small>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Nome Completo</th>
                            <th>E-mail</th>
                            <th>Telefone</th>
<!--                            <th>Ações</th>-->
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($leads['leads'] as $lead): ?>
                            <tr>
                                <td class="font-weight-bold">
                                    <?=$lead->nome;?>
                                </td>
                                <td>
                                    <?=$lead->email;?>
                                </td>
                                <td>
                                    <?=$lead->telefone;?>
                                </td>
<!--                                <td>-->
<!--                                    <div class="btn-group">-->
<!--                                        <a href="" class="btn btn-sm btn-success">-->
<!--                                            <i data-feather="message-circle"></i> Whatsapp-->
<!--                                        </a>-->
<!--                                        <a href="" class="btn btn-sm btn-danger">-->
<!--                                            <i data-feather="send"></i> Enviar E-mail-->
<!--                                        </a>-->
<!--                                    </div>-->
<!--                                </td>-->
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <?php $this->insert('../components/paginacao', ['data' => $leads['paginacao']]) ?>
            </div>
        </div>
    </div>
</section>