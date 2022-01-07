<?php $this->layout('template', ['title' => 'Vendas Pix', 'menu' => 'pixAguardando', 'breadcrumb' => $breadcrumb]) ?>

<section>
    <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card">
                <div class="card-header justify-content-start">
                    <h4 class="card-title d-flex justify-content-start align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cash-stack" viewBox="0 0 16 16">
                            <path d="M1 3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1H1zm7 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
                            <path d="M0 5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V5zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V7a2 2 0 0 1-2-2H3z"/>
                        </svg>
                    </h4>
                    <div class="text-left ml-1">
                        <h4 class="mb-0">Lista Vendas Pix</h4>
                        <small>Aqui estão todas as vendas no pix aguardando pagamento</small>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Nome Completo</th>
                            <th>E-mail</th>
                            <th>Telefone</th>
                            <th>Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($pix['pix'] as $p): ?>
                            <tr>
                                <td class="text-purchase">
                                    <?=$p->transaction;?>
                                </td>
                                <td>
                                    <?=$p->full_price;?>
                                </td>
                                <td>
                                    <?=$p->purchase_date;?>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="<?=url('mensagem/cartao/'.$p->transaction);?>" class="btn btn-sm btn-success">
                                            <i data-feather="message-circle"></i> Whatsapp
                                        </a>
                                        <a href="<?=url('mensagem/cartao/email/'.$p->transaction);?>" class="btn btn-sm btn-danger">
                                            <i data-feather="send"></i> Enviar E-mail
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <?php $this->insert('../components/paginacao', ['data' => $pix['paginacao']]) ?>
            </div>
        </div>
    </div>
</section>